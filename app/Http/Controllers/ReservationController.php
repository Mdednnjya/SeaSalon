<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\service;
use App\Models\Review;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function history()
    {
        $customer = Auth::user();
        $reservations = Reservation::where('user_id', $customer->id)
            ->orderBy('appointment_time', 'desc')
            ->get();

        return view('reservations.history', compact('reservations'));
    }
}


