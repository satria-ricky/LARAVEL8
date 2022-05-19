<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengemasanbatchproduk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pengemasanbatchproduk';

    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'no_batch',
        'protap',
        'besar_batch',
        'bentuksediaan',
        'kemasan',
        'mulai',
        'selesai',
        'status'
    ];
}
