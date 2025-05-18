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
        Schema::create('tbanggota', function (Blueprint $table) {
            $table->string('idanggota')->primary(); // Primary key manual
            $table->string('nama');
            $table->enum('jeniskelamin', ['L', 'P']); // L = Laki-laki, P = Perempuan
            $table->text('alamat');
            $table->string('status'); // contoh: aktif / nonaktif
            $table->timestamps();
        });

        // Tambahkan foreign key ke tbtransaksi jika kolom idanggota sudah ada di sana
        Schema::table('tbtransaksi', function (Blueprint $table) {
            $table->foreign('idanggota')->references('idanggota')->on('tbanggota')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus foreign key dulu agar tidak error saat rollback
        Schema::table('tbtransaksi', function (Blueprint $table) {
            $table->dropForeign(['idanggota']);
        });

        Schema::dropIfExists('tbanggota');
    }
};
