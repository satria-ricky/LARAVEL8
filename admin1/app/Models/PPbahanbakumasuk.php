<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPbahanbakumasuk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ppbahanbaku';

    protected $fillable = [
        'status',
        'tanggal',
        'nama_bahanbaku',
        'no_pob',
        'no_loth',
        'pemasok',
        'jumlah',
        'no_kontrol',
        'kedaluwarsa',
    ];
}
