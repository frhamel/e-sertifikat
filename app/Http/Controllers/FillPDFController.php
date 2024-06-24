<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use App\Models\Event;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;

class FillPDFController extends Controller
{
    public function generateSertifikat($id)
    {
        $event = Event::findOrFail($id);
        // $outputfile = public_path('sertif.pdf'); 
        // dd($event);

        $default_template = public_path('sertifikat_8.pdf');
        $template_design = DB::table('template_design')
            ->select('file_template')
            ->where('template_id', $event->template_id)
            ->first();

            // dd($template_design);
        $set_template = isset($template_design->file_template) ? public_path('template_design/' . $template_design->file_template) : $default_template;

        $outputfile = $this->fillPDF($set_template, $event);

        return response()->file($outputfile); 
    }

    public function fillPDF($file, $event)
    {
        if (!file_exists($file)) {
            return "File PDF tidak ditemukan: $file";
        }

        try {
            // Kode yang mungkin menimbulkan pengecualian
            $fpdi = new FPDI;
            $fpdi->setSourceFile($file);

            $users = DB::table('tbl_peserta')
            ->select('peserta_name')
            ->where('user_id', $event->user_id)
            ->get();
        
            // $names = ["ARDILA NOVITA SARI", "FARAH NUR AMELIA", "CHONITA ASYIA"]; // Array of names to loop through

        // Ambil nama-nama peserta dari database atau array yang sesuai dengan kondisi tertentu
        // $names = Peserta::where('event_id', $event->id)->pluck('peserta_name')->toArray();

            foreach ($users as $value) {
                $template = $fpdi->importPage(1);
                $size = $fpdi->getTemplateSize($template);
                $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
                $fpdi->useTemplate($template);
        
                // Menambahkan nama
                $namaX = 150; // Sesuaikan koordinat X untuk nama
                $namaY = 160; // Sesuaikan koordinat Y untuk nama
                $fpdi->SetFont("Arial", "B", 55); // Mengubah ukuran dan gaya font
                $fpdi->SetTextColor(25, 26, 25); // Mengubah warna teks menjadi hitam
                $fpdi->Text($namaX, $namaY, $value->peserta_name);
                // $fpdi->Write(0, $text);

                // Menambahkan teks tambahan dalam dua baris
                $teksX = 110; // Sesuaikan koordinat X untuk teks tambahan
                $teksY = 200; // Koordinat Y untuk baris pertama teks tambahan
                $fpdi->SetFont("Arial", "", 35); // Mengubah ukuran dan gaya font untuk teks tambahan
                $fpdi->SetTextColor(25, 26, 25); // Mengubah warna teks menjadi hitam

                // Teks pertama
                $line1 = "Untuk menyelesaikan pelatihan Desain Grafis yang";
                $length1 = $fpdi->GetStringWidth($line1); // Mengukur panjang teks pertama
                $fpdi->Text($teksX + ($size['width'] - $length1) / 18, $teksY, $line1); // Posisi X di tengah halaman

               // Teks kedua
               $line2 = "diselenggarakan oleh Lerno Co pada 1 November 2024";
               $fpdi->Text($teksX, $teksY + 12, $line2); // Menggunakan 12 sebagai jarak antar baris (sesuaikan dengan kebutuhan)

            //      // Menambahkan logo
            $logoPath = public_path('img/logo_sekolah.png'); // Ganti dengan path logo Anda
            $logoX = 240; // Koordinat X untuk logo
            $logoY = 0; // Koordinat Y untuk logo
            $logoWidth = 30; // Lebar logo
            $fpdi->Image($logoPath, $logoX, $logoY, $logoWidth);

            // Menambahkan tanda tangan
            $tandaTanganPath = public_path('img/ttd.png'); // Ganti dengan path tanda tangan Anda
            $tandaTanganX = 220; // Koordinat X untuk tanda tangan
            $tandaTanganY = 220; // Koordinat Y untuk tanda tangan
            $tandaTanganWidth = 70; // Lebar tanda tangan
            $fpdi->Image($tandaTanganPath, $tandaTanganX, $tandaTanganY, $tandaTanganWidth);

            }
        
            // Save the output file
            $fpdi->Output();
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        
    }
}
