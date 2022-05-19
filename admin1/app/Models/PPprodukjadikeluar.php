<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPprodukjadikeluar extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ppprodukjadikeluar';

    protected $fillable = [
        'status',
        'tanggal',
        'nama_produk',
        'untuk_produk',
        'no_batch',
        'jumlah',
        'sisa',
    ];
}
