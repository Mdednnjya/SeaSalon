<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function fetch()
    {
        $reviews = collect(session('reviews', []))
            ->sortByDesc('starRating')
            ->take(3)
            ->values()
            ->all();
        return view('home', ['reviews' => $reviews]);
    }
}
