<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Flight;
use App\Models\Reserve;
use App\Models\Itinerary;
use Carbon\Carbon;

class FlightController extends Controller
{
    public function searchFlights(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'itinerary' => 'required|array',
            'itinerary.*.departureCity' => 'required|string',
            'itinerary.*.arrivalCity' => 'required|string',
            'itinerary.*.hour' => 'required|date',
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        $validatedData = $validated->validated(); // Obtener datos validados

        $itinerary = $validatedData['itinerary'][0];
        $departureCity = $itinerary['departureCity'];
        $arrivalCity = $itinerary['arrivalCity'];
        $hour = $itinerary['hour'];

        $flights = Flight::where('departureCity', 'LIKE', '%' . $departureCity. '%')
            ->where('arrivalCity','LIKE', '%' . $arrivalCity. '%')
            ->whereRaw("CONCAT(dateOfDeparture, ' ', timeOfDeparture) <= ?", [date('Y-m-d H:i:s', strtotime($hour))])
            ->whereRaw("CONCAT(dateOfArrival, ' ', timeOfArrival) >= ?", [date('Y-m-d H:i:s', strtotime($hour))])
            ->get();

        if ($flights->isEmpty()) {
            return response()->json(['message' => 'No hay vuelos disponibles para esa fecha'], 400);
        }

        $response = $flights->map(function ($flight) {
            return [
                'dateOfDeparture' => Carbon::parse($flight->dateOfDeparture)->format('Y-m-d'),
                'timeOfDeparture' => Carbon::parse($flight->timeOfDeparture)->format('H:i'),
                'dateOfArrival' => Carbon::parse($flight->dateOfArrival)->format('Y-m-d'),
                'timeOfArrival' => Carbon::parse($flight->timeOfArrival)->format('H:i'),
                'marketingCarrier' => $flight->marketingCarrier,
                'flightOrtrainNumber' => $flight->flightOrtrainNumber,
                'locationId' => [
                    'departureCity' => strtoupper($flight->departureCity),
                    'arrivalCity' => strtoupper($flight->arrivalCity),
                ],
            ];
        });

        return response()->json($response, 200);
    }


    public function reserveWithItinerarie(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'departureCity' => 'required|string',
            'arrivalCity' => 'required|string',
            'departureTime' => 'required|date',
            'itineraries' => 'required|array',
            'itineraries.*.origin' => 'required|string',
            'itineraries.*.destination' => 'required|string',
            'itineraries.*.departureDate' => 'required|date',
            'itineraries.*.arrivalDate' => 'required|date',
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        $validatedData = $validated->validated();

        $reserve = Reserve::create([
            'departure_city' => $validatedData['departureCity'],
            'arrival_city' => $validatedData['arrivalCity'],
            'departure_time' => $validatedData['departureTime'],
        ]);

        $itinerariesData = [];
        foreach ($validatedData['itineraries'] as $itineraryData) {
            $itinerariesData[] = [
                'origin' => $itineraryData['origin'],
                'destination' => $itineraryData['destination'],
                'departure_date' => $itineraryData['departureDate'],
                'arrival_date' => $itineraryData['arrivalDate'],
                'reserve_id' => $reserve->id, 
            ];
        }

        Itinerary::insert($itinerariesData);

        return response()->json(['message' => 'Se reservo exitosamente.'], 201);
    }

}