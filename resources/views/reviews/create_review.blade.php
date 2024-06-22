@extends('layouts.master')

@section('content')
    <div class="container" style="height: 100vh; display: flex; align-items: center; justify-content: center; flex-direction: column;">
        <h2>Leave a Review</h2>
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customerName">Your Name</label>
                <input type="text" class="form-control" id="customerName" name="customerName" required>
            </div>
            <div class="form-group">
                <label for="starRating">Rating</label>
                <select class="form-control" id="starRating" name="starRating" required>
                    <option value="">Select a rating</option>
                    @for ($i = 0.5; $i <= 5; $i += 0.5)
                        <option value="{{ $i }}">{{ $i }} Star{{ $i != 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>
@endsection
