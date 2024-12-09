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

        // Generate random file name for the image
        $imageName = fake()->uuid() . '.jpg';

        // Generate random image ID from Picsum (e.g., from 1 to 100)
        $imageId = fake()->numberBetween(1, 100);
        $picsumUrl = "https://picsum.photos/id/{$imageId}/200/300";

        // Define image storage path
        $imagePath = public_path('structure/staff_profile/');

        // Check if the directory exists, if not create it
        if (!file_exists($imagePath)) {
            mkdir($imagePath, 0777, true);
        }

        // Get image from Picsum and save it to the specified directory
        $imageData = file_get_contents($picsumUrl);
        file_put_contents($imagePath . $imageName, $imageData);
        $categories =  CategoryStaff::all();
        foreach ($categories as $category) {
            Structure::create(
                [
                    'staff_name' => fake()->name(),
                    'position' => $category->category,
                    'uuid' => fake()->uuid(),
                    'staff_photo' => $imageName,
                ]
            );
        }
    }
}
