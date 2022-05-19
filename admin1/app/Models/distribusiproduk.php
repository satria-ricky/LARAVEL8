<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class distribusiproduk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_distribusi';

    protected $fillable = [
        'status',
        'kode_distribusi',
        'tanggal',
        'id_batch',
        'jumlah',
        'nama_distributor',
    ];
}
