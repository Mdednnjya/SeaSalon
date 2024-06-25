@extends('layouts.master')

@section('content')
    <div class="container container-feedback">
        <h2>Reservation Detail</h2>
        <div class="card">
            <div class="card-header">
                Reservation #{{ $reservation->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $reservation->service->name }}</h5>
                <p><strong>Date:</strong> {{ $reservation->appointment_time }}</p>
                <p><strong>Service Description:</strong> {{ $reservation->service->description }}</p>
                <p><strong>Duration:</strong> {{ $reservation->service->duration }} minutes</p>
                <p><strong>Phone Number:</strong> {{ $reservation->phone_number }}</p>
                <a href="{{ route('reservations.history') }}" class="btn btn-primary">Back to History</a>
            </div>
        </div>
    </div>
@endsection
