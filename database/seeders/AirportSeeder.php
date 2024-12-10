<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Airport;

class AirportSeeder extends Seeder
{
    public function run()
    {
        // Agregar los registros de prueba
        Airport::create([
            'city' => 'Medellin',
            'name' => 'Enrique Olaya Herrera',
            'country' => 'Colombia',
            'iata' => 'EOH',
        ]);

        Airport::create([
            'city' => 'Medellin',
            'name' => 'Jose Marie Cordova',
            'country' => 'Colombia',
            'iata' => 'MDE',
        ]);
    }
}
