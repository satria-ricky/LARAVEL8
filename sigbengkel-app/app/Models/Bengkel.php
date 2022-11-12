<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    use HasFactory;
    protected $guarded = ['bengkel'];
    protected $primary_key = ['bengkel'];
}
