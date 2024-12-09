<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = Village::all();
        $type = ['Belum / Tidak Sekolah', 'TAMAT SD/SEDERAJAT', 'TAMAT SMP/SEDERAJAT', 'TAMAT SMA/SEDERAJAT', 'TAMAT PT'];
        foreach ($datas as $data) {
            EducationLevel::create([
                'village_id' => $data->id,
                'belum_l' => fake()->numerify('###'),
                'belum_p' => fake()->numerify('###'),
                'sd_l' => fake()->numerify('###'),
                'sd_p' => fake()->numerify('###'),
                'smp_l' => fake()->numerify('###'),
                'smp_p' => fake()->numerify('###'),
                'sma_l' => fake()->numerify('###'),
                'sma_p' => fake()->numerify('###'),
                'pt_l' => fake()->numerify('###'),
                'pt_p' => fake()->numerify('###'),
            ]);
        }
    }
}
