@extends('home.layout')
@section('title', 'Lakukan Pembayaran')
@section('content')
    <div class="product-section">
        <div class="container" style="padding: 25vh 0;">
            <h3>Lakukan pembayaran</h3>
            <div class="row row-cols-2 mt-5">


                <div class="col-8">
                    @foreach ($order->transaksiProduct as $item)
                        <div class="card border shadow-none mb-3">
                            <div class="card-body border border-5 shadow shadow-sm">

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
                                        <button class="btn btn-sm btn-warning">Menunggu Pembayaran</button>
                                    @elseif($order->payment_status == '2')
                                        <button class="btn btn-sm btn-success">Pembayaran Dikonfirmasi</button>
                                    @elseif($order->payment_status == '3')
                                        <button class="btn btn-sm btn-primary">Diproses</button>
                                    @elseif($order->payment_status == '4')
                                        <button class="btn btn-sm btn-info">Dikirim</button>
                                    @elseif($order->payment_status == '5')
                                        <button class="btn btn-sm btn-light">Sampai di Tujuan</button>
                                    @elseif($order->payment_status == '6')
                                        <button class="btn btn-sm btn-success">Selesai</button>
                                    @else
                                        <button class="btn btn-sm btn-secondary">Status Tidak Valid</button>
                                    @endif
                                </div>


                                @if ($order->payment_status == 1)
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
                                    {{-- <div class="form-group">
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
                                    </div> --}}
                                    @if ($order->nama_penerima != null && $order->alamat != null)
                                        <div class="form-group">
                                            <label for="nama_penerima" class="font-weight-bold">Nama Penerima</label>
                                            <input id="nama_penerima" class="w-100 p-2 border border-gray-300 rounded-md"
                                                type="text" name="nama_penerima" disabled
                                                value="{{ $order->nama_penerima }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat" class="font-weight-bold">Alamat</label>
                                            <textarea id="alamat" class="w-100 p-2 border border-gray-300 rounded-md" rows="3" name="alamat" disabled>{{ $order->alamat }}</textarea>
                                        </div>


                                        <div class="card mt-3">
                                            <div class="card-header bg-transparent">
                                                Informasi Pembayaran
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">Nama Bank: <b> BCA</b></p>
                                                <p class="mb-0">No. Rekening: <b>0600754475</b> </p>
                                                <p class="mb-0">a.n <b> Fadli Izdiharuddin Aufar</b> </p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="nama_penerima" class="font-weight-bold">Nama Penerima</label>
                                            <input id="nama_penerima" class="w-100 p-2 border border-gray-300 rounded-md"
                                                type="text" name="nama_penerima" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat" class="font-weight-bold">Alamat</label>
                                            <textarea id="alamat" class="w-100 p-2 border border-gray-300 rounded-md" rows="3" name="alamat" required></textarea>
                                        </div>
                                    @endif
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
                                        <label for="nama_penerima" class="font-weight-bold">Nama Penerima</label>
                                        <input id="nama_penerima" class="w-100 p-2 border border-gray-300 rounded-md"
                                            type="text" value="{{ $order->nama_penerima }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="font-weight-bold">Alamat</label>
                                        <textarea id="alamat" class="w-100 p-2 border border-gray-300 rounded-md" rows="3" disabled>{{ $order->alamat }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        @if ($order->bukti_pembayaran != null)
                                            <a href="{{ asset('storage/' . $order->bukti_pembayaran) }}" class="btn btn-outline-dark"> <i
                                                    class="fas fa-file-invoice"></i> Bukti Pembayaran</a>
                                        @else
                                            <a href="#" class="btn btn-outline-dark" disabled> <i
                                                    class="fas fa-file-invoice"></i> Belum ada bukti pembayaran</a>
                                        @endif
                                    </div>
                                @endif




                                @if ($order->payment_status == 1)

                                    <div class="mt-2">
                                        @if ($order->nama_penerima != null && $order->alamat != null && $order->bukti_pembayaran == null)
                                            <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#uploadModal">Upload Bukti</button>
                                        @else
                                            <button type="submit"
                                                class="bg-dark text-white py-2 px-4 border border-gray-500 ">Bayar</button>
                                        @endif
                                    </div>


                                    <!-- Modal -->
                                @else
                                    <button type="button"
                                        class="bg-info text-white py-2 px-4 border border-gray-500 rounded-md active:bg-gray-700 hover:bg-gray-700">Menunggu
                                        admin mengkonfirmasi</button>
                                @endif
                            </form>
                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>


    <div id="uploadModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Upload Bukti Pembayaran</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formUploadBukti" action="{{ route('home.uploadBuktiPembayaran', $order->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="bukti_pembayaran" class="font-weight-bold">Bukti Pembayaran</label>
                            <input id="bukti_pembayaran" class="w-100 p-2 border border-gray-300 rounded-md"
                                type="file" name="bukti_pembayaran" accept="image/*" required>
                        </div>
                  

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button data-dismiss="modal" class="btn btn-danger"> Batalkan</button>
                    </div>
                </form>
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


@push('scripts')
    <script>
        const formUploadBukti = document.querySelector('#formUploadBukti');
        formUploadBukti.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: data.message,
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/daftar-transaksi';
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: data.message,
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
@endpush