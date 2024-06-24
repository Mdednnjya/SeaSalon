@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>{{ $service->name }}</h2>
        <img src="{{ asset('storage/'.$service->image) }}" class="img-fluid mb-3" alt="{{ $service->name }}">
        <p>{{ $service->description }}</p>
        <p>Duration: {{ $service->duration }} minutes</p>
        @auth
            <a href="{{ route('reservations.create') }}" class="btn btn-book-rsv">Book Now</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-book-rsv">Login to Book</a>
        @endauth
        <a href="{{ route('services.index') }}" class="btn btn-primary">More Services</a>
    </div>
@endsection
