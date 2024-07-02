@extends('layouts.master')

@section('content')
    @if(Auth::user()->role === 'customer')
        <div class="container container-min-height">
            <div class="container container-min-height">
                <div class="row justify-content-center">
                    <div class="col-10 col-md-8">
                        <h2 class="dashboard-header text-center">Welcome, {{ Auth::user()->name }}!</h2>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Account Information</h5>
                                        <p class="card-text">Name: {{ Auth::user()->name }}</p>
                                        <p class="card-text">Email: {{ Auth::user()->email }}</p>
                                        <p class="card-text">Phone: {{ Auth::user()->phone_number }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Upcoming Reservations</h5>
                                        @if($reservations->isEmpty())
                                            <p class="card-text">No upcoming reservations.</p>
                                        @else
                                            <ul>
                                                @foreach($reservations as $reservation)
                                                    <li>{{ $reservation->service_type }} on {{ \Carbon\Carbon::parse($reservation->appointment_time)->format('F j, Y, g:i a') }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <a href="{{ route('reservations.create') }}" class="btn btn-standard">Make a New Reservation</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Actions</h5>
                                        <a href="{{ route('reservations.history') }}" class="btn btn-secondary mb-2">View Reservation History</a>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-9 col-md-4 text-center container container-min-height">
            You do not have permission to access this page.
            <a href="{{ route('home') }}" class="btn btn-book-rsv">Return to home</a>
        </div>
    @endif
@endsection
