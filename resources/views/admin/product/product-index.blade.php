@extends('admin.layout')
@section('content')
    <a href="{{route('product.create')}}" class="btn btn-primary">Tambah Produk</a>

    <div class="table-responsive mt-5 ">
        <table class="table table-striped table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Gambar Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($product as $data)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_produk }}</td>
                        <td>
                            <img src="{{ asset('produk/'.$data->gambar_produk) }}" width="200" alt="">
                        </td>
                        <td>Rp. {{ number_format($data->harga_produk) }}</td>
                        <td>{{ $data->stok }}</td>
                        <td>
                            <a href="{{route('product.edit',$data->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('product.destroy',$data->id)}}" class="btn btn-danger">Hapus</a>

                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
