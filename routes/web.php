<?php

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\ArticleController as LandingArticleController;

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/profiles', [LandingController::class, 'profile'])->name('landing.profile');
Route::get('/articles', [LandingArticleController::class, 'index'])->name('landing.article');
Route::get('/articles/{slug}', [LandingArticleController::class, 'getBySlug'])->name('article.detail');
Route::get('/articles/{slug}', [LandingArticleController::class, 'getBySlug'])->name('article.detail');
Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
Route::get('/refresh-view', [LandingController::class, 'refreshMView'])->name('refresh.view');
Route::get('/data', [LandingController::class, 'data'])->name('landing.data');

Route::get('/admin/export-theme', [ThemeController::class, 'exportThemeToJson'])->name('admin.export-theme');

Route::post('/documents', [DocumentController::class, 'store'])->name('document.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
