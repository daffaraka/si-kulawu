<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
    <a href="/" class="text-decoration-none d-block d-lg-none">
        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                class="text-primary font-weight-bold border px-3 mr-1">SI</span>Kulawu</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="/" class="nav-item nav-link  {{ Request::is('/') ? 'font-weight-bold active' : ''}}">Home</a>
            {{-- <a href="shop.html" class="nav-item nav-link">Shop</a> --}}
            {{-- <a href="detail.html" class="nav-item nav-link">Shop Detail</a> --}}
            {{-- <a href="contact.html" class="nav-item nav-link">Contact</a> --}}
        </div>
        <div class="navbar-nav ml-auto py-0">
            @guest
                <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
            @endguest

            @auth
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}</a>

                <div class="dropdown-menu rounded-0 m-0">
                    <a href="{{ route('home.keranjang') }}" class="dropdown-item">Shopping Cart</a>
                    <a href="{{ route('home.daftarTransaksi') }}" class="dropdown-item">Transaksi</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>

                </div>

            </div>
            
            @endauth

        </div>
    </div>
</nav>
