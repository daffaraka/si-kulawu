<style>
    #logincss {
        margin-left: 3px;
    }

    #registercss {
        margin-right: 7px;
    }
</style>

<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="/">
                            <img src="home/assets/img/logo-menak.png" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="{{ Request::routeIs('home') ? 'current-list-item' : '' }} "><a
                                    href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="{{ Request::routeIs('home.tentang-kami') ? 'current-list-item' : '' }} "><a
                                    href="{{ route('home.tentang-kami') }}">Tentang Kami</a></li>
                            <li
                                class="{{ Request::routeIs('home.furniture-kayu-jati') || Request::routeIs('home.lemari-kayu-jati') || Request::routeIs('home.meja-kayu-jati') || Request::routeIs('home.custom-design') || Request::routeIs('home.mini-furniture') ? 'current-list-item' : '' }} ">
                                <a href="#">Layanan Kami</a>
                                <ul class="sub-menu">
                                    <li> <a href="{{ route('home.furniture-kayu-jati') }}"> Furniture Kayu
                                            Jati</a></li>
                                    <li><a href="{{ route('home.lemari-kayu-jati') }}">Lemari Kayu Jati</a></li>
                                    <li><a href="{{ route('home.meja-kayu-jati') }}">Meja Kayu</a></li>
                                    <li><a href="{{ route('home.custom-design') }}">Custom Design</a></li>
                                    <li><a href="{{ route('home.mini-furniture') }}">Mini Furniture</a></li>
                                </ul>
                            </li>
                            <li class="{{ Request::routeIs('home.kontak-kami') ? 'current-list-item' : '' }} "><a
                                    href="{{ route('home.kontak-kami') }}">Kontak Kami</a></li>
                            <li>
                                <div class="header-icons">
                                    <!-- <a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a> -->
                                    <a class="mobile-hide search-bar-icon" href="#"><i
                                            class="fas fa-search"></i></a>
                                </div>
                            </li>
                            <li>
                                <div class="header-icons">
                                    @auth
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ Auth::user()->name }}
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="w-100"><a class="dropdown-item text-dark w-100"
                                                        href="{{ route('home.keranjang') }}">Keranjang <button
                                                            class="btn btn-primary p-1 px-2 btn-xs">
                                                            {{ $cart_count }}</button> </a></li>
                                                <li class="w-100"><a class="dropdown-item text-dark w-100"
                                                        href="{{ route('home.daftarTransaksi') }}">Transaksi <button
                                                            class="btn btn-primary p-1 px-2 btn-xs">
                                                            {{ $transaksi_count }}</button> </a></li>

                                                <li class="w-100">
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>

                                                    <a class="dropdown-item text-dark w-100" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                </li>
                                            </ul>
                                        </div>
                                        

                                    @endauth


                                </div>
                            </li>

                            @guest
                                <li>
                                    <div class="">
                                        <a class="btn btn-sm btn-primary" href="{{ route('login') }}">
                                            Login</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('register') }}">
                                            Register</a>
                                    </div>

                                </li>
                            @endguest
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
