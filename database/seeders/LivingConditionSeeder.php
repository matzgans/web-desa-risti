<?php

namespace Database\Seeders;

use App\Models\LivingCondition;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivingConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = Village::all();
        foreach ($datas as $data) {
            # code...
            LivingCondition::create([
                'village_id' => $data->id,
                'atap_genteng' => fake()->numerify("##"),
                'atap_seng' => fake()->numerify("##"),
                'atap_rumbia' => fake()->numerify("##"),
                'dinding_semen' => fake()->numerify("##"),
                'dinding_kayu' => fake()->numerify("##"),
                'dinding_lainnya' => fake()->numerify("##"),
                'lantai_semen' => fake()->numerify("##"),
                'lantai_keramik' => fake()->numerify("##"),
                'lantai_lainnya' => fake()->numerify("##"),
            ]);
        }
    }
}
