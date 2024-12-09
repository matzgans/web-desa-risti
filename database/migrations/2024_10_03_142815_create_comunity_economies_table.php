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
        Schema::create('comunity_economies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('village_id')->nullable()->constrained('villages')->onDelete('set null');
            $table->integer('pertokoan_count');
            $table->integer('pertokoan_owner');
            $table->integer('perkiosan_count');
            $table->integer('perkiosan_owner');
            $table->integer('rm_count');
            $table->integer('rm_owner');
            $table->integer('perbengkelan_count');
            $table->integer('perbengkelan_owner');
            $table->integer('mebel_count');
            $table->integer('mebel_owner');
            $table->integer('pangkalan_lpg_count');
            $table->integer('pangkalan_lpg_owner');
            $table->integer('taylor_count');
            $table->integer('taylor_owner');
            $table->integer('lainnya_count');
            $table->integer('lainnya_owner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunity_economies');
    }
};
