<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penimbangan extends Model
{
    use HasFactory;
    protected $primaryKey = 'penimbangan_id';
    public $timestamps = true;
}
