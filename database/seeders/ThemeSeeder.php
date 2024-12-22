<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Theme::create([
            'primary' => '#800000', // Warna default primary
            'secondary' => '#333333', // Warna default secondary
        ]);
    }
}
