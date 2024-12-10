<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $table = 'reserves';

    protected $fillable = [
        'departure_city',
        'arrival_city',
        'departure_time',
    ];

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }
}
