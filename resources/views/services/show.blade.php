@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>{{ $service->name }}</h2>
        <img src="{{ asset('storage/'.$service->image) }}" class="img-fluid mb-3" alt="{{ $service->name }}">
        <p>{{ $service->description }}</p>
        <p>Duration: {{ $service->duration }} minutes</p>

        <h4>Available at these branches:</h4>
        <ul>
            @forelse ($branches as $branch)
                <li>
                    {{ $branch->name }} - {{ $branch->location }}
                    <br>
                    Open from {{ $branch->opening_time }} to {{ $branch->closing_time }}
                </li>
            @empty
                <li>This service is not currently available at any branch.</li>
            @endforelse
        </ul>

        @auth
            <a href="{{ route('reservations.create') }}" class="btn btn-standard">Book Now</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-standard">Login to Book</a>
        @endauth
        <a href="{{ route('services.index') }}" class="btn btn-secondary">More Services</a>
    </div>
@endsection
