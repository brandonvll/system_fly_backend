<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $table = 'itineraries';

    protected $fillable = [
        'origin',
        'destination',
        'departure_date',
        'arrival_date',
        'reserve_id', 
    ];

    public function reserve()
    {
        return $this->belongsTo(Reserve::class);
    }
}
