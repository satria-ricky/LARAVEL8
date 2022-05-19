<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class timbangbahan extends Model
{
    use HasFactory;
    protected $primaryKey = 'timbang_bahan_id';

    protected $fillable = [
        'status',
        'tanggal',
        'nama_bahan',
        'no_loth',
        'nama_suplier',
        'jumlah_bahan',
        'hasil_penimbangan'
    ];
}
