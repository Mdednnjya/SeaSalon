<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\service;
use App\Models\Review;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = User::where('role', 'customer')->count();
        $todaysReservations = Reservation::whereDate('appointment_time', today())->count();
        $totalReservations = Reservation::count();
        $services = Service::all();

        return view('admin.dashboard', compact('totalCustomers', 'todaysReservations', 'totalReservations', 'services'));
    }

    public function addService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'description' => 'required|string',
        ]);

        Service::create([
            'name' => $request->name,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Service added successfully');
    }
}
