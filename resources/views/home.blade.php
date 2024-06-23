@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row text-center mx-2 slogan" id="slogan">
            <h1 class="animated-text slogan-title">Beauty and Elegance <br> Redefined</h1>
            <h2 class="animated-text slogan-subtitle">Exceptional Styling for Your Ultimate Glamour</h2>
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 text-center">
                    <a href="{{ route('reservations.create') }}" class="btn btn-book-rsv">Book Now</a>
                </div>
            </div>
        </div>


        <div class="row">
            <h2 class="reviews-title">Services</h2>
        </div>
        <div class="row section-subtitle">
            <p>Treat yourself to the Ultimate Indulgence and Unleash Your Inner Beauty at SEA Salon.</p>
        </div>

        <div class="row justify-content-center mt-4" id="Services">
            <div class="d-none d-xxl-flex justify-content-center mx-0">
                <div class="card pt-2 m-4 service-card">
                    <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('images/services/service-1.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title service-card-title">Haircuts and Styling</h5>
                        <p class="card-text mb-5 service-card-text">Achieve your perfect look with precision cuts and creative styles from our expert stylists.</p>
                        <div class="text-center">
                            <a href="#" class="service-card-link">learn more></a>
                        </div>
                    </div>
                </div>
                <div class="card pt-2 m-4 service-card">
                    <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('images/services/service-2.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title service-card-title">Manicure and Pedicure</h5>
                        <p class="card-text mb-5 service-card-text">Indulge in a soothing manicure and pedicure for beautifully polished nails and soft, rejuvenated skin.</p>
                        <div class="text-center">
                            <a href="#" class="service-card-link">learn more></a>
                        </div>
                    </div>
                </div>
                <div class="card pt-2 m-4 service-card">
                    <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('images/services/service-3.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title service-card-title">Facial Treatments</h5>
                        <p class="card-text mb-5 service-card-text">Refresh your complexion with our revitalizing facials, designed to enhance your natural glow.</p>
                        <div class="text-center">
                            <a href="#" class="service-card-link">learn more></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-xxl-none">
                <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card pt-2 m-4 mx-auto service-card">
                                <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('images/services/service-1.png') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title service-card-title">Haircuts and Styling</h5>
                                    <p class="card-text mb-5 service-card-text">Achieve your perfect look with precision cuts and creative styles from our expert stylists.</p>
                                    <div class="text-center">
                                        <a href="#" class="service-card-link">learn more></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card pt-2 m-4 mx-auto service-card">
                                <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('images/services/service-2.png') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title service-card-title">Manicure and Pedicure</h5>
                                    <p class="card-text mb-5 service-card-text">Indulge in a soothing manicure and pedicure for beautifully polished nails and soft, rejuvenated skin.</p>
                                    <div class="text-center">
                                        <a href="#" class="service-card-link">learn more></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card pt-2 m-4 mx-auto service-card">
                                <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('images/services/service-3.png') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title service-card-title">Facial Treatments</h5>
                                    <p class="card-text mb-5 service-card-text">Refresh your complexion with our revitalizing facials, designed to enhance your natural glow.</p>
                                    <div class="text-center">
                                        <a href="#" class="service-card-link">learn more></a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
