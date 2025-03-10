@extends('admin.layout')
@section('title', 'Transaksi')
@section('content')

    <div class="d-flex justify-content-between">
        <div>
            <a href="{{route('transaksi.create')}}" class="btn btn-primary">Tambah Transaksi</a>

        </div>

        <div class="">
            <div class="d-grid gap-2">
                <a href="#" class="btn btn-info" onclick="exportToPdf()"><i class="fas fa-file-pdf"></i> Export PDF</a>
                <a href="{{route('transaksi.export')}}" class="btn btn-success" ><i class="fas fa-file-excel"></i> Export Excel</a>
            </div>
        </div>

    </div>
    <div class="table-responsive mt-5 ">
        <table class="table table-striped table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Number</th>
                    <th scope="col">Produk - Harga Produk - Qty</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Payment Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($transaksi as $data)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->number }}</td>
                        <td>
                            <ul>
                                @foreach ($data->transaksiProduct as $product)
                                    <li>
                                        {{ $product->product->nama_produk }} -
                                        Rp.{{ number_format($product->product->harga_produk) }} - {{ $product->qty }}

                                    </li>
                                @endforeach

                            </ul>



                        <td> Rp. {{ number_format($data->total_price) }}</td>
                        <td>
                            @if ($data->payment_status == '1')
                                <button class="btn btn-warning">Menunggu Pembayaran</button>
                            @elseif($data->payment_status == '2')
                                <button class="btn btn-success">Sudah Dibayar</button>
                            @elseif($data->payment_status == '3')
                                <button class="btn btn-secondary">Kadaluarsa</button>
                            @elseif($data->payment_status == '4')
                                <button class="btn btn-danger">Batal</button>
                            @else
                                <button class="btn btn-info">Status Tidak Valid</button>
                            @endif
                        </td>
                        <td>

                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
