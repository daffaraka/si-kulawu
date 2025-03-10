@extends('home.layout')
@section('title', 'Daftar Transaksi')
@section('content')
    <div class="product-section">
        <div class="breadcrumb-section" style="background-image: url('{{asset('home/assets/img/hero-bg.jpg')}}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="breadcrumb-text">
                            <h1>Cart</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5 py-5">

            @if ($keranjang->count() == 0)
                <h3>Keranjang anda kosong</h3>
            @else
                <h3>Isi Keranjang anda</h3>
                <div class="row">
                    <div class="col-xl-8">
                        @foreach ($keranjang as $item)
                            <div class="card border shadow-none my-2">
                                <div class="card-body">

                                    <div class="d-flex align-items-start border-bottom pb-3">
                                        <div class="mr-5">
                                            <img src="{{ asset('produk/' . $item->product->gambar_produk) }}"
                                                style="height: 20vh;" alt="" class="rounded">
                                        </div>
                                        <div class="flex-grow-1 align-self-center overflow-hidden">
                                            <div>
                                                <h5 class="text-truncate font-size-18"><a href="#"
                                                        class="text-dark">{{ $item->product->nama_produk }} </a></h5>

                                                <p class="mb-0 mt-1">{{$item->product->deskripsi}}</span></p>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <ul class="list-inline mb-0 font-size-16">
                                                <li class="list-inline-item">
                                                    <a href="#" class="text-muted px-1">
                                                        <i class="mdi mdi-trash-can-outline"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="text-muted px-1">
                                                        <i class="mdi mdi-heart-outline"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Price</p>
                                                    <h5 class="mb-0 mt-2">
                                                        <span class="me-2">Rp. <span class="harga-produk"
                                                                data-price="{{ $item->product->harga_produk }}">{{ number_format($item->product->harga_produk) }}</span></span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Quantity</p>
                                                    <div class="d-inline-flex">
                                                        <input class="form-control qty-input" type="number"
                                                            name="qty_{{ $item->id }}" data-id="{{ $item->id }}"
                                                            value="{{ $item->qty }}" min="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Total</p>
                                                    <h5>Rp. <span
                                                            class="total-harga">{{ number_format($item->product->harga_produk * $item->qty) }}</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        @endforeach

                        <!-- end card -->



                        <div class="row my-4">
                            <div class="col-sm-6">
                                <a href="ecommerce-products.html" class="btn btn-link text-muted">
                                    <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                            </div> <!-- end col -->
                            <div class="col-sm-6">
                                <div class="text-sm-end mt-2 mt-sm-0">
                                    <a href="{{ route('home.bayar') }}" class="btn btn-success">
                                        <i class="mdi mdi-cart-outline me-1"></i> Checkout Semua Produk</a>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row-->
                    </div>
                </div>
            @endif





        </div>

        <hr>
        <div class="container my-5">
            <h3>Produk Lain</h3>
            <div class="row">
                @foreach ($produkLain as $lain)
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 text-center">
                        <div class="single-product-item p-3">
                            <div class="d-flex justify-content-center p-5">
                                <img src="{{ asset('produk/' . $lain->gambar_produk) }}" class="img-thumbnail"
                                    alt="">
                            </div>
                            <h3>{{ $lain->nama_produk }}</h3>
                            <p class="product-price"><span>{{ $lain->deskripsi }}</span>
                                Rp.{{ number_format($lain->harga_produk) }} </p>

                            <div class="d-block my-2">
                                <a href="{{ route('home.detail-product', $lain->id) }}" class="cart-btn bg-primary"><i
                                        class="fa fa-eye"></i> Lihat Produk</a>

                            </div>

                            <div class="d-block my-2">
                                <a href="{{ route('home.addToCart', $lain->id) }}" class="cart-btn"><i
                                        class="fas fa-shopping-cart"></i>
                                    Tambah ke keranjang</a>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all quantity input fields
        const qtyInputs = document.querySelectorAll('.qty-input');

        qtyInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                const id = this.getAttribute('data-id');
                const quantity = parseInt(this.value);
                const priceElement = this.closest('.row').querySelector('.harga-produk');
                const price = parseInt(priceElement.getAttribute('data-price'));
                const totalElement = this.closest('.row').querySelector('.total-harga');

                // Calculate total
                const total = price * quantity;

                // Format and update total
                totalElement.textContent = total.toLocaleString('id-ID');
            });
        });
    });
</script>
