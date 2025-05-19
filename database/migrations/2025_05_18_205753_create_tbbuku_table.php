<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
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
    }

    public function down(): void
    {
        Schema::dropIfExists('tbbuku');
    }
};
