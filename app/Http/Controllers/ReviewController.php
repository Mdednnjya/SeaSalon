<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customerName' => 'required|string|max:255',
            'starRating' => 'required|numeric|min:0.5|max:5',
            'comment' => 'required|string',
        ]);

        Review::create($validatedData);

        return redirect()->route('reviews.list')->with('success', 'Review submitted successfully!');
    }

    public function list()
    {
        $reviews = Review::orderBy('created_at', 'desc')->paginate(4);
        return view('reviews.review_list', ['reviews' => $reviews]);
    }

    public function create()
    {
        return view('reviews.create_review');
    }

    public function paginate($items, $perPage = 4, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator(
            $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            $options + ['path' => request()->url()]
        );
    }
}
