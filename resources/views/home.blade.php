@extends('layouts.master')

@section('content')
    <style>
        .animated-text {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s ease-out forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="container-fluid ">
        <div class="row text-center mx-2 my-5" id="slogan" style="height: 90vh; display: flex; align-items: center; justify-content: center; flex-direction: column;">
            <h1 class="animated-text" style="font-family: 'Scheherazade New'; font-size: 55px; text-align: center; margin-top: 24px; margin-bottom: 39px; color: #15354F">Beauty and Elegance <br> Redefined</h1>
            <h2 class="animated-text" style="font-family: 'Lato'; font-size: 22px; text-align: center;">Exceptional Styling for Your Ultimate Glamour</h2>
        </div>

        <div class="row" style="font-family: 'Scheherazade New'; font-size: 36px; color: #15354F; text-align: center;">
            <h2>Services</h2>
        </div>
        <div class="row" style="font-family: 'Lato'; text-align: center;">
            <p>Treat yourself to the Ultimate Indulgence and Unleash Your Inner Beauty at SEA Salon.</p>
        </div>

        <div class="row justify-content-center mt-4" id="Services">
            <div class="d-none d-xxl-flex justify-content-center mx-0">
                <div class="card pt-2 m-4" style="background-color: #FBFBFB; width: 18rem; border: none; box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);">
                    <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('images/services/service-1.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: 'Lato'; color: #15354F">Haircuts and Styling</h5>
                        <p class="card-text mb-5" style="font-size: 13px; font-family: 'Sen'">Achieve your perfect look with precision cuts and creative styles from our expert stylists.</p>
                        <div class="text-center">
                            <a href="#" style="font-size: 13px; font-family: 'Sen'; color: black; text-decoration: none">learn more></a>
                        </div>
                    </div>
                </div>
                <div class="card pt-2 m-4" style="background-color: #FBFBFB; width: 18rem; border: none; box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);">
                    <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('images/services/service-2.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: 'Lato'; color: #15354F">Manicure and Pedicure</h5>
                        <p class="card-text mb-5" style="font-size: 13px; font-family: 'Sen'">Indulge in a soothing manicure and pedicure for beautifully polished nails and soft, rejuvenated skin.</p>
                        <div class="text-center">
                            <a href="#" style="font-size: 13px; font-family: 'Sen'; color: black; text-decoration: none">learn more></a>
                        </div>
                    </div>
                </div>
                <div class="card pt-2 m-4" style="background-color: #FBFBFB; width: 18rem; border: none; box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);">
                    <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('images/services/service-3.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: 'Lato'; color: #15354F">Facial Treatments</h5>
                        <p class="card-text mb-5" style="font-size: 13px; font-family: 'Sen'">Refresh your complexion with our revitalizing facials, designed to enhance your natural glow.</p>
                        <div class="text-center">
                            <a href="#" style="font-size: 13px; font-family: 'Sen'; color: black; text-decoration: none">learn more></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-xxl-none">
                <style>
                    @media (max-width: 1399px) {
                        #serviceCarousel {
                            max-width: 18rem;
                            margin: 0 auto;
                        }
                        #serviceCarousel .carousel-control-prev,
                        #serviceCarousel .carousel-control-next {
                            width: 10%;
                        }
                        #serviceCarousel .carousel-control-prev-icon,
                        #serviceCarousel .carousel-control-next-icon {
                            background-color: rgba(0,0,0,0.5);
                            border-radius: 50%;
                        }
                    }
                </style>
                <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card pt-2 m-4 mx-auto" style="background-color: #FBFBFB; width: 18rem; border: none; box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);">
                                <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('images/services/service-1.png') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-family: 'Lato'; color: #15354F">Haircuts and Styling</h5>
                                    <p class="card-text mb-5" style="font-size: 13px; font-family: 'Sen'">Achieve your perfect look with precision cuts and creative styles from our expert stylists.</p>
                                    <div class="text-center">
                                        <a href="#" style="font-size: 13px; font-family: 'Sen'; color: black; text-decoration: none">learn more></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card pt-2 m-4 mx-auto" style="background-color: #FBFBFB; width: 18rem; border: none; box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);">
                                <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('images/services/service-2.png') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-family: 'Lato'; color: #15354F">Manicure and Pedicure</h5>
                                    <p class="card-text mb-5" style="font-size: 13px; font-family: 'Sen'">Indulge in a soothing manicure and pedicure for beautifully polished nails and soft, rejuvenated skin.</p>
                                    <div class="text-center">
                                        <a href="#" style="font-size: 13px; font-family: 'Sen'; color: black; text-decoration: none">learn more></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card pt-2 m-4 mx-auto" style="background-color: #FBFBFB; width: 18rem; border: none; box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);">
                                <img class="card-img-top p-3 mb-4 rounded-5" src="{{ asset('images/services/service-3.png') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-family: 'Lato'; color: #15354F">Facial Treatments</h5>
                                    <p class="card-text mb-5" style="font-size: 13px; font-family: 'Sen'">Refresh your complexion with our revitalizing facials, designed to enhance your natural glow.</p>
                                    <div class="text-center">
                                        <a href="#" style="font-size: 13px; font-family: 'Sen'; color: black; text-decoration: none">learn more></a>
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

        <div class="justify-content-center">
            <a href="{{ route('reviews.create') }}" class="btn btn-primary">Create a Review</a>
        </div>

        <div id="contact" class="row mb-2 py-5 mx-0" style="height: 50vh; display: flex; align-items: center; justify-content: center; flex-direction: column;">
            <div class="col-12 text-center">
                <h2 style="font-family: 'Scheherazade New'; font-size: 36px; color: #15354F">CONTACT US</h2>
                <p style="font-family: 'Sen'; font-size: 19px;">08123456789 (Thomas) / 08164829372 (Sekar)</p>
            </div>
        </div>
    </div>
@endsection
