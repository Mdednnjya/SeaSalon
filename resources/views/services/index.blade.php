@extends('layouts.master')

@section('content')
    <div class="container container-min-height">
        <h2>Our Services</h2>
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/'.$service->image) }}" class="card-img-top" alt="{{ $service->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->name }}</h5>
                            <p class="card-text">{{ Str::limit($service->description, 100) }}</p>
                            <a href="{{ route('services.show', $service) }}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div id="contact" class="row mb-2 py-5 mx-0 contact-section">
            <div class="col-12 text-center">
                <h2 class="contact-title">CONTACT US</h2>
                <p class="contact-info">08123456789 (Thomas) / 08164829372 (Sekar)</p>
            </div>
        </div>
    </div>
@endsection
