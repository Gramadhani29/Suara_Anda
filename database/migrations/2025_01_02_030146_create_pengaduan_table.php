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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi'); // Untuk deskripsi panjang
            $table->string('status')->default('menunggu konfirmasi'); // Status default
            $table->string('kategori');
            $table->string('lokasi');
            $table->string('gambar')->nullable(); // Gambar bersifat opsional
            $table->unsignedBigInteger('user_id'); // Kolom user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Relasi dengan tabel users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Periksa apakah kolom dan foreign key ada sebelum menghapus
        Schema::table('pengaduan', function (Blueprint $table) {
            if (Schema::hasColumn('pengaduan', 'user_id')) {
                try {
                    $table->dropForeign(['user_id']); // Hapus foreign key
                } catch (Exception $e) {
                    // Abaikan error jika foreign key tidak ada
                }
            }
        });

        Schema::dropIfExists('pengaduan'); // Hapus tabel
    }
};
