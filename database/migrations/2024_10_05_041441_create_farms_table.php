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
        Schema::create('farms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('village_id')->nullable()->constrained('villages')->onDelete('set null');
            $table->integer('cow_count');
            $table->integer('cow_owner');
            $table->integer('goat_count');
            $table->integer('goat_owner');
            $table->integer('dog_count');
            $table->integer('dog_owner');
            $table->integer('cat_count');
            $table->integer('cat_owner');
            $table->integer('chicken_count');
            $table->integer('chicken_owner');
            $table->integer('duck_count');
            $table->integer('duck_owner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farms');
    }
};
