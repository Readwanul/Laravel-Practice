<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flights;

class FlightController extends Controller
{
    public function create(Request $request)
    {
        $Validation = $request->validate([
            'flight_number' => 'required|string|max:10',
            'airline' => 'required|string|max:50',
            'departure_city' => 'required|string|max:50',
            'arrival_city' => 'required|string|max:50',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'status' => 'required|string|in:scheduled,delayed,cancelled'
        ]);

        $flight = Flights::create($Validation);
        return response()->json([
            'message' => 'Flight created successfully',
            'flights' => $flight
        ], 201);
    }
}
