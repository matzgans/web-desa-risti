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
        Schema::create('living_conditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('village_id')->nullable()->constrained('villages')->onDelete('set null');
            $table->integer('atap_genteng');
            $table->integer('atap_seng');
            $table->integer('atap_rumbia');
            $table->integer('dinding_semen');
            $table->integer('dinding_kayu');
            $table->integer('dinding_lainnya');
            $table->integer('lantai_semen');
            $table->integer('lantai_keramik');
            $table->integer('lantai_lainnya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('living_conditions');
    }
};
