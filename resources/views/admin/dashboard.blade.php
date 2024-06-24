@extends('layouts.master')

@section('content')
    @if(Auth::user()->role === 'admin')
        <div class="container container-min-height">
            <div class="container container-min-height">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="dashboard-header text-center">Welcome, Admin!</h2>

                        <div class="salon-stats mb-4">
                            <h3>Salon Statistics</h3>
                            <p>Total Customers: {{ $totalCustomers }}</p>
                            <p>Today's Reservations: {{ $todaysReservations }}</p>
                            <p>Total Reservations: {{ $totalReservations }}</p>
                        </div>

                        <div class="add-service mb-4">
                            <h3>Add New Service</h3>
                            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="name">Service Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description">Service Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="duration">Service Duration (minutes)</label>
                                    <input type="number" class="form-control" id="duration" name="duration" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="image">Service Image</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Service</button>
                            </form>
                        </div>

                        <div class="existing-services mb-4">
                            <h3>Existing Services</h3>
                            @if($services->isEmpty())
                                <p>No services available.</p>
                            @else
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Service Name</th>
                                        <th>Duration</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->duration }} minutes</td>
                                            <td>
                                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-secondary">Edit</a>
                                                <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>

                        <div class="admin-navigation">
                            <h3>Admin Navigation</h3>
                            <ul>
                                <li><a href="">Other Feature 1</a></li>
                                <li><a href="">Other Feature 2</a></li>
                            </ul>
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
