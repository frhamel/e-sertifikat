<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run()
    {
        DB::table('tbl_event')->insert([
            'user_id' => 1, // ID pengguna, sesuaikan dengan pengguna yang ada di tabel pengguna
            'template_id' => 2, // ID template, sesuaikan dengan template yang ada di tabel template
            'title' => 'Lomba Website',
            'event_date' => '2024-11-01',
            'nama_ttd' => 'Farah',
            'ttd' => 'ttd 4.png',          // Nama file tanda tangan
            'logo_event' => 'logo sekolah.png',   // Nama file logo
        ]);
    }
}
