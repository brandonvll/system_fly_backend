<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{

    protected $fillable = [
        'dateOfDeparture',
        'timeOfDeparture',
        'dateOfArrival',
        'timeOfArrival',
        'marketingCarrier',
        'flightOrtrainNumber',
        'departureCity',
        'arrivalCity',
    ];
}
