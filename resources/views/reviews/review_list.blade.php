@extends('layouts.master')

@section('content')
    <div class="container" style="min-height: 100vh; padding-top: 50px; padding-bottom: 50px;">
        <h2 class="mb-4">Customer Reviews</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (count($reviews) > 0)
            <div class="row">
                @foreach ($reviews as $review)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $review['customerName'] }} - {{ $review['starRating'] }} Stars</h5>
                                <p class="card-text">{{ $review['comment'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $reviews->links() }}
            </div>
        @else
            <p>No reviews yet.</p>
        @endif
        <div class="mt-4">
            <a href="{{ route('reviews.create') }}" class="btn btn-primary">Add a Review</a>
        </div>
    </div>
@endsection
