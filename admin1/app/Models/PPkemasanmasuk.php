<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPkemasanmasuk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kemasanmasuk';

    protected $fillable = [
        'status',
        'tanggal',
        'nama_kemasan',
        'no_pob',
        'no_loth',
        'pemasok',
        'jumlah',
        'no_kontrol',
        'kedaluwarsa',
    ];
}
