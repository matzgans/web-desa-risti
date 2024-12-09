<?php

namespace Database\Seeders;

use App\Models\ComunicationDevice;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComunicationDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = Village::all();
        foreach ($datas as $data) {
            ComunicationDevice::create([
                'village_id' => $data->id,
                'tv_count' => fake()->numerify("##"),
                'tv_owner' => fake()->numerify("##"),
                'parabola_count' => fake()->numerify("##"),
                'parabola_owner' => fake()->numerify("##"),
                'hp_count' => fake()->numerify("##"),
                'hp_owner' => fake()->numerify("##"),
                'radio_count' => fake()->numerify("##"),
                'radio_owner' => fake()->numerify("##"),
            ]);
        }
    }
}
