@extends('home.layout')
@section('title', 'Hasil Pencarian : ' . $keyword)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-left">Hasil Pencarian : {{ $keyword }}</h3>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <p class="text-center">{{ $data['message'] }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="float-right">
                    <form action="{{ route('home.searchProducts') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="filter">Filter</label>
                            <select name="filter" id="filter" class="form-control">
                                <option value="">Semua</option>
                                <option value="terbaru">Terbaru</option>
                                <option value="terlama">Terlama</option>
                                <option value="terendah">Harga Terendah</option>
                                <option value="tertinggi">Harga Tertinggi</option>
                            </select>
                        </div>
                        <input type="hidden" name="keyword" value="">

                        <button type="submit" class="btn btn-dark">Filter</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">

            @if ($data['products'] != null)
                @foreach ($data['products'] as $item)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{ asset('produk/' . $item->gambar_produk) }}"
                                    alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"> {{ $item->nama_produk }} </h6>
                                <div class="d-flex justify-content-center">
                                    <h6>Rp. {{ $item->harga_produk }}</h6>
                                    <h6 class="text-muted ml-2"></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{ route('home.detail-product', $item->id) }}" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-eye text-primary mr-1"></i>View
                                    Detail</a>
                                <button class="btn btn-sm text-dark p-0 btnAddTochart" data-id="{{ $item->id }}"><i
                                        class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.btnAddTochart').click(function(e) {
                var id = $(this).data('id');
                var qty = 1;
                e.preventDefault();


                $.ajax({
                    url: '/add-to-cart/' + id,
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "qty": qty

                    },
                    success: function(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            icon: response.status,
                            title: response.message,
                            footer: '<a class="btn btn-primary" href="/keranjang">Lihat Keranjang</a>',
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Anda belum login',
                            footer: '<a class="btn btn-primary" href="/login">Login</a>',
                            // timer: 1500
                        });

                    }
                });
            });
        });
    </script>
@endpush
