<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'service_type' => 'required|in:Haircuts and styling,Manicure and pedicure,Facial treatments',
            'appointment_time' => 'required|date|after:now',
        ]);

        Reservation::create($validatedData);

        return redirect()->route('home')->with('success', 'Reservation created successfully!');
    }
}


