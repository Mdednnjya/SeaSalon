@extends('layouts.master')

@section('content')
    <div class="container container-min-height">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4">
                <h2 class="reservation-header text-center">Make a Reservation</h2>
                <form action="{{ route('reservations.store') }}" method="POST" class="reservation-form">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="phone_number">Phone Number</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="service_type">Service Type</label>
                        <select class="form-control" id="service_type" name="service_type" required>
                            <option value="Haircuts and styling">Haircuts and styling</option>
                            <option value="Manicure and pedicure">Manicure and pedicure</option>
                            <option value="Facial treatments">Facial treatments</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="appointment_time">Appointment Time</label>
                        <input type="datetime-local" class="form-control" id="appointment_time" name="appointment_time" required>
                    </div>
                    <button type="submit" class="btn btn-submit">Submit Reservation</button>
                </form>
            </div>
        </div>
    </div>
@endsection