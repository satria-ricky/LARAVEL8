<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    use HasFactory;
    protected $guarded = ['id_bengkel'];
    protected $primary_key = ['id_bengkel'];
}
