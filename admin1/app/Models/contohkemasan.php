<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contohkemasan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kemasan';
    public $timestamps = true;

    protected $fillable = [
        'id_produkjadi',
        'nama_produkjadi',
        'no_batch',
        'tanggal_ambil',
        'kedaluwarsa',
        'jumlah_kemasanbox',
        'jumlah_produk',
        'jenis_warnakemasan',
        'status',
    ];
}
