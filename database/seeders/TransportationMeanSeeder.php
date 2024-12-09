<?php

namespace Database\Seeders;

use App\Models\TransportationMean;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportationMeanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = Village::all();
        $type = ['Mobil', 'Motor', 'Bentor'];
        foreach ($datas as $data) {
            TransportationMean::create([
                'village_id' => $data->id,
                'car_count' => fake()->numerify('##'),
                'car_owner' => fake()->numerify("##"),
                'motorcycle_count' => fake()->numerify('##'),
                'motorcycle_owner' => fake()->numerify('##'),
                'bentor_count' => fake()->numerify('##'),
                'bentor_owner' => fake()->numerify('##'),
            ]);
        }
    }
}
