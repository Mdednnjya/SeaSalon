import './bootstrap';

$(document).ready(function () {
    var servicesCarousel = new bootstrap.Carousel(document.getElementById('servicesCarousel'), {
        interval: false,
        wrap: false
    });

    var reviewsCarousel = new bootstrap.Carousel(document.getElementById('reviewsCarousel'), {
        interval: false,
        wrap: false
    });

    $('#servicesCarousel').on('slide.bs.carousel', function (e) {
        if (e.direction === 'left') {
            reviewsCarousel.next();
        } else if (e.direction === 'right') {
            reviewsCarousel.prev();
        }
    });

    $('#reviewsCarousel').on('slide.bs.carousel', function (e) {
        if (e.direction === 'left') {
            servicesCarousel.next();
        } else if (e.direction === 'right') {
            servicesCarousel.prev();
        }
    });

    const brandName = document.getElementById('brand-name');
    const mediaQuery = window.matchMedia('(max-width: 767px)');

    function handleMediaQueryChange(e) {
        if (e.matches) {
            brandName.style.display = 'none';
        } else {
            brandName.style.display = 'inline';
        }
    }

    mediaQuery.addListener(handleMediaQueryChange);
    handleMediaQueryChange(mediaQuery);

    document.querySelectorAll('.offcanvas-body .nav-link').forEach(link => {
        link.addEventListener('click', function() {
            const offcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('offcanvasNavbar'));
            offcanvas.hide();
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        var contactLink = document.getElementById('contactLink');

        if (contactLink) {
            contactLink.addEventListener('click', function(e) {
                if (this.getAttribute('data-redirect') === 'true') {
                    e.preventDefault();
                    window.location.href = this.href;

                    window.addEventListener('load', function() {
                        var contactElement = document.getElementById('contact');
                        if (contactElement) {
                            contactElement.scrollIntoView({behavior: 'smooth'});
                        }
                    });
                }
            });
        }
    });
});

$(document).ready(function() {
    $('#branch_id').change(function() {
        console.log('Branch changed to: ' + $(this).val());
        var branchId = $(this).val();
        if(branchId) {
            $.ajax({
                url: '/get-branch-services/' + branchId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#service_id').empty();
                    $.each(data, function(key, value) {
                        $('#service_id').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status + " " + error);
                }
            });
        } else {
            $('#service_id').empty();
        }
    });
});
