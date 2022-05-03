<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAset extends Model
{
    use HasFactory;

    
    protected $table = 'tb_jenis';
    
    protected $primaryKey = 'jenis_id';

    protected $guarded = ['jenis_id'];

}
