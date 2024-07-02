@extends('layouts.master')

@section('content')
    <div class="container container-min-height">
        <h2 class="text-center mb-4">Our Services</h2>
        <div class="row justify-content-center">
            @foreach($services as $service)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 px-4 d-flex align-items-stretch">
                    <div class="card service-card w-100">
                        <img class="card-img-top card-img-custom p-4 mb-4 rounded-5" src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $service->name }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($service->description, 100) }}</p>
                            <a href="{{ route('services.show', $service) }}" class="btn btn-standard mt-auto">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $services->links('vendor.pagination.custom') }}
        </div>

        <div id="contact" class="row mb-2 py-5 mx-0 contact-section">
            <div class="col-12 text-center">
                <h2 class="contact-title">CONTACT US</h2>
                <p class="contact-info">08123456789 (Thomas) / 08164829372 (Sekar)</p>
            </div>
        </div>
    </div>
@endsection
