@extends('layouts.master')

@section('content')
    <div class="container container-min-height d-flex align-items-center justify-content-center flex-column">
        <h2 class="text-center review-header">Leave a Review</h2>
        <form action="{{ route('reviews.store') }}" method="POST" class="review-form">
            @csrf
            <div class="form-group mb-2">
                <label for="customerName">Client Name</label>
                <input type="text" class="form-control" id="customerName" name="customerName" required>
            </div>
            <div class="form-group mb-2">
                <label for="starRating">Rating</label>
                <select class="form-control" id="starRating" name="starRating" required>
                    <option value="">Select a rating</option>
                    @for ($i = 0.5; $i <= 5; $i += 0.5)
                        <option value="{{ $i }}">{{ $i }} Star{{ $i != 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="comment">Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-submit">Submit Review</button>
        </form>
    </div>
@endsection
