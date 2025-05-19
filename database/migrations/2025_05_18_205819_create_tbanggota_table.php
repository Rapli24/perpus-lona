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

        // Hapus bagian ini — foreign key harus dibuat di migration tbtransaksi
        /*
        Schema::table('tbtransaksi', function (Blueprint $table) {
            $table->foreign('idanggota')->references('idanggota')->on('tbanggota')->onDelete('cascade');
        });
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak perlu drop foreign key disini karena tidak dibuat di sini
        
        Schema::dropIfExists('tbanggota');
    }
};
