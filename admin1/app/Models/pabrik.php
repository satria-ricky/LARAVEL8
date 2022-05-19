<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pabrik extends Model
{
    use HasFactory;
    protected $primaryKey = 'pabrik_id';

    protected $fillable = [
        'alamat',
        'no_hp',
        'logo',
        'struktur',
        'nama'
    ];
}
