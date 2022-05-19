<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class protap extends Model
{
    use HasFactory;
    protected $primaryKey = 'protap_id';
    protected $fillable = [
        'username',
        'password',
        'level',
    ];
}
