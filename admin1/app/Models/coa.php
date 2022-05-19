<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coa extends Model
{
    use HasFactory;
    protected $primaryKey = 'coa_id';
    public $timestamps = true;
}
