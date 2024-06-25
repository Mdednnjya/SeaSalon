<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\service;
use App\Models\Review;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function fetch()
    {
        $reviews = Review::orderByDesc('starRating')->take(3)->get();
        $services = Service::all();
        return view('home', ['reviews' => $reviews, 'services' => $services]);
    }

    public function index()
    {
        $services = Service::all();
        return view('home', compact('services'));
    }
}
