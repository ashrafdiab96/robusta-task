<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $table = 'trips';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'start_city',
        'end_city',
        'date',
        'deprature_time',
        'arrival_time',
    ];

    /**
     * trips function
     * One to many relation between trips and trips stops
     * @return void
     */
    public function tripsStops()
    {
        return $this->hasMany(TripStop::class, 'trip_id');
    }

}
