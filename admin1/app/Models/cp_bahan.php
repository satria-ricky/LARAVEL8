<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cp_bahan extends Model
{
    use HasFactory;
    protected $primaryKey = 'cp_bahan_id';
    protected $fillable = [
        'status',
        'jumlah',
        'ruang',
        'nama',
        'kode'
    ];
}
