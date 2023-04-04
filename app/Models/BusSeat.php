<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusSeat extends Model
{
    use HasFactory;

    protected $table = 'buses_seats';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'bus_id',
    ];

}
