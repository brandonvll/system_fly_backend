<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flight;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Flight::create([
            'dateOfDeparture' => '2024-02-09',
            'timeOfDeparture' => '08:00',
            'dateOfArrival' => '2024-02-09',
            'timeOfArrival' => '10:00',
            'marketingCarrier' => 'AV',
            'flightOrtrainNumber' => 'AV123',
            'departureCity' => 'MDE',
            'arrivalCity' => 'BOG',
        ]);

        Flight::create([
            'dateOfDeparture' => '2024-02-09',
            'timeOfDeparture' => '11:00',
            'dateOfArrival' => '2024-02-09',
            'timeOfArrival' => '12:00',
            'marketingCarrier' => 'AV',
            'flightOrtrainNumber' => 'AV123',
            'departureCity' => 'BOG',
            'arrivalCity' => 'MDE',
        ]);

        Flight::create([
            'dateOfDeparture' => '2024-02-10',
            'timeOfDeparture' => '11:00',
            'dateOfArrival' => '2024-02-10',
            'timeOfArrival' => '12:00',
            'marketingCarrier' => 'AV',
            'flightOrtrainNumber' => 'AV123',
            'departureCity' => 'BOG',
            'arrivalCity' => 'USA',
        ]);

        Flight::create([
            'dateOfDeparture' => '2024-02-09',
            'timeOfDeparture' => '09:00',
            'dateOfArrival' => '2024-02-09',
            'timeOfArrival' => '10:00',
            'marketingCarrier' => 'AV',
            'flightOrtrainNumber' => 'AV123',
            'departureCity' => 'MDE',
            'arrivalCity' => 'BOG',
        ]);
    }
}
