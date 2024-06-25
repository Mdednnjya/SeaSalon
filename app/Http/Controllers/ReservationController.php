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
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'service_type' => 'required|string|max:255',
            'appointment_time' => 'required|date',
        ]);

        $reservation = new Reservation;
        $reservation->user_id = auth()->id();
        $reservation->name = $request->name;
        $reservation->phone_number = $request->phone_number;
        $reservation->service_type = $request->service_type;
        $reservation->appointment_time = $request->appointment_time;
        $reservation->save();

        return redirect()->route('reservations.create')
            ->with('success', 'Reservation created successfully!')
            ->with('reservation_id', $reservation->id);
    }

    public function history()
    {
        $customer = Auth::user();
        $reservations = Reservation::with('service')
            ->where('user_id', $customer->id)
            ->orderBy('appointment_time', 'desc')
            ->get();

        return view('reservations.history', compact('reservations'));
    }

    public function detail($id)
    {
        $reservation = Reservation::with('service')->findOrFail($id);
        return view('reservations.detail', compact('reservation'));
    }
}


