@extends('layouts.master')

@section('content')
    <div class="container container-min-height">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4">
                <h2 class="primary-header text-center">Create New Branch</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.createBranch') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Branch Name</label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" class="form-control" required value="{{ old('location') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="opening_time">Opening Time</label>
                        <input type="time" name="opening_time" id="opening_time" class="form-control" required value="{{ old('opening_time') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="closing_time">Closing Time</label>
                        <input type="time" name="closing_time" id="closing_time" class="form-control" required value="{{ old('closing_time') }}">
                    </div>
                    <button type="submit" class="btn btn-standard mb-2">Create Branch</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
