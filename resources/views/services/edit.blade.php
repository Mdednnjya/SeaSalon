@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Edit Service</h2>
        <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Service Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $service->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="duration">Duration (minutes)</label>
                <input type="number" class="form-control" id="duration" name="duration" value="{{ $service->duration }}" required>
            </div>
            <div class="form-group">
                <label for="image">Service Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-standard">Update Service</button>
        </form>
    </div>
@endsection
