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
        Schema::create('comunication_devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('village_id')->nullable()->constrained('villages')->onDelete('set null');
            $table->integer('tv_count');
            $table->integer('tv_owner');
            $table->integer('parabola_count');
            $table->integer('parabola_owner');
            $table->integer('hp_count');
            $table->integer('hp_owner');
            $table->integer('radio_count');
            $table->integer('radio_owner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunication_devices');
    }
};
