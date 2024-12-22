<?php

use App\Models\VillageProgram;
use App\Models\ComunityEconomy;
use App\Models\LivingCondition;
use App\Models\ComunicationDevice;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\StaffCategory;
use App\Http\Controllers\Admin\FarmController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\VillageController;
use App\Http\Controllers\Admin\ResidentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StructureController;
use App\Http\Controllers\Admin\VisionMisionController;
use App\Http\Controllers\Admin\DocumentLahirController;
use App\Http\Controllers\Admin\DocumentUsahaController;
use App\Http\Controllers\Admin\StaffCategoryController;
use App\Http\Controllers\Admin\DocumentHilangController;
use App\Http\Controllers\Admin\EducationLevelController;
use App\Http\Controllers\Admin\VillageProgramController;
use App\Http\Controllers\Admin\ComunityEconomyController;
use App\Http\Controllers\Admin\DocumentKelBaikController;
use App\Http\Controllers\Admin\DocumentBedaNamaController;
use App\Http\Controllers\Admin\DocumentDomisiliController;
use App\Http\Controllers\Admin\DocumentKematianController;
use App\Http\Controllers\Admin\LivingConditionalController;
use App\Http\Controllers\Admin\ComunicationDeviceController;
use App\Http\Controllers\Admin\DocumentTidakMampuController;
use App\Http\Controllers\Admin\TransportationMeanController;
use App\Http\Controllers\Admin\DocumentBedaTanggalController;
use App\Http\Controllers\Admin\DocumentKondisiSosialController;
use App\Http\Controllers\ArticleController as LandingArticleController;

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/profiles', [LandingController::class, 'profile'])->name('landing.profile');
Route::get('/articles', [LandingArticleController::class, 'index'])->name('landing.article');
Route::get('/articles/{slug}', [LandingArticleController::class, 'getBySlug'])->name('article.detail');
Route::get('/articles/{slug}', [LandingArticleController::class, 'getBySlug'])->name('article.detail');
Route::get('/refresh-view', [LandingController::class, 'refreshMView'])->name('refresh.view');


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    // Tema
    Route::get('theme', [ThemeController::class, 'index'])->name('theme.index');
    Route::post('theme', [ThemeController::class, 'store'])->name('theme.store');

    // Route Penyuratan


    // Surat Kel Baik
    Route::resource('documents/kelbaik', DocumentKelBaikController::class)->except('show', 'store')->names([
        'index'   => 'document.kelbaik.index',
        'create'  => 'document.kelbaik.create',
        'store'   => 'document.kelbaik.store',
        'edit'    => 'document.kelbaik.edit',
        'update'  => 'document.kelbaik.update',
        'destroy' => 'document.kelbaik.destroy',
    ]);
    Route::get('documents/kelbaik/{id}/print', [DocumentKelBaikController::class, 'print'])->name('document.kelbaik.print');

    //    Document Keterangan Usaha
    Route::resource('documents/usaha', DocumentUsahaController::class)->except('show', 'store')->names([

        'index'   => 'document.usaha.index',
        'create'  => 'document.usaha.create',
        'store'   => 'document.usaha.store',
        'edit'    => 'document.usaha.edit',
        'update'  => 'document.usaha.update',
        'destroy' => 'document.usaha.destroy',
    ]);
    Route::get('documents/usaha/{id}/print', [DocumentUsahaController::class, 'print'])->name('document.usaha.print');
    //    Document Tidak Mampu
    Route::resource('documents/tidakmampu', DocumentTidakMampuController::class)->except('show', 'store')->names([

        'index'   => 'document.tidakmampu.index',
        'create'  => 'document.tidakmampu.create',
        'store'   => 'document.tidakmampu.store',
        'edit'    => 'document.tidakmampu.edit',
        'update'  => 'document.tidakmampu.update',
        'destroy' => 'document.tidakmampu.destroy',
    ]);
    Route::get('documents/tidakmampu/{id}/print', [DocumentTidakMampuController::class, 'print'])->name('document.tidakmampu.print');
    // Document  Lahir
    Route::resource('documents/lahir', DocumentLahirController::class)->except('show', 'store')->names([

        'index'   => 'document.lahir.index',
        'create'  => 'document.lahir.create',
        'store'   => 'document.lahir.store',
        'edit'    => 'document.lahir.edit',
        'update'  => 'document.lahir.update',
        'destroy' => 'document.lahir.destroy',
    ]);
    Route::get('documents/lahir/{id}/print', [DocumentLahirController::class, 'print'])->name('document.lahir.print');
    // Document  Kematian
    Route::resource('documents/kematian', DocumentKematianController::class)->except('show', 'store')->names([
        'index'   => 'document.kematian.index',
        'create'  => 'document.kematian.create',
        'store'   => 'document.kematian.store',
        'edit'    => 'document.kematian.edit',
        'update'  => 'document.kematian.update',
        'destroy' => 'document.kematian.destroy',
    ]);
    Route::get('documents/kematian/{id}/print', [DocumentKematianController::class, 'print'])->name('document.kematian.print');

    //    Document Keterangan Beda Nama
    Route::resource('documents/beda-nama', DocumentBedaNamaController::class)->except('show', 'store')->names([
        'index'   => 'document.beda-nama.index',
        'create'  => 'document.beda-nama.create',
        'store'   => 'document.beda-nama.store',
        'edit'    => 'document.beda-nama.edit',
        'update'  => 'document.beda-nama.update',
        'destroy' => 'document.beda-nama.destroy',
    ]);
    Route::get('documents/beda-nama/{id}/print', [DocumentBedaNamaController::class, 'print'])->name('document.beda-nama.print');

    //    Document Keterangan Domisili

    Route::resource('documents/domisili', DocumentDomisiliController::class)->except('show', 'store')->names([
        'index'   => 'document.domisili.index',
        'create'  => 'document.domisili.create',
        'store'   => 'document.domisili.store',
        'edit'    => 'document.domisili.edit',
        'update'  => 'document.domisili.update',
        'destroy' => 'document.domisili.destroy',
    ]);
    Route::get('documents/domisili/{id}/print', [DocumentDomisiliController::class, 'print'])->name('document.domisili.print');

    //    Document Keterangan Tanggal Lahir
    Route::resource('documents/beda-tanggal', DocumentBedaTanggalController::class)->except('show', 'store')->names([
        'index'   => 'document.beda-tanggal.index',
        'create'  => 'document.beda-tanggal.create',
        'store'   => 'document.beda-tanggal.store',
        'edit'    => 'document.beda-tanggal.edit',
        'update'  => 'document.beda-tanggal.update',
        'destroy' => 'document.beda-tanggal.destroy',
    ]);
    Route::get('documents/beda-tanggal/{id}/print', [DocumentBedaTanggalController::class, 'print'])->name('document.beda-tanggal.print');
    //    Document Keterangan Hilang
    Route::resource('documents/hilang', DocumentHilangController::class)->except('show', 'store')->names([
        'index'   => 'document.hilang.index',
        'create'  => 'document.hilang.create',
        'store'   => 'document.hilang.store',
        'edit'    => 'document.hilang.edit',
        'update'  => 'document.hilang.update',
        'destroy' => 'document.hilang.destroy',
    ]);
    Route::get('documents/hilang/{id}/print', [DocumentHilangController::class, 'print'])->name('document.hilang.print');
    //    Document Kondisi Sosial Orang Tua
    Route::resource('documents/kondisi_sosial', DocumentKondisiSosialController::class)->except('show', 'store')->names([
        'index'   => 'document.kondisi_sosial.index',
        'create'  => 'document.kondisi_sosial.create',
        'store'   => 'document.kondisi_sosial.store',
        'edit'    => 'document.kondisi_sosial.edit',
        'update'  => 'document.kondisi_sosial.update',
        'destroy' => 'document.kondisi_sosial.destroy',
    ]);
    Route::get('documents/kondisi_sosial/{id}/print', [DocumentKondisiSosialController::class, 'print'])->name('document.kondisi_sosial.print');



    // route data master
    Route::resource('resident', ResidentController::class);
    Route::resource('staffcategory', StaffCategoryController::class);
    Route::resource('village', VillageController::class);
    Route::resource('transportation', TransportationMeanController::class);
    Route::resource('farm', FarmController::class);

    // kependudukan

    Route::resource('education/level', EducationLevelController::class)->names([
        'index'   => 'education.level.index',
        'create'  => 'education.level.create',
        'store'   => 'education.level.store',
        'show'    => 'education.level.show',
        'edit'    => 'education.level.edit',
        'update'  => 'education.level.update',
        'destroy' => 'education.level.destroy',
    ]);
    Route::resource('comunity/economy', ComunityEconomyController::class)->names([
        'index'   => 'comunity.economy.index',
        'create'  => 'comunity.economy.create',
        'store'   => 'comunity.economy.store',
        'show'    => 'comunity.economy.show',
        'edit'    => 'comunity.economy.edit',
        'update'  => 'comunity.economy.update',
        'destroy' => 'comunity.economy.destroy',
    ]);
    Route::resource('living/conditional', LivingConditionalController::class)->names([
        'index'   => 'living.conditional.index',
        'create'  => 'living.conditional.create',
        'store'   => 'living.conditional.store',
        'show'    => 'living.conditional.show',
        'edit'    => 'living.conditional.edit',
        'update'  => 'living.conditional.update',
        'destroy' => 'living.conditional.destroy',
    ]);

    Route::resource('comunication_device', ComunicationDeviceController::class);


    // Desa
    Route::resource('visionmision', VisionMisionController::class);
    Route::resource('villageprogram', VillageProgramController::class);

    // Tema
    Route::resource('theme', ThemeController::class)->names([
        'index'   => 'theme.index',
        'create'  => 'theme.create',
        'store'   => 'theme.store',
        'show'    => 'theme.show',
        'edit'    => 'theme.edit',
        'update'  => 'theme.update',
        'destroy' => 'theme.destroy',
    ]);

    // content
    Route::resource('content', ContentController::class)->names([
        'index'   => 'content.index',
        'create'  => 'content.create',
        'store'   => 'content.store',
        'show'    => 'content.show',
        'edit'    => 'content.edit',
        'update'  => 'content.update',
        'destroy' => 'content.destroy',
    ]);

    // end data master
    Route::get('export/resident', [ResidentController::class, 'export'])->name('export.resident');
    Route::get('export/template/resident', [ResidentController::class, 'export_template'])->name('export.template.resident');
    Route::post('import/template/resident', [ResidentController::class, 'import_template'])->name('import.template.resident');
    Route::resource('article', ArticleController::class);
    Route::put('update/article/status/{article}', [ArticleController::class, 'update_status'])->name('update.article.status');
    Route::resource('structure', StructureController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
