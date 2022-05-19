<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cp_produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'cp_produk_id';
    protected $fillable = [
        'status',
        'jumlah',
        'ruang',
        'nama',
        'kode'
    ];
}
