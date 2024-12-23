<?php

namespace Database\Seeders;

use App\Models\CategoryStaff;
use App\Models\Structure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path foto yang digunakan untuk semua staff
        $defaultPhoto = 'kepala-desa.png';

        // Ambil semua kategori staff
        $categories = CategoryStaff::all();

        // Buat entri untuk setiap kategori staff
        foreach ($categories as $category) {
            Structure::create([
                'staff_name' => fake()->name(),
                'position' => $category->category,
                'uuid' => fake()->uuid(),
                'staff_photo' => $defaultPhoto, // Gunakan foto default
            ]);
        }
    }
}
