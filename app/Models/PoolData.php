<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoolData extends Model
{
    use HasFactory;

    protected $fillable = [
        'pool_id',
        'temper_val',
        'ph_val',
        'humidity_val',
        'oxygen_val',
        'tds_val',
        'turbidities_val',
    ];
}
