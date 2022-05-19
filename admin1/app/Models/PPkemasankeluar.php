<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPkemasankeluar extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ppkemasankeluar';

    protected $fillable = [
        'status',
        'tanggal',
        'nama_kemasan',
        'untuk_produk',
        'no_batch',
        'jumlah',
        'sisa',
    ];
}
