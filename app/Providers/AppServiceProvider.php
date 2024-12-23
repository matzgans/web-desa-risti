<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Theme;
use App\Models\Content;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('id'); // Set bahasa ke Indonesia

        // Bagikan konten pertama ke view tertentu
        View::composer(
            ['pages.landing.*'], // Sesuaikan dengan nama view Anda
            function ($view) {
                $view->with('content', Content::first());
            }
        );

        // Menyebarkan data tema ke semua view, jika tabel `themes` ada
        if (Schema::hasTable('themes')) { // Pastikan tabel `themes` ada
            $theme = Theme::first(); // Ambil tema pertama dari database
            View::share('theme', $theme); // Bagikan ke semua view
        } else {
            View::share('theme', null); // Atur default ke null jika tabel tidak ada
        }
    }
}
