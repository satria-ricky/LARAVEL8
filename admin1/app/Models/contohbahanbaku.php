<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class contohbahanbaku extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_bahanbaku';
    public $timestamps = true;

    protected $fillable = [
        'id_bahanbaku',
        'nama_bahanbaku',
        'no_batch',
        'tanggal_ambil',
        'kedaluwarsa',
        'jumlah_kemasanbox',
        'jumlah_produk',
        'jenis_warnakemasan',
        'status',
    ];
}
