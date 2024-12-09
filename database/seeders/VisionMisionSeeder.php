<?php

namespace Database\Seeders;

use App\Models\VisionMision;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VisionMisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $title = fake()->sentence();
        $slug = Str::slug($title);
        for ($i = 0; $i < 3; $i++) {
            VisionMision::create([
                'visi' => $title,
                'misi' => fake()->paragraph(5, true),
                'slug' => $slug,
            ]);
        }
    }
}
