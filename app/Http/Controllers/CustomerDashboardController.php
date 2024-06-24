<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\service;
use App\Models\Review;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerDashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $customer = Auth::user();
        $reservations = Reservation::where('user_id', $customer->id)
            ->where('appointment_time', '>', now())
            ->orderBy('appointment_time')
            ->get();

        return view('customer.dashboard', compact('reservations'));
    }
}
