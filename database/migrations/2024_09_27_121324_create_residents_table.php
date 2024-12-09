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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('village_id')->nullable()->constrained('villages')->onDelete('set null');
            $table->string('nik')->unique();
            $table->string('name');
            $table->enum('gender', ['Perempuan', 'Laki - Laki']);
            $table->date('birth_date');
            $table->string('occupation');
            $table->string('status_resident');
            $table->string('education_level');
            $table->string('photo_profile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
