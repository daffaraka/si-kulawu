@extends('admin.layout')
@section('title','Review')
@section('content')
    <div class="table-responsive mt-5 ">
        <table class="table table-striped table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produk</th>

                    <th scope="col">Isi Review</th>
                    <th scope="col">User</th>
                    <th scope="col">Bintang</th>
                    {{-- <th>Action</th> --}}

                </tr>
            </thead>
            <tbody>

                @foreach ($reviews as $review)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $review->product->nama_produk }}</td>
                        <td>{{ $review->ulasan }}</td>
                        <td>{{ $review->user->name }}</td>
                        <td><i class="fa fa-star text-warning" aria-hidden="true"></i> {{ $review->rating }}</td>
                        <td>
                            {{-- <a href="{{route('review.edit',$review->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('review.destroy',$review->id)}}" class="btn btn-danger">Hapus</a> --}}

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
