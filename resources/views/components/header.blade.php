<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: rgba(255,255,255,0.96)">
    <div class="container-fluid px-5 py-4">
        <a class="navbar-brand" href="#slogan" style="font-family: 'Encode Sans Semi Expanded'; font-size: 32px; font-weight: 500; color: #15354F" id="brand-logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" style="width: 45px; height: 45px; margin-right: 8px; margin-bottom: 8px">
            <span>SEA-Salon</span>
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
                <ul class="navbar-nav justify-content-end flex-grow-1" style="font-family: 'Lato'; font-size: 24px; text-decoration: none; color: black; transition: color 0.3s;" onmouseover="this.style.color='gray'" onmouseout="this.style.color='black'">
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
