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
        Schema::create('education_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('village_id')->nullable()->constrained('villages')->onDelete('set null');
            $table->integer('belum_l');
            $table->integer('belum_p');
            $table->integer('sd_l');
            $table->integer('sd_p');
            $table->integer('smp_l');
            $table->integer('smp_p');
            $table->integer('sma_l');
            $table->integer('sma_p');
            $table->integer('pt_l');
            $table->integer('pt_p');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_levels');
    }
};
