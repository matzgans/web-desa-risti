<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contents')->insert([
            'sambutan_pertama' => 'Selamat datang di desa kami!',
            'sambutan_kedua' => 'Kami sangat senang Anda mengunjungi situs ini.',
            'deskripsi_data_desa' => 'Desa kami adalah desa yang penuh dengan keberagaman dan potensi.',
            'deskripsi_lokasi' => 'Terletak di kaki gunung dengan pemandangan indah.',
            'sejarah' => 'Desa ini didirikan pada tahun 1800 dan memiliki sejarah panjang.',
            'aparat' => 'Kepala Desa: Pak Budi, Sekretaris: Ibu Ani.',
            'artikel' => 'Kami rutin menerbitkan artikel tentang perkembangan desa.',
            'penyuratan' => 'Layanan penyuratan tersedia setiap hari kerja.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
