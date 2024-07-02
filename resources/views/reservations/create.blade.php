@extends('layouts.master')

@section('content')
    @if(session('success'))
        <div class="col-9 col-md-4 text-center container container-min-height">
            {{ session('success') }}
            <a href="{{ route('reservations.detail', session('reservation_id')) }}" class="btn btn-primary">See Details</a>
        </div>
    @else
        <div class="container container-min-height">
            <div class="row justify-content-center">
                <div class="col-10 col-md-4">
                    <h2 class="reservation-header text-center">Make a Reservation</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('reservations.store') }}" method="POST" class="reservation-form">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" required value="{{ old('phone_number') }}">
                        </div>
                        <div class="form-group">
                            <label for="branch_id">Branch</label>
                            <select name="branch_id" id="branch_id" class="form-control" required>
                                <option value="">Select a branch</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="service_id">Service Type</label>
                            <select name="service_id" id="service_id" class="form-control" required>
                                <option value="">Select a branch first</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="appointment_time">Appointment Time</label>
                            <input type="datetime-local" class="form-control" id="appointment_time" name="appointment_time" required value="{{ old('appointment_time') }}">
                        </div>
                        <button type="submit" class="btn btn-standard">Submit Reservation</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
