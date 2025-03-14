@extends('home.layout')
@section('title', 'Lakukan Pembayaran')
@section('content')
    <div class="product-section">
        <div class="container" style="padding: 25vh 0;">
            <h3>Lakukan pembayaran</h3>
            <div class="row row-cols-2 mt-5">


                <div class="col-8">
                    @foreach ($order->transaksiProduct as $item)
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
                                            <p class="text-muted mb-0">
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star-half text-warning"></i>
                                            </p>
                                            <p class="mb-0 mt-1">Color : <span class="fw-medium">Gray</span></p>
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
                                                <h5 class="mb-0 mt-2"><span class="me-2">Rp.
                                                        {{ number_format($item->product->harga_produk) }} </span></h5>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mt-3">
                                                <p class="text-muted mb-2">Quantity</p>
                                                <div class="d-inline-flex">
                                                    <input class="form-control" type="number" value="{{ $item->qty }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mt-3">
                                                <p class="text-muted mb-2">Total</p>
                                                <h5>Rp. {{ number_format($item->product->harga_produk * $item->qty) }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    @endforeach
                </div>
                <div class="col-4">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('home.storeTransaksi', ['transaksi' => $order]) }}" method="POST">
                                @csrf

                                <div class="my-4">
                                    @if ($order->payment_status == '1')
                                        <button type="button"
                                            class="bg-warning text-white py-2 px-4 border border-gray-500 rounded-md active:bg-yellow-700 hover:bg-yellow-700 w-100">Menunggu
                                            Pembayaran</button>
                                    @elseif($order->payment_status == '2')
                                        <button type="button"
                                            class="bg-success text-white py-2 px-4 border border-gray-500 rounded-md active:bg-green-700 hover:bg-green-700 w-100">Sudah
                                            Dibayar</button>
                                    @elseif($order->payment_status == '3')
                                        <button type="button"
                                            class="bg-secondary text-white py-2 px-4 border border-gray-500 rounded-md active:bg-gray-700 hover:bg-gray-700 w-100">Kadaluarsa</button>
                                    @elseif($order->payment_status == '4')
                                        <button type="button"
                                            class="bg-danger text-white py-2 px-4 border border-gray-500 rounded-md active:bg-red-700 hover:bg-red-700 w-100">Dibatalkan</button>
                                    @else
                                        <button type="button"
                                            class="bg-info text-white py-2 px-4 border border-gray-500 rounded-md active:bg-blue-700 hover:bg-blue-700 w-100">Status
                                            Tidak Valid</button>
                                    @endif
                                </div>


                                @if ($order->payment_status == '1')
                                    <div class="form-group">,
                                        <label for="" class="font-weight-bold">Nama Pemesan</label>
                                        <input id="" class="w-100 p-2 border border-gray-300 rounded-md"
                                            type="text" value="{{ $order->user->name }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">Total Harga</label>
                                        <input id="" class="w-100 p-2 border border-gray-300 rounded-md"
                                            type="text" value="{{ $order->total_price }}" disabled>

                                    </div>
                                    <div class="form-group">
                                        <label for="metode_pembayaran" class="font-weight-bold">Metode Pembayaran</label>
                                        <select id="metode_pembayaran" name="metode_pembayaran"
                                            class="form-select w-100 p-2 border border-gray-300 rounded-md">
                                            <option value="Bank Transfer">Bank Transfer</option>
                                            <option value="Ovo">OVO</option>
                                            <option value="Gopay">GoPay</option>
                                            <option value="Dana">Dana</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="pengiriman" class="font-weight-bold">Pengiriman</label>
                                        <select id="pengiriman" name="pengiriman"
                                            class="form-select w-100 p-2 border border-gray-300 rounded-md">
                                            <option value="JNE">JNE</option>
                                            <option value="TIKI">TIKI</option>
                                            <option value="Pos Indonesia">Pos Indonesia</option>
                                            <option value="SiCepat">SiCepat</option>
                                            <option value="JNT">J&T</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_penerima" class="font-weight-bold">Nama Penerima</label>
                                        <input id="nama_penerima" class="w-100 p-2 border border-gray-300 rounded-md"
                                            type="text" name="nama_penerima" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat" class="font-weight-bold">Alamat</label>
                                        <textarea id="alamat" class="w-100 p-2 border border-gray-300 rounded-md" rows="3" name="alamat" required></textarea>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">Nama Pemesan</label>
                                        <input id="" class="w-100 p-2 border border-gray-300 rounded-md"
                                            type="text" value="{{ $order->user->name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">Total Harga</label>
                                        <input id="" class="w-100 p-2 border border-gray-300 rounded-md"
                                            type="text" value="{{ $order->total_price }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="metode_pembayaran" class="font-weight-bold">Metode Pembayaran</label>
                                        <input id="metode_pembayaran" class="w-100 p-2 border border-gray-300 rounded-md"
                                            type="text" value="{{ $order->metode_pembayaran }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="pengiriman" class="font-weight-bold">Pengiriman</label>
                                        <input id="pengiriman" class="w-100 p-2 border border-gray-300 rounded-md"
                                            type="text" value="{{ $order->pengiriman }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_penerima" class="font-weight-bold">Nama Penerima</label>
                                        <input id="nama_penerima" class="w-100 p-2 border border-gray-300 rounded-md"
                                            type="text" value="{{ $order->nama_penerima }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="font-weight-bold">Alamat</label>
                                        <textarea id="alamat" class="w-100 p-2 border border-gray-300 rounded-md" rows="3"
                                            disabled>{{ $order->alamat }}</textarea>
                                    </div>
                                @endif




                                @if ($order->payment_status == '1')
                                    <button type="submit"
                                        class="bg-dark text-white py-2 px-4 border border-gray-500 ">Bayar</button>

                                    <!-- Modal -->
                                @else
                                    <button type="button"
                                        class="bg-info text-white py-2 px-4 border border-gray-500 rounded-md active:bg-gray-700 hover:bg-gray-700">Tidak
                                        bisa melakukan pembayaran</button>
                                @endif
                            </form>
                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>
    </div>

    {{-- <div class="modal fade" id="payModal" tabindex="-1" aria-labelledby="payModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="payModalLabel">Konfirmasi
                        Pembayaran</h5>
                    <button type="button" class="btn btn-sm btn-dark " data-bs-dismiss="modal" aria-label="Close"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('home.bayar', $order->id) }}" method="POST">
                        <div class="form-group">
                            <label for="metode_pembayaran" class="font-weight-bold">Metode Pembayaran</label>
                            <select id="metode_pembayaran" name="metode_pembayaran"
                                class="form-select w-100 p-2 border border-gray-300 rounded-md">
                                <option value="bank_transfer">Bank Transfer</option>
                                <option value="credit_card">Kartu Kredit</option>
                                <option value="ovo">OVO</option>
                                <option value="gopay">GoPay</option>
                                <option value="dana">Dana</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pengiriman" class="font-weight-bold">Pengiriman</label>
                            <select id="pengiriman" name="pengiriman"
                                class="form-select w-100 p-2 border border-gray-300 rounded-md">
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos_indonesia">Pos Indonesia</option>
                                <option value="sicepat">SiCepat</option>
                                <option value="jnt">J&T</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_penerima" class="font-weight-bold">Nama Penerima</label>
                        <input id="nama_penerima" class="w-100 p-2 border border-gray-300 rounded-md" type="text"
                                name="nama_penerima" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="font-weight-bold">Alamat</label>
                            <textarea id="alamat" class="w-100 p-2 border border-gray-300 rounded-md" rows="3" name="alamat" required></textarea>
                        </div>

                        @csrf
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mx-1">Proceed</button>
                            <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Batal</button>
                        </div>

                    </form>
                </div>
          
            </div>
        </div>
    </div> --}}

    {{-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();

            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Pembayaran Berhasil!',
                        text: 'Terima kasih atas pembayaran Anda.',
                        confirmButtonText: 'OK'
                    });
                    console.log(result)
                },
                // Optional
                onPending: function(result) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Pembayaran Sedang Diproses',
                        text: 'Pembayaran Anda masih dalam proses. Harap tunggu konfirmasi lebih lanjut.',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Redirect atau lakukan tindakan lain setelah pengguna menekan OK
                        if (result.isConfirmed) {
                            window.location.href =
                                '/daftar-transaksi'; // Ganti dengan URL halaman informasi lainnya
                        }
                    });
                    console.log(result)
                },
                // Optional
                onError: function(result) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Pembayaran Sedang Diproses',
                        text: 'Pembayaran Anda masih dalam proses. Harap tunggu konfirmasi lebih lanjut.',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Redirect atau lakukan tindakan lain setelah pengguna menekan OK
                        if (result.isConfirmed) {
                            window.location.href =
                                '/daftar-transaksi'; // Ganti dengan URL halaman informasi lainnya
                        }
                    });
                    console.log(result)
                }
            });
        });
    </script> --}}
@endsection
