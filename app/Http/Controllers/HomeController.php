<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function fetch()
    {
        $reviews = Review::orderByDesc('starRating')->take(3)->get();
        return view('home', ['reviews' => $reviews]);
    }
}
