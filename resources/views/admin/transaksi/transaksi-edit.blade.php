@extends('admin.layout')
@section('content')
    <div class="pb-5">
        <h1>Edit Transaksi</h1>

        <div class="row">
            <div class="col-6">
                @foreach ($transaksi->transaksiProduct as $transaksiProduct)
                    <div class="d-flex">
                        <img src="{{ asset('produk/' . $transaksiProduct->product->gambar_produk) }}" alt=""
                            style="max-height:150px; " class="img-fluid border p-2 shadow m-2">
                        <div class="d-flex flex-column ms-3 py-2">
                            <h5 class="text-truncate font-weight-bold font-size-48"><a href="#"
                                    class="text-dark">{{ $transaksiProduct->product->nama_produk }} </a>
                            </h5>
                            <p class="text-muted mb-2">Quantity: {{ $transaksiProduct->qty }} </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Detail Transaksi
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="">Number</label>
                            <input id="" class="form-control" type="text" name="number"
                                value="{{ $transaksi->number }}" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Nama Pemesan</label>
                            <input id="" class="form-control" type="text" name="user_id"
                                value="{{ $transaksi->user->name }}" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Total Harga</label>
                            <input id="" class="form-control" type="text" name="total_price"
                                value="{{ $transaksi->total_price }}" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Status Sekarang</label>
                            <input id="" class="form-control" type="text" name="total_price"
                                value="@if($transaksi->payment_status == 1) Menunggu Pembayaran
                                @elseif($transaksi->payment_status == 2) Pembayaran Dikonfirmasi
                                @elseif($transaksi->payment_status == 3) Diproses
                                @elseif($transaksi->payment_status == 4) Dikirim
                                @elseif ($transaksi->payment_status == 5) Sampai di Tujuan
                                @elseif ($transaksi->payment_status == 6) Selesai
                                @else Status Tidak Diketahui @endif" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Bukti Pembayaran</label> <br>
                            <a href="{{ asset('storage/' . $transaksi->bukti_pembayaran) }}" class="btn btn-info"> <i
                                class="fas fa-file-invoice"> </i> Bukti Pembayaran</a>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        Perbarui Status
                    </div>
                    <div class="card-body">
                        <form action="{{ route('transaksi.update', ['transaksi' => $transaksi->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="">Perbarui Status</label>
                                <select id="" class="form-control" type="text" name="payment_status">
                                    <option value="1" {{ $transaksi->payment_status == '1' ? 'selected' : '' }}>
                                        Menunggu Pembayaran</option>
                                    <option value="2" {{ $transaksi->payment_status == '2' ? 'selected' : '' }}>
                                        Pembayaran Dikonfirmasi</option>
                                    <option value="3" {{ $transaksi->payment_status == '3' ? 'selected' : '' }}>
                                        Diproses</option>
                                    <option value="4" {{ $transaksi->payment_status == '4' ? 'selected' : '' }}>
                                        Dikirim</option>
                                    <option value="5" {{ $transaksi->payment_status == '5' ? 'selected' : '' }}>Sampai
                                        di Tujuan</option>
                                    <option value="6" {{ $transaksi->payment_status == '6' ? 'selected' : '' }}>
                                        Selesai</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Perbarui</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
