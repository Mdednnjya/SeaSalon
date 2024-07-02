@extends('layouts.master')

@section('content')
    <div class="container container-min-height">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4">
                <h2 class="text-center">Add Service to Branch</h2>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.addServiceToBranch') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="admin_branch_id">Branch</label>
                        <select name="branch_id" id="admin_branch_id" class="form-control" required>
                            <option value="">Select a branch</option>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="admin_service_id">Service</label>
                        <select name="service_id" id="admin_service_id" class="form-control" required>
                            <option value="">Select a branch first</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-standard">Add Service to Branch</button>
                </form>
            </div>
        </div>
    </div>
@endsection
