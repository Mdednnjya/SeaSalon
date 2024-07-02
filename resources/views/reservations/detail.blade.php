@extends('layouts.master')

@section('content')
    <div class="container container-feedback">
        <h2>Reservation Detail</h2>
        <div class="card">
            <div class="card-header">
                Reservation #{{ $reservation->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $reservation->service->name ?? 'Unknown Service' }}</h5>
                <p><strong>Date:</strong> {{ $reservation->appointment_time }}</p>
                <p><strong>Service Description:</strong> {{ $reservation->service->description ?? 'No description available' }}</p>
                <p><strong>Duration:</strong> {{ $reservation->service->duration ?? 'Unknown' }} minutes</p>
                <p><strong>Phone Number:</strong> {{ $reservation->phone_number }}</p>
                <p><strong>Branch:</strong> {{ $reservation->branch->name ?? 'Unknown Branch' }}</p>
                <p><strong>Branch Location:</strong> {{ $reservation->branch->location ?? 'Unknown Location' }}</p>
                <a href="{{ route('reservations.history') }}" class="btn btn-standard">Back to History</a>
            </div>
        </div>
    </div>
@endsection
