@extends('layouts.master')

@section('content')
    <div class="container container-min-height">
        <div class="row justify-content-center">
                <div class="card my-4">
                    <div class="card-body">
                        <h5 class="card-title primary-header">Branches and Services</h5>
                        @foreach($branches as $branch)
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

                <div class="d-flex justify-content-center">
                    {{ $branches->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
