<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){
        $reservations = Reservation::all();
        return response()->json($reservations);
    }

    public function show($id){
        $reservation = Reservation::findOrFail($id);
        if($reservation){
            return response()->json($reservation, 200);
        } else {
            return response()->json(['message' => 'Reservation not found'], 404);
        }
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'reservation_time' => 'required|date',
            'guests' => 'required|integer|min:1',
            'note' => 'nullable|string',
        ]);
        $reservation = Reservation::create($validated);
        return response()->json($reservation, 201);
    }

    public function update(Request $request, $id){
        $reservation = Reservation::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255',
            'reservation_time' => 'sometimes|required|date',
            'guests' => 'sometimes|required|integer|min:1',
            'note' => 'nullable|string',
        ]);
        $reservation->update($validated);
        return response()->json($reservation, 200);
    }

    public function destroy($id){
        $reservation = Reservation::findOrFail($id);

        if(!$reservation){
            return response()->json(['message' => 'Reservation not found'], 404);
        }
        
        $reservation->delete();
        return response()->json(['message' => 'Reservation deleted'], 200);
    }
}
