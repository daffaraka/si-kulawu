@extends('admin.layout')
@section('title', 'Transaksi')
@section('content')

    <div class="d-flex justify-content-between">
        <div>
            {{-- <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a> --}}

        </div>

        <div class="">
            <div class="d-grid gap-2">
                <a href="{{route('transaksi.print')}}" class="btn btn-info" onclick="exportToPdf()"><i class="fas fa-file-pdf"></i> Export PDF</a>
                <a href="{{ route('transaksi.export') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Export
                    Excel</a>
            </div>
        </div>

    </div>
    <div class="table-responsive mt-5 ">
        <table class="table table-striped table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">No. Pesanan</th>
                    <th scope="col">Tanggal Pemesanan</th>
                    <th scope="col">Nama & <br> Kontak Customer</th>
                    <th scope="col" class="w-25">Detail Produk</th>
                    <th scope="col">Total Harga + Ongkir</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Status Pesanan</th>
                    <th scope="col">No. Resi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($transaksi as $data)
                
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->order_id }}</td>
                        <td>{{ $data->created_at->format('d-m-Y H:i') }}</td>
                        <td>{{ $data->user->name }} - {{ $data->user->email }} - {{ $data->user->phone }}</td>
                        <td>
                            <ul>
                                @foreach ($data->transaksiProduct as $product)
                                    <li>
                                        {{ $product->product->nama_produk }} - {{ $product->qty }} -
                                        Rp.{{ number_format($product->product->harga_produk) }}
                                    </li>
                                @endforeach

                            </ul>
                        </td>
                        <td> Rp. {{ number_format($data->total_price) }}</td>
                        <td>{{ $data->metode_pembayaran }}</td>
                        <td>
                            @if ($data->payment_status == '1')
                                <button class="btn btn-sm btn-warning">Menunggu Pembayaran</button>
                            @elseif($data->payment_status == '2')
                                <button class="btn btn-sm btn-success">Pembayaran Dikonfirmasi</button>
                            @elseif($data->payment_status == '3')
                                <button class="btn btn-sm btn-primary">Diproses</button>
                            @elseif($data->payment_status == '4')
                                <button class="btn btn-sm btn-info">Dikirim</button>
                            @elseif($data->payment_status == '5')
                                <button class="btn btn-sm btn-light">Sampai di Tujuan</button>
                            @elseif($data->payment_status == '6')
                                <button class="btn btn-sm btn-success">Selesai</button>
                            @else
                                <button class="btn btn-sm btn-secondary">Status Tidak Valid</button>
                            @endif
                        </td>
                        <td>{{ $data->no_resi }}</td>
                        <td>
                            {{-- <ul> --}}
                                {{-- <a href="{{ route('transaksi.show', $data->id) }}" class="btn btn-info">Show</a> --}}
                                <a href="{{ route('transaksi.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            {{-- </ul> --}}
                        </td>
                    </tr>
                @endforeach


                {{ $transaksi->links() }}
            </tbody>
        </table>
    </div>
@endsection
