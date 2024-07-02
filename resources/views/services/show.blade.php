@extends('layouts.master')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card service-index-card my-2">
            <img class="card-img-top card-img-custom p-4 rounded-5" src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}">
            <div class="card-body">
                <h2 class="card-title service-card-title text-center mb-4">{{ $service->name }}</h2>
                <p class="card-text">{{ $service->description }}</p>
                <p class="card-text"><strong>Duration:</strong> {{ $service->duration }} minutes</p>

                <h5 class="mt-4 mb-3">Available Branches</h5>
                @forelse ($branches as $branch)
                    <div class="mb-2">
                        <strong>{{ $branch->name }}</strong> - {{ $branch->location }}
                        <br>
                        <small class="text-muted">Open {{ $branch->opening_time }} to {{ $branch->closing_time }}</small>
                    </div>
                @empty
                    <p class="text-muted">Not available at any branch currently.</p>
                @endforelse

                <div class="d-flex justify-content-between mt-4">
                    @auth
                        <a href="{{ route('reservations.create') }}" class="btn btn-standard">Book Now</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-standard">Login to Book</a>
                    @endauth
                    <a href="{{ route('services.index') }}" class="btn btn-secondary">More Services</a>
                </div>
            </div>
        </div>
    </div>
@endsection
