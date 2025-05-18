<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    use HasFactory;
    protected $table        = "tbanggota";
    protected $primaryKey   = "idanggota";
    protected $fillable     = ['idanggota','nama','jeniskelamin','alamat','status'];
}