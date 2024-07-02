@extends('layouts.master')

@section('content')
    <div class="container container-min-height pb-5">
        <h2 class="mb-4 section-title">Customer Reviews</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (count($reviews) > 0)
            <div class="row">
                @foreach ($reviews->take(4) as $review)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img class="rounded-circle me-3 profile-img" src="{{ asset('images/homepage/guest_profile.png') }}" alt="profil">
                                    <div>
                                        <h5 class="card-title m-0 review-customer-name">{{ $review['customerName'] }}</h5>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('images/homepage/Star.svg') }}" alt="Star" class="star-icon">
                                            <span class="star-rating">{{ number_format($review['starRating'], 1) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-text mb-3 review-comment">{{ $review['comment'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mb-4">
                {{ $reviews->links('vendor.pagination.custom') }}
            </div>
        @else
            <p>No reviews yet.</p>
        @endif
        <div class="mt-4">
            <a href="{{ route('reviews.create') }}" class="btn btn-standard">Add a Review</a>
        </div>
    </div>
@endsection
