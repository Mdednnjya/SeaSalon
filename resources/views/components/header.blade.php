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
                        @if(request()->routeIs('home'))
                            <a class="nav-link" href="#Services">Services</a>
                        @else
                            <a class="nav-link" href="{{ route('services.index') }}">Services</a>
                        @endif
                    </li>
                    <li class="nav-item px-2">
                        @if(request()->routeIs('home') || request()->routeIs('services.index'))
                            <a id="contactLink" class="nav-link" href="#contact">Contact Detail</a>
                        @else
                            <a id="contactLink" class="nav-link" href="{{ route('home') }}#contact" data-redirect="true">Contact Detail</a>
                        @endif
                    </li>
                    @guest
                        <li class="nav-item px-2">
                            <a href="{{ route('register') }}" class="btn btn-get-started">Get Started</a>
                        </li>
                    @endguest
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <li class="nav-item px-2">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}" >Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item px-2">
                                <a class="nav-link" href="{{ route('customer.dashboard') }}" >Dashboard</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
