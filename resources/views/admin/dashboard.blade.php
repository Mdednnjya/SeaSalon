@extends('layouts.master')

@section('content')
    @if(Auth::user()->role === 'admin')
        <div class="container py-4">
            <h1 class="text-center mb-4 primary-header">Admin Dashboard</h1>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Salon Statistics</h5>
                            <p class="card-text">Total Customers: {{ $totalCustomers }}</p>
                            <p class="card-text">Today's Reservations: {{ $todaysReservations }}</p>
                            <p class="card-text">Total Reservations: {{ $totalReservations }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Branches</h5>
                            <p class="card-text">Total Branches: {{ $branches->count() }}</p>
                            <a href="{{ route('admin.createBranchForm') }}" class="btn btn-standard">Add New Branch</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Services</h5>
                            <p class="card-text">Total Services: {{ $services->count() }}</p>
                            <a href="{{ route('admin.addServiceForm') }}" class="btn btn-standard">Add New Service</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <div class="row mb-3 justify-content-between">
                        <div class="col">
                            <h5 class="card-title">Branches</h5>
                        </div>
                        <div class="col text-end">
                            <a href="{{ route('admin.listAllBranches') }}" class="btn btn-secondary">View All Branches</a>
                        </div>
                    </div>
                @foreach($branches->take(3) as $branch)
                        <div class="card mb-3 branch-card">
                            <div class="card-body">
                                <h6 class="card-title">{{ $branch->name }} - {{ $branch->location }}</h6>
                                <p class="card-text">Open: {{ $branch->opening_time }} to {{ $branch->closing_time }}</p>
                                <strong>Services:</strong>
                                <ul>
                                    @forelse($branch->services as $service)
                                        <li>{{ $service->name }} ({{ $service->duration }} minutes)</li>
                                    @empty
                                        <li>No services available</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.addServiceToBranchForm') }}" class="btn me-1 btn-secondary">Add Service to Branch</a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    @else
        <div class="container text-center py-5">
            <p class="lead">You do not have permission to access this page.</p>
            <a href="{{ route('home') }}" class="btn btn-standard">Return to Home</a>
        </div>
    @endif
@endsection
