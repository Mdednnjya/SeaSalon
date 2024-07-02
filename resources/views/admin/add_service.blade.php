@extends('layouts.master')

@section('content')
    <div class="container container-min-height">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4">
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
                        <input type="number" class="form-control" id="duration" name="duration" placeholder="Enter duration in minutes (e.g., 60)" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="image">Service Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                        <small class="form-text text-muted">Accepted formats: JPEG, PNG, JPG, GIF, WEBP. Max size: 2MB.</small>
                    </div>
                    <button type="submit" class="btn btn-standard">Add Service</button>
                </form>
            </div>
        </div>
    </div>
@endsection
