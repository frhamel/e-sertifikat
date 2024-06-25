<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use App\Models\Event;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FillPDFController extends Controller
{
    public function generateSertifikat($id)
    {
        $event = Event::findOrFail($id);
        // $outputfile = public_path('sertif.pdf'); 
        // dd($event);

        $default_template = public_path('sertifikat_8.pdf');
        $default_logo = public_path('img/logo_sekolah.png');
        $default_ttd = public_path('img/ttd.png');

        $template_design = DB::table('template_design')
            ->select('file_template')
            ->where('template_id', $event->template_id)
            ->first();

            // dd($template_design);
        $set_template = isset($template_design->file_template) ? public_path('storage/template_design/' . $template_design->file_template) : $default_template;
        $set_logo = isset($event->logo_event) ? public_path('storage/tbl_event/' . $event->logo_event) : $default_logo;
        $set_ttd = isset($event->ttd) ? public_path('storage/tbl_event/' . $event->ttd) : $default_ttd;

        $outputfile = $this->fillPDF($set_template, $set_logo, $set_ttd, $event);

        return response()->file($outputfile); 
    }

    public function fillPDF($file, $event_logo, $ttd_event, $event)
    {
        setlocale(LC_TIME, 'id_ID.UTF-8');
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
                $namaX = 170; // Sesuaikan koordinat X untuk nama
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
                $line1 = "Untuk menyelesaikan $event->title yang";
                $length1 = $fpdi->GetStringWidth($line1); // Mengukur panjang teks pertama
                $fpdi->Text($teksX + ($size['width'] - $length1) / 18, $teksY, $line1); // Posisi X di tengah halaman

               // Teks kedua
               $line2 = "diselenggarakan oleh Lerno Co pada " . $this->formatIndonesianDate($event->event_date);
               $fpdi->Text($teksX, $teksY + 12, $line2); // Menggunakan 12 sebagai jarak antar baris (sesuaikan dengan kebutuhan)

            //      // Menambahkan logo
            $logoPath = $event_logo; // Ganti dengan path logo Anda
            $logoX = 230; // Koordinat X untuk logo
            $logoY = 0; // Koordinat Y untuk logo
            $logoWidth = 40; // Lebar logo
            $fpdi->Image($logoPath, $logoX, $logoY, $logoWidth);

            // Menambahkan tanda tangan
            $tandaTanganPath = $ttd_event; // Ganti dengan path tanda tangan Anda
            $tandaTanganX = 235; // Koordinat X untuk tanda tangan
            $tandaTanganY = 233; // Koordinat Y untuk tanda tangan
            $tandaTanganWidth = 45; // Lebar tanda tangan
            $fpdi->Image($tandaTanganPath, $tandaTanganX, $tandaTanganY, $tandaTanganWidth);

            // Menambahkan nama_ttd
            $namaTtdX = 235; // Sesuaikan koordinat X untuk nama_ttd
            $namaTtdY = 280; // Sesuaikan koordinat Y untuk nama_ttd
            $fpdi->SetFont("Arial", "", 30); // Mengubah ukuran dan gaya font untuk nama_ttd
            $fpdi->SetTextColor(25, 26, 25); // Mengubah warna teks menjadi hitam
            $fpdi->Text($namaTtdX, $namaTtdY, $event->nama_ttd);

            }
        
            // Save the output file
            $fpdi->Output();
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        
    }

    public function formatIndonesianDate($dateString) {
        // Set the locale to Indonesian
        Carbon::setLocale('id');

        // Parse the date string into a Carbon instance
        $date = Carbon::parse($dateString);

        // Format the date using Indonesian month names
        return $date->translatedFormat('d F Y');
    }
}
