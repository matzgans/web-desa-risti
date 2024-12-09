<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua pengguna yang ada sebagai author
        $users = User::all();

        // Loop untuk membuat beberapa artikel
        foreach ($users as $user) {
            // Generate nama image secara random menggunakan UUID
            $imageName = fake()->uuid() . '.jpg';

            // Generate random image ID dari Picsum (contoh dari 1 hingga 100)
            $imageId = fake()->numberBetween(1, 100);
            $picsumUrl = "https://picsum.photos/id/{$imageId}/200/300";

            // Tentukan path penyimpanan thumbnail
            $imagePath = public_path('article/thumb/');

            // Jika direktori tidak ada, buat direktori baru
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);
            }

            // Ambil gambar dari Picsum dan simpan ke direktori yang ditentukan
            $imageData = file_get_contents($picsumUrl);
            file_put_contents($imagePath . $imageName, $imageData);

            // Buat artikel dengan thumbnail yang baru disimpan
            for ($i = 0; $i < 5; $i++) {
                # code...
                Article::create([
                    'title' => 'Sample Article by ' . $user->name,
                    'author_id' => $user->id, // Relasi dengan tabel users
                    'slug' => Str::slug('Sample Article by ' . $user->name . '-' . Str::random(10)),
                    'content' => 'This is a sample content for an article written by ' . $user->name,
                    'thumbnail' => $imageName, // Path thumbnail
                    'is_show' => false
                ]);
            }
        }
    }
}
