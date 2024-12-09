<?php

namespace Database\Seeders;

use App\Models\Farm;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $datas = Village::all();
        foreach ($datas as $data) {
            Farm::create([
                'village_id' => $data->id,
                'cow_count' => fake()->numerify('##'),
                'cow_owner' => fake()->numerify('##'),
                'goat_count' => fake()->numerify('##'),
                'goat_owner' => fake()->numerify('##'),
                'dog_count' => fake()->numerify('##'),
                'dog_owner' => fake()->numerify('##'),
                'cat_count' => fake()->numerify('##'),
                'cat_owner' => fake()->numerify('##'),
                'chicken_count' => fake()->numerify('##'),
                'chicken_owner' => fake()->numerify('##'),
                'duck_count' => fake()->numerify('##'),
                'duck_owner' => fake()->numerify('##'),
            ]);
        }
    }
}
