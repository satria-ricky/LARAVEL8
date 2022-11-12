<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBengkel extends Model
{
    use HasFactory;
    protected $guarded = ['id_jenis_bengkel'];
    protected $primary_key = ['id_jenis_bengkel'];
}
