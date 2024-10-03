<!-- Navbar start -->
<header class="section-t-space">
    <div class="container-fluid fixed-top">
        
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3">
                        <i class="fas fa-map-marker-alt me-2" style="color: yellow;"></i>
                        <a href="http://maps.google.com/maps?q={{ urlencode(get_settings()->site_address) }}" target="_blank" style="color: yellow;">{{ get_settings()->site_address }}</a>
                    </small>
                    <small class="me-3">
                        <i class="fas fa-envelope me-2" style="color: yellow;"></i>
                        <a href="mailto:{{ get_settings()->site_email }}" style="color: yellow;">{{ get_settings()->site_email }}</a>
                    </small>
                </div>

                <div class="top-link pe-2">
                    <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                    <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                    <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                </div>
            </div>
        </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="/">
                <img src="/images/site/{{ get_settings()->site_logo }}" class="blur-up lazyload logo-img" alt style="max-width: 300px; height: auto;"></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{ route('home-page') }}" class="nav-item nav-link {{ request()->routeIs('home-page') ? 'active' : '' }}">Home</a>
                            <a href="{{ route('shop') }}" class="nav-item nav-link {{ request()->routeIs('shop') ? 'active' : '' }}">Shop</a>
                            <a href="{{ route('shopdetail') }}" class="nav-item nav-link {{ request()->routeIs('shopdetail') ? 'active' : '' }}">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="{{ route('cart') }}" class="dropdown-item {{ request()->routeIs('cart') ? 'active' : '' }}">Cart</a>
                                    <a href="{{ route('checkout') }}" class="dropdown-item {{ request()->routeIs('checkout') ? 'active' : '' }}">Checkout</a>
                                    <a href="{{ route('seller.register') }}" class="dropdown-item">Seller Zone</a>
                                    <a href="404.html" class="dropdown-item">404 Page</a>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <a href="{{ route('cart') }}" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                            </a>
                            <a href="#" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->