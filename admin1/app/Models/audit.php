<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class audit extends Model
{
    use HasFactory;
    protected $primaryKey = 'audit_id';
    protected $fillable = [
        'audit_status',
    ];
}
