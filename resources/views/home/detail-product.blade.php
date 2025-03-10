@extends('home.layout')
@section('title', 'Detail Product')
@section('content')
    <div class="product-section">
        <div class="single-product mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="single-product-img">
                            <img src="{{ asset('produk/' . $product->gambar_produk) }}" alt="{{ $product->nama_produk }}">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="single-product-content">
                            <h3>{{ $product->nama_produk }}</h3>
                            {{-- <p class="single-product-pricing"><span>Per Kg</span> $50</p> --}}
                            <p>{{ $product->deskripsi }}</p>
                            <div class="single-product-form">
                                <form action="index.html">
                                    <input type="number" placeholder="0">
                                </form>
                                <a href="{{ route('home.addToCart', $product->id) }}" class="cart-btn"><i
                                        class="fas fa-shopping-cart"></i> Add to Cart</a>
                                <p><strong>Categories: </strong>Fruits, Organic</p>
                            </div>
                            {{-- <h4>Share:</h4>
                            <ul class="product-share">
                                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end single product -->

        <!-- more products -->
        {{-- <div class="more-products mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3><span class="orange-text">Related</span> Products</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                                beatae optio.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html"><img src="assets/img/products/product-img-1.jpg"
                                        alt=""></a>
                            </div>
                            <h3>Strawberry</h3>
                            <p class="product-price"><span>Per Kg</span> 85$ </p>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html"><img src="assets/img/products/product-img-2.jpg"
                                        alt=""></a>
                            </div>
                            <h3>Berry</h3>
                            <p class="product-price"><span>Per Kg</span> 70$ </p>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html"><img src="assets/img/products/product-img-3.jpg"
                                        alt=""></a>
                            </div>
                            <h3>Lemon</h3>
                            <p class="product-price"><span>Per Kg</span> 35$ </p>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- end more products -->

    </div>


    <div class="container">
        <hr>
        <div class="row">

            <div class="col-8">

                <div class="comments-list-wrap">
                    <h3 class="comment-count-title">Komentar mereka</h3>
                    @foreach ($product->reviews as $review)
                        <div class="comment-list">
                            <div class="single-comment-body">
                                <div class="comment-user-avater">
                                    <img src="assets/img/avaters/avatar1.png" alt="">
                                </div>
                                <div class="comment-text-body">
                                    <h4>{{ $review->user->name }} <span
                                            class="comment-date">{{ $review->created_at->isoFormat('dddd, D MMMM Y') }}</span>
                                        {{-- <a
                                            href="#">reply</a> --}}
                                    </h4>
                                    <p>{{ $review->ulasan }}</p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>


            </div>

            <div class="col-4" style="margin:100px 0;;">
                <h3>{{$produkRating}}</h3>
                <h5 class="comment-count-title">{{ count($product->reviews) }} Ulasan</h5>

                <table class="table">
                    @foreach ($produkJumlahRating as $index => $rating)
                        <tr>
                            <th class="w-25">{{ $index }} Star</th>
                            <th class="w-100"> <hr class="p-0" style="height: 4px; background-color: #F28123; border: none; width: 100%;">
                            </th>
                            <th>({{ $rating }})</th>
                        </tr>
                    @endforeach
                </table>


            </div>
        </div>
    </div>

@endsection
