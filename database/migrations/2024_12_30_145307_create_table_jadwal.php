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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokter_id')->constrained('dokter')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('hari_id')->constrained('hari')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('jam_id')->constrained('jam')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_jadwal');
    }
};
