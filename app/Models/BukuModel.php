<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
   protected $table = 'tbbuku'; // Nama tabel di database
    protected $primaryKey = 'idbuku'; // Pastikan ini benar
    public $timestamps = false; // Jika tabel tidak pakai timestamps
    protected $fillable = ['idbuku', 'judulbuku', 'kategori', 'pengarang', 'penerbit', 'status'];}