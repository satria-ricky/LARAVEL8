<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengolahanbatch extends Model
{
    use HasFactory;
    protected $primaryKey = 'batch';

    protected $fillable = [
        'pob',
        'kode_produk',
        'nama_produk',
        'nomor_batch',
        'besar_batch',
        'bentuk_sedia',
        'kategori',
        'kemasan',
        'status'
    ];
}
