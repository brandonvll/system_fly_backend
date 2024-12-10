<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AirportController extends Controller
{
    
    public function getAirportsByCity(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $code = $request->input('code');

        $airports = Airport::where('city', 'LIKE', '%' . $code . '%')->get();

        if ($airports->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron aeropuertos para la ciudad especificada.'
            ], 404);
        }

        return response()->json($airports);
    }
}
