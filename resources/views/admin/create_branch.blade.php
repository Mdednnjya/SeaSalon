@extends('layouts.master')

@section('content')
    <div class="container container-min-height">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4">
                <h2>Create New Branch</h2>
                <form action="{{ route('admin.createBranch') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Branch Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="opening_time">Opening Time</label>
                        <input type="time" name="opening_time" id="opening_time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="closing_time">Closing Time</label>
                        <input type="time" name="closing_time" id="closing_time" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-standard">Create Branch</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
