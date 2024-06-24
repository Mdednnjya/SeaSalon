@extends('layouts.master')

@section('content')
    <div class="container container-min-height">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8">
                <h2 class="history-header text-center">Reservation History</h2>

                <div class="reservation-history">
                    @if($reservations->isEmpty())
                        <p>No reservation history.</p>
                    @else
                        <ul>
                            @foreach($reservations as $reservation)
                                <li>
                                    {{ $reservation->service_type }} on {{ \Carbon\Carbon::parse($reservation->appointment_time)->format('F j, Y, g:i a') }}
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
