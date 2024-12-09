<?php

namespace Database\Seeders;

use App\Models\ComunityEconomy;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComunityEconomySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = Village::all();
        foreach ($datas as $data) {
            # code...
            ComunityEconomy::create([
                'village_id' => $data->id,
                'pertokoan_count' => fake()->numerify("##"),
                'pertokoan_owner' => fake()->numerify("##"),
                'perkiosan_count' => fake()->numerify("##"),
                'perkiosan_owner' => fake()->numerify("##"),
                'rm_count' => fake()->numerify("##"),
                'rm_owner' => fake()->numerify("##"),
                'perbengkelan_count' => fake()->numerify("##"),
                'perbengkelan_owner' => fake()->numerify("##"),
                'mebel_count' => fake()->numerify("##"),
                'mebel_owner' => fake()->numerify("##"),
                'pangkalan_lpg_count' => fake()->numerify("##"),
                'pangkalan_lpg_owner' => fake()->numerify("##"),
                'taylor_count' => fake()->numerify("##"),
                'taylor_owner' => fake()->numerify("##"),
                'lainnya_count' => fake()->numerify("##"),
                'lainnya_owner' => fake()->numerify("##"),
            ]);
        }
    }
}
