<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengoprasianalat extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_operasi';

    protected $fillable = [
        'status',
        'mulai',
        'selesai',
        'oleh',
        'ket'
    ];
}
