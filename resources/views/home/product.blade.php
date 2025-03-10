@extends('home.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Produk</span> Kami</h3>
                    <p>"Keahlian dan keindahan terwujud dalam setiap produk kami. Menak Furniture yang berkualitas,dengan
                        menghadirkan sentuhan istimewa dalam ruangan Anda."</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="home/assets/img/products/produk-1.jpg" alt=""></a>
                    </div>
                    <h3>Lemari Kayu Jati</h3>
                    <p class="product-price"><span>Ukuran 90 cm</span> Rp. 1.400.000 </p>
                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="home/assets/img/products/produk-2.jpg" alt=""></a>
                    </div>
                    <h3>Lemari Kayu Jati</h3>
                    <p class="product-price"><span>Ukuran 90 cm</span> Rp. 1.500.000 </p>
                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="home/assets/img/products/produk-3.jpg" alt=""></a>
                    </div>
                    <h3>Lemari Kayu Jati</h3>
                    <p class="product-price"><span>Ukuran 90 cm</span> Rp. 1.600.000 </p>
                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        </div>
    </div>
@endsection
