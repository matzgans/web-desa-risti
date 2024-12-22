<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Content;
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

        View::composer(
            ['pages.landing.*'], // Sesuaikan dengan nama view Anda
            function ($view) {
                $view->with('content', Content::first());
            }
        );
    }
}
