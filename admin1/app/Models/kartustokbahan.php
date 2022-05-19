<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kartustokbahan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kartustokbahan';

    protected $fillable = [
        'status',
    ];
}
