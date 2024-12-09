<?php

namespace Database\Seeders;

use App\Models\VillageProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VillageProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program_name = fake()->sentence(2);
        $slug = Str::slug($program_name);
        $categories = ['prioritas', 'tambahan'];
        foreach ($categories as $category) {
            VillageProgram::create([
                'program_name' => $program_name,
                'slug' => $slug,
                'description' => fake()->sentence(5),
                'program_category' => $category,
            ]);
        }
    }
}
