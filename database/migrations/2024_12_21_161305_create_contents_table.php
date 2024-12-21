<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->text('sambutan_pertama')->nullable(); // Kolom untuk sambutan pertama
            $table->text('sambutan_kedua')->nullable();   // Kolom untuk sambutan kedua
            $table->text('deskripsi_data_desa')->nullable(); // Kolom untuk deskripsi data desa
            $table->text('deskripsi_lokasi')->nullable();    // Kolom untuk deskripsi lokasi
            $table->text('sejarah')->nullable();             // Kolom untuk sejarah
            $table->text('aparat')->nullable();              // Kolom untuk aparat
            $table->text('artikel')->nullable();             // Kolom untuk artikel
            $table->text('penyuratan')->nullable();          // Kolom untuk penyuratan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
