<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peralatan extends Model
{
    use HasFactory;
    protected $primaryKey = 'peralatan_id';
    public $timestamps = true;
}
