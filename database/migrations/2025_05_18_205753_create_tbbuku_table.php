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
        Schema::create('tbbuku', function (Blueprint $table) {
            $table->string('idbuku')->primary(); // custom primary key
            $table->string('judulbuku');
            $table->string('kategori');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->timestamps();
        });

        // Tambahkan foreign key secara terpisah jika tbtransaksi sudah ada
        Schema::table('tbtransaksi', function (Blueprint $table) {
            $table->foreign('idbuku')->references('idbuku')->on('tbbuku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus foreign key dulu agar tidak error saat rollback
        Schema::table('tbtransaksi', function (Blueprint $table) {
            $table->dropForeign(['idbuku']);
        });

        Schema::dropIfExists('tbbuku');
    }
};
