<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

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
        $reviews = $this->paginate($reviews, 5);
        return view('reviews.review_list', ['reviews' => $reviews]);
    }

    public function create()
    {
        return view('reviews.create_review');
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
