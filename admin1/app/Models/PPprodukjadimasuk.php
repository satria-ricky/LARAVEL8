<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPprodukjadimasuk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produkjadimasuk';

    protected $fillable = [
        'status',
        'tanggal',
        'nama_produkjadi',
        'no_pob',
        'no_loth',
        'pemasok',
        'jumlah',
        'no_kontrol',
        'kedaluwarsa',

    ];
}
