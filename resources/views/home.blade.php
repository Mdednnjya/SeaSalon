@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row text-center mx-2 slogan" id="slogan">
            <h1 class="animated-text slogan-title">Beauty and Elegance <br> Redefined</h1>
            <h2 class="animated-text slogan-subtitle">Exceptional Styling for Your Ultimate Glamour</h2>
            <div class="row justify-content-center mt-5">
                @auth
                    <div class="col-md-8 text-center">
                        <a href="{{ route('reservations.create') }}" class="btn btn-book-rsv">Book Now</a>
                    </div>
                @else
                    <div class="col-md-8 text-center">
                        <a href="{{ route('login') }}" class="btn btn-book-rsv">Login to Book</a>
                    </div>
                @endauth
            </div>
        </div>


        <div class="row">
            <h2 class="reviews-title">Services</h2>
        </div>
        <div class="row section-subtitle">
            <p>Treat yourself to the Ultimate Indulgence and Unleash Your Inner Beauty at SEA Salon.</p>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center">
                <a href="{{ route('services.index') }}" class="btn btn-primary">View All Services</a>
            </div>
        </div>

        <div class="row justify-content-center mt-4" id="Services">
            <div class="d-none d-xxl-flex justify-content-center mx-0">
                @foreach($services->take(3) as $service)
                    <div class="card pt-2 m-4 service-card">
                        <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}">
                        <div class="card-body">
                            <h5 class="card-title service-card-title">{{ $service->name }}</h5>
                            <p class="card-text mb-5 service-card-text">{{ Str::limit($service->description, 100) }}</p>
                            <div class="text-center">
                                <a href="{{ route('services.show', $service) }}" class="service-card-link">learn more></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-xxl-none">
                <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($services->take(3) as $index => $service)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="card pt-2 m-4 mx-auto service-card">
                                    <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title service-card-title">{{ $service->name }}</h5>
                                        <p class="card-text mb-5 service-card-text">{{ Str::limit($service->description, 100) }}</p>
                                        <div class="text-center">
                                            <a href="{{ route('services.show', $service) }}" class="service-card-link">learn more></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#serviceCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#serviceCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <h2 class="reviews-title">What people Thinks About Us</h2>
        </div>
        <div class="row justify-content-center mt-4" id="Reviews">
            @if (count($reviews) > 0)
                <div class="d-none d-xxl-flex justify-content-center mx-0">
                    @foreach ($reviews as $review)
                        <div class="card pt-2 m-4 review-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img class="rounded-circle me-3 review-profile-img" src="{{ asset('images/homepage/guest_profile.png') }}" alt="profil">
                                    <div>
                                        <h5 class="card-title m-0 review-name">{{ $review['customerName'] }}</h5>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('images/homepage/Star.svg') }}" alt="Star" class="review-star">
                                            <span class="review-rating">{{ number_format($review['starRating'], 1) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-text mb-3 review-text">{{ $review['comment'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-xxl-none">
                    <div id="reviewsCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($reviews as $index => $review)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <div class="card pt-2 m-4 mx-auto review-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <img class="rounded-circle me-3 review-profile-img" src="{{ asset('images/homepage/guest_profile.png') }}" alt="profil">
                                                <div>
                                                    <h5 class="card-title m-0 review-name">{{ $review['customerName'] }}</h5>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('images/homepage/Star.svg') }}" alt="Star" class="review-star">
                                                        <span class="review-rating">{{ number_format($review['starRating'], 1) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="card-text mb-3 review-text">{{ $review['comment'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            @else
                <p class="no-reviews">No reviews yet.</p>
            @endif
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center">
                <a href="{{ route('reviews.list') }}" class="btn view-more-btn">View more</a>
            </div>
        </div>

        <div id="contact" class="row mb-2 py-5 mx-0 contact-section">
            <div class="col-12 text-center">
                <h2 class="contact-title">CONTACT US</h2>
                <p class="contact-info">08123456789 (Thomas) / 08164829372 (Sekar)</p>
            </div>
        </div>
    </div>
@endsection
