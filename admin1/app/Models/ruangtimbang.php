<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangtimbang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ruangtimbang';

    protected $fillable = [
        'status',
        'tanggal',
        'nama_bahan_baku',
        'no_loth',
        'nama_splier',
        'jumlah_bahan_baku',
        'jumlah_permintaan',
        'hasil_penimbangan',
        'untuk_produk'
    ];
}
