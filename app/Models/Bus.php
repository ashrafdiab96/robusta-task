<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $table = 'buses';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'bus_code',
    ];

}
