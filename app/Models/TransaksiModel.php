<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table        = "tbtransaksi";
    protected $primaryKey   = "idtransaksi";
    protected $fillable = ['idtransaksi', 'iduser', 'idanggota', 'idbuku', 'tglpinjam', 'tglkembali', 'created_at','updated_at'];


    //relasi ke petugas
    public function user()
    {
        return $this->belongsTo('App\Models\UserModel', 'iduser');
    }

    //relasi
    public function anggota()
    {
        return $this->belongsTo('App\Models\AnggotaModel', 'idanggota');
    }

    //relasi ke buku
    public function buku()
    {
        return $this->belongsTo('App\Models\BukuModel', 'idbuku');
    }
}