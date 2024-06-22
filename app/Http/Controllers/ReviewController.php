<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $review = [
            'customerName' => $request->input('customerName'),
            'starRating' => $request->input('starRating'),
            'comment' => $request->input('comment'),
        ];

        $reviews = session('reviews', []);
        $reviews[] = $review;
        session(['reviews' => $reviews]);

        return redirect()->route('reviews.list')->with('success', 'Review submitted successfully!');
    }

    public function list()
    {
        $reviews = session('reviews', []);
        return view('reviews.review_list', ['reviews' => $reviews]);
    }

    public function create()
    {
        return view('reviews.create_review');
    }
}
