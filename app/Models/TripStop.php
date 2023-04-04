<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripStop extends Model
{
    use HasFactory;

    protected $table = 'trips_stops';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'trip_id',
        'start_city',
        'end_city',
        'date',
        'deprature_time',
        'arrival_time',
        'cost',
    ];

    /**
     * trips function
     * Many to one relation between trips stops and trips
     * @return void
     */
    public function trips()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }

}
