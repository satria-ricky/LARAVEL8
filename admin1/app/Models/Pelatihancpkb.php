<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihancpkb extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pelatihancpkb';

    protected $fillable = [
        'kode_pelatihan',
        'materi_pelatihan',
        'peserta_pelatihan',
        'pelatih',
        'metode_pelatihan',
        'jadwal_mulai_pelatihan',
        'jadwal_berakhir_pelatihan',
        'metode_penilaian',
        'status',
    ];
}
