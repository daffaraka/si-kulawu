@extends('home.layout')
@section('title','Tentang Menak Furniture')
@section('meta-tags')
    <meta name="description" content="Selamat datang di Menak Furniture! Kami adalah penyedia furnitur berkualitas tinggi yang mengutamakan kenyamanan dan gaya. Misi kami adalah menghadirkan produk yang menarik, tahan lama, dan fungsional untuk setiap rumah.">
    <meta name="keywords" content="tentang menak furniture">
@endsection
@section('content')
    <div class="product-section">
        <div class="container" style="padding: 30vh 0;">
            <h3 class="text-center">Tentang Kami</h3>
            <p>
                Selamat datang di Menak Furniture! Kami adalah penyedia furniture berkualitas tinggi yang mengutamakan
                kenyamanan dan gaya. Misi kami adalah menghadirkan produk yang menarik, tahan lama, dan fungsional untuk
                setiap rumah. Dari <a href="{{ route('home.furniture-kayu-jati') }}">furniture kayu</a> jati hingga <a href="{{ route('home.mini-furniture') }}">mini furniture</a> elegan, semua
                produk kami dirancang dengan perhatian terhadap detail dan kualitas. Kami juga menawarkan <a href="{{ route('home.meja-kayu-jati') }}">meja kayu</a> dengan berbagai desain dan ukuran yang sesuai untuk berbagai ruangan. Selain itu, Anda dapat
                memesan <a href="{{ route('home.custom-design') }}">custom design</a> yang unik dan disesuaikan dengan kebutuhan dan selera pribadi. Menak
                Furniture berkomitmen untuk memberikan pengalaman belanja yang menyenangkan dengan layanan pelanggan yang
                luar biasa.
            </p>
        </div>

    </div>
@endsection
