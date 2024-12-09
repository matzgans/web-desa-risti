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
        Schema::create('transportation_means', function (Blueprint $table) {
            $table->id();
            $table->foreignId('village_id')->nullable()->constrained('villages')->onDelete('set null');
            $table->integer('car_count')->default(0);
            $table->integer('car_owner')->default(0);
            $table->integer('motorcycle_count')->default(0);
            $table->integer('motorcycle_owner')->default(0);
            $table->integer('bentor_count')->default(0);
            $table->integer('bentor_owner')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation_means');
    }
};
