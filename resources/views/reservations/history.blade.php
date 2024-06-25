@extends('layouts.master')

@section('content')
    <div class="container container-min-height">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8">
                <h2 class="history-header text-center">Reservation History</h2>

                <div class="reservation-history">
                    @if($reservations->isEmpty())
                        <p>No reservation history yet.</p>
                    @else
                        <ul class="list-group">
                            @foreach($reservations as $reservation)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Reservation #{{ $reservation->id }} - {{ $reservation->service->name }}
                                    <span>{{ $reservation->appointment_time }}</span>
                                    <a href="{{ route('reservations.detail', $reservation->id) }}" class="btn btn-sm btn-primary">View Details</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="actions mt-3">
                    <a href="{{ route('customer.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection
