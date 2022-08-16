<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'area',
        'desc',
    ];

    protected $hidden = [];
}
