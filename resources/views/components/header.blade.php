<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-fluid px-5 py-4">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo">
            <span id="brand-name">SEA-Salon</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#Services" >Services</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#contact" >Contact Detail</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
