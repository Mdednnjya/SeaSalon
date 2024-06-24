@extends('layouts.master')

@section('content')
    @if(Auth::user()->role === 'customer')
        <div class="container container-min-height">
            <div class="container container-min-height">
                <div class="row justify-content-center">
                    <div class="col-10 col-md-8">
                        <h2 class="dashboard-header text-center">Welcome, {{ Auth::user()->name }}!</h2>

                        <div class="account-summary">
                            <h3>Account Information</h3>
                            <p>Email: {{ Auth::user()->email }}</p>
                            <p>Phone: {{ Auth::user()->phone_number }}</p>
                        </div>

                        <div class="upcoming-reservations">
                            <h3>Upcoming Reservations</h3>
                            @if($reservations->isEmpty())
                                <p>No upcoming reservations.</p>
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
                            <a href="{{ route('reservations.create') }}" class="btn btn-primary">Make a New Reservation</a>
                            <a href="{{ route('reservations.history') }}" class="btn btn-secondary">View Reservation History</a>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            You do not have permission to access this page.
        </div>
    @endif
@endsection
