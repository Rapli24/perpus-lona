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
        Schema::create('tbtransaksi', function (Blueprint $table) {
            $table->string('idtransaksi')->primary(); // Primary key manual
            $table->string('idbuku');
            $table->string('idanggota');
            $table->date('tglpinjam');
            $table->date('tglkembali');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('idbuku')->references('idbuku')->on('tbbuku')->onDelete('cascade');
            $table->foreign('idanggota')->references('idanggota')->on('tbanggota')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbtransaksi', function (Blueprint $table) {
            $table->dropForeign(['idbuku']);
            $table->dropForeign(['idanggota']);
        });

        Schema::dropIfExists('tbtransaksi');
    }
};
