@extends('home.layout')
@section('title', 'Daftar Transaksi')
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>

@section('content')
    <div class="transaksiProduct-section">
        <div class="breadcrumb-section hero-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="breadcrumb-text">
                            <h1>Daftar Transaksi Anda</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-xl-8">
                    @forelse ($transaksi as $item)
                        <div class="card border shadow p-3 my-2 mb-5">
                            <div class="card-header">
                                <h5>{{ $item->order_id }}</h5>
                            </div>
                            @foreach ($item->transaksiProduct as $transaksiProduct)
                                <div class="card-body mb-0 pb-1">

                                    <div class="row row-cols-2">
                                        <div class="col-4 d-flex justify-content-center">
                                            <img src="{{ asset('produk/' . $transaksiProduct->product->gambar_produk) }}"
                                                alt="" style="max-height:150px; ">
                                        </div>
                                        <div class="col-8">
                                            <div>
                                                <h5 class="text-truncate font-size-18"><a href="#"
                                                        class="text-dark">{{ $transaksiProduct->product->nama_produk }} </a>
                                                </h5>
                                            </div>
                                        </div>

                                    </div>
                                    <div>
                                        <div class="row mb-0">
                                            <div class="col-md-4">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Price</p>
                                                    <h5 class="mb-0 mt-2">
                                                        <span class="me-2">Rp. <span class="harga-produk"
                                                                data-price="{{ $transaksiProduct->product->harga_produk }}">{{ number_format($transaksiProduct->product->harga_produk) }}</span></span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Quantity</p>
                                                    <div class="d-inline-flex">
                                                        <input class="form-control qty-input" type="number"
                                                            name="qty_{{ $transaksiProduct->id }}"
                                                            data-id="{{ $transaksiProduct->id }}"
                                                            value="{{ $transaksiProduct->qty }}" min="1" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Total</p>
                                                    <h5>Rp. <span
                                                            class="total-harga">{{ number_format($transaksiProduct->product->harga_produk * $transaksiProduct->qty) }}</span>
                                                    </h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            @endforeach

                            <hr style="height: 5px; background-color: #000;">


                            <div class="d-flex justify-content-end mr-5 px-3">
                                <button class="btn btn-success font-weight-bold">Rp.
                                    {{ $item->transaksiProduct->sum('total_price') }}</button>
                            </div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    @if ($item->payment_status == '1')
                                        <button type="button" class="btn  btn-warning">
                                            Menunggu Pembayaran
                                        </button>
                                    @elseif($item->payment_status == '2')
                                        <button type="button" class="btn  btn-outline-success">
                                            Pembayaran Dikonfirmasi
                                        </button>
                                    @elseif($item->payment_status == '3')
                                        <button type="button" class="btn  btn-primary">
                                            Diproses
                                        </button>
                                    @elseif($item->payment_status == '4')
                                        <button type="button" class="btn  btn-info">
                                            Dikirim
                                        </button>
                                    @elseif($item->payment_status == '5')
                                        <button type="button" class="btn  btn-outline-dark">
                                            Sampai di Tujuan
                                        </button>
                                    @elseif($item->payment_status == '6')
                                        <button type="button" class="btn  btn-success">
                                            Selesai
                                        </button>
                                    @else
                                        <button type="button" class="btn  btn-secondary">
                                            Status Tidak Valid
                                        </button>
                                    @endif
                                </div>
                                <div class="col-4">

                                    <a href="{{route('home.lengkapiPembayaran',$item->id)}}" class="btn btn-primary">Lihat pembayaran</a>
                                    {{-- <a href="{{ route('home.lengkapiPembayaran', $item->id) }}"
                                        class="btn btn-dark shadwo border w-100">Bayar</a> --}}
                                </div>

                                <div class="col-4">

                                    {{-- <a href="{{ route('home.lengkapiPembayaran', $item->id) }}"
                                        class="btn btn-dark shadwo border w-100">Bayar</a> --}}
                                </div>


                            </div>
                        </div>


                    @empty
                        <div class="">
                            <h3>Anda belum mempunyai transaksi apapun</h3>

                        </div>
                    @endforelse

                    <!-- end card -->



                    <div class="row my-4">
                        <div class="col-sm-6">
                            <a href="ecommerce-transaksiProducts.html" class="btn btn-link text-muted">
                                <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                        </div> <!-- end col -->
                        {{-- <div class="col-sm-6">
                            <div class="text-sm-end mt-2 mt-sm-0">
                                <a href="ecommerce-checkout.html" class="btn btn-success">
                                    <i class="mdi mdi-cart-outline me-1"></i> Checkout </a>
                            </div>
                        </div> <!-- end col --> --}}
                    </div> <!-- end row-->
                </div>

                {{-- <div class="col-xl-4">
                    <div class="mt-5 mt-lg-0">
                        <div class="card border shadow-none">
                            <div class="card-header bg-transparent border-bottom py-3 px-4">
                                <h5 class="font-size-16 mb-0">Order Summary <span class="float-end">#MN0124</span></h5>
                            </div>
                            <div class="card-body p-4 pt-2">

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total :</td>
                                                <td class="text-end">$ 780</td>
                                            </tr>
                                            <tr>
                                                <td>Discount : </td>
                                                <td class="text-end">- $ 78</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping Charge :</td>
                                                <td class="text-end">$ 25</td>
                                            </tr>
                                            <tr>
                                                <td>Estimated Tax : </td>
                                                <td class="text-end">$ 18.20</td>
                                            </tr>
                                            <tr class="bg-light">
                                                <th>Total :</th>
                                                <td class="text-end">
                                                    <span class="fw-bold">
                                                        $ 745.2
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- end row -->




        </div>


        {{-- <div class="container my-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Berikan Ulasan</h2>
                </div>

                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    @forelse ($transaksiSelesai as $itemSelesai)
                        <div class="card border shadow p-3 my-2 mb-5">
                            <div class="card-header">
                                <h5>{{ $itemSelesai->order_id }}</h5>
                            </div>
                            @foreach ($itemSelesai->transaksiProduct as $transaksiProductSelesai)
                                <div class="card-body mb-0 pb-1">

                                    <div class="row row-cols-2">
                                        <div class="col-4 d-flex justify-content-center">
                                            <img src="{{ asset('produk/' . $transaksiProductSelesai->product->gambar_produk) }}"
                                                alt="" style="max-height:150px; ">
                                        </div>
                                        <div class="col-8">
                                            <div>
                                                <h5 class="text-truncate font-size-18"><a href="#"
                                                        class="text-dark">{{ $transaksiProductSelesai->product->nama_produk }}
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>

                                    </div>
                                    <div>
                                        <div class="row mb-0">
                                            <div class="col-md-4">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Price</p>
                                                    <h5 class="mb-0 mt-2">
                                                        <span class="me-2">Rp. <span class="harga-produk"
                                                                data-price="{{ $transaksiProductSelesai->product->harga_produk }}">{{ number_format($transaksiProductSelesai->product->harga_produk) }}</span></span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Quantity</p>
                                                    <div class="d-inline-flex">
                                                        <input class="form-control qty-input" type="number"
                                                            name="qty_{{ $transaksiProductSelesai->id }}"
                                                            data-id="{{ $transaksiProductSelesai->id }}"
                                                            value="{{ $transaksiProductSelesai->qty }}" min="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Total</p>
                                                    <h5>Rp. <span
                                                            class="total-harga">{{ number_format($transaksiProductSelesai->product->harga_produk * $transaksiProductSelesai->qty) }}</span>
                                                    </h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            @endforeach

                            <hr style="height: 5px; background-color: #000;">


                            <div class="d-flex justify-content-end mr-5 px-3">
                                <button class="btn btn-success font-weight-bold">Rp.
                                    {{ $itemSelesai->transaksiProduct->sum('total_price') }}</button>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">

                                    @if ($itemSelesai->whereHas('reviews')->get())
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">Ulasan Anda</label>
                                            </div>
                                        </div>
                                    @else
                                        <button class="btn btn-dark shadow border w-100" data-bs-toggle="modal"
                                            data-id="{{ $itemSelesai->id }}" data-bs-target="#ulasanModal">
                                            Berikan Ulasan
                                        </button>
                                    @endif

                                </div>




                            </div>
                        </div>


                    @empty
                        <div class="mt-5">
                            <h6 class="mx-0 px-0">Anda belum mempunyai transaksi yang selesai</h6>

                        </div>
                    @endforelse

                    <!-- end card -->



                    <div class="modal fade" id="ulasanModal" tabindex="-1" aria-labelledby="ulasanModal"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('home.tambahkanUlasan') }}" method="POST">
                                @csrf
                                <input type="hidden" name="transaksi_id" value="" id="transaksiUlasan_id">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="">
                                            <h5 class="w-100">Beri ulasan untuk : </h5>

                                            <h5 class="" id="exampleModalLabel"></h5>
                                        </div>

                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                            aria-label="Close">X</button>
                                    </div>
                                    <div class="modal-body">



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-info">Tambahkan Ulasan</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection

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


        document.getElementById('ulasanModal').addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var transaksiId = button.getAttribute('data-id');

            // AJAX request untuk mendapatkan data transaksi selesai
            fetch("{{ route('home.getDataTransaksi', '') }}/" + transaksiId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Isi modal dengan data yang didapat
                    document.getElementById('transaksiUlasan_id').value = data.id;
                    document.getElementById('exampleModalLabel').textContent = "Order ID: " + data
                        .order_id;

                    // Looping untuk produk yang ada di dalam transaksi
                    let modalBody = '';
                    data.transaksi_product.forEach((product) => {
                        modalBody += `
                        <br>
                    <div class="form-group mb-3">
                        <input type="hidden" name="product_id[]" value="${product.product.id}">

                        <div class ="d-block">
                                                    <h6 class="fw-bold">${product.product.nama_produk}</h6>
                            </div>
                        <label for="ulasan-${product.id}">Ulasan anda</label>
                        <textarea name="ulasan[]" class="form-control mb-2" cols="30" rows="3"></textarea>

                        <div class="d-flex justify-content-start">
                            <label for="rating-${product.id}">Rating</label>
                        </div>
                        <div class>
                         <div class="rate">
                            <input type="radio" id="star5-${product.id}" name="rating[${product.id}]" value="5" />
                            <label for="star5-${product.id}" title="5 stars">★</label>
                            <input type="radio" id="star4-${product.id}" name="rating[${product.id}]" value="4" />
                            <label for="star4-${product.id}" title="4 stars">★</label>
                            <input type="radio" id="star3-${product.id}" name="rating[${product.id}]" value="3" />
                            <label for="star3-${product.id}" title="3 stars">★</label>
                            <input type="radio" id="star2-${product.id}" name="rating[${product.id}]" value="2" />
                            <label for="star2-${product.id}" title="2 stars">★</label>
                            <input type="radio" id="star1-${product.id}" name="rating[${product.id}]" value="1" />
                            <label for="star1-${product.id}" title="1 star">★</label>
                        </div>

                           
                        </div>
                    </div>
                    <br>
                `;
                    });

                    // Tampilkan konten dinamis ke dalam modal body
                    ulasanModal.querySelector('.modal-body').innerHTML = modalBody;
                })
                .catch(error => console.error('Error:', error));
        });



    });
</script>
