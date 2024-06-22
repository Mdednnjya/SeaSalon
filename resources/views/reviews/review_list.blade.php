@extends('layouts.master')

@section('content')
    <div class="container" style="height: 100vh; display: flex; align-items: center; justify-content: center; flex-direction: column;">
        <h2>Customer Reviews</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (count($reviews) > 0)
            <ul class="list-group">
                @foreach ($reviews as $review)
                    <li class="list-group-item">
                        <h5>{{ $review['customerName'] }} - {{ $review['starRating'] }} Stars</h5>
                        <p>{{ $review['comment'] }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No reviews yet.</p>
        @endif
        <a href="{{ route('reviews.create') }}" class="btn btn-primary mt-3">Add a Review</a>
    </div>
@endsection
