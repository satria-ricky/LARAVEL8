<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timbangproduk extends Model
{
    use HasFactory;
    protected $primaryKey = 'timbang_produk_id';

    protected $fillable = [
        'status',
        'tanggal',
        'nama_produk_antara',
        'no_batch',
        'asal_produk',
        'jumlah_produk',
        'hasil_penimbangan',
        'untuk_produk'
    ];
}
