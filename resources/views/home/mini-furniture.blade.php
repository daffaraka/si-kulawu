@extends('home.layout')
@section('title', 'Mini Furniture')
@section('meta-tags')
    <meta name="description" content="Bawa pesona kecil ke ruangan Anda dengan set mini furniture kami. Set ini terdiri dari kursi, meja, dan lemari kecil yang dibuat dengan detail halus dan presisi. Didesain untuk memberikan sentuhan dekoratif yang manis dan fungsional di ruang terbatas.">
    <meta name="keywords" content="furniture mini, minimalis furniture">
@endsection
@section('content')
    <div class="product-section mt-150 mb-150">
          <div class="container">

            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-5 px-5">
                    <img src="{{ asset('home/assets/img/Mini-Furniture.jpg') }}" alt="">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-5">
                    <h2 class="font-weight-bold">Mini Furniture</h2>
                    <h3 class="font-weight-normal">Rp.1.500.000</h3>

                    <p style="text-align: justify;">
                        Bawa pesona kecil ke ruangan Anda dengan set mini furniture kami. Set ini terdiri dari kursi, <a href="{{ route('home.meja-kayu-jati') }}">meja kayu</a>,
                        dan lemari kecil yang dibuat dengan detail halus dan presisi. Didesain untuk memberikan
                        sentuhan dekoratif yang manis dan fungsional di ruang terbatas. Cocok untuk kolektor miniatur atau
                        sebagai tambahan menarik untuk dekorasi rumah Anda. Kami juga menyediakan berbagai pilihan <a href="{{ route('home.furniture-kayu-jati') }}">furniture kayu</a>
                        dengan kualitas terbaik, serta layanan <a href="{{ route('home.custom-design') }}">custom design</a> untuk menciptakan furnitur yang sesuai
                        dengan gaya dan kebutuhan spesifik Anda.
                    </p>
                </div>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5">
                    <h2 class="text-center orange-text">Spesifikasi</h2>
                    <hr>

                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 my-5">
                    <h3 class="mb-4">Fitur Utama</h3>
                    <ul class="pl-3">
                        <li class="text-justify">
                            <b>Material: </b> Terbuat dari kayu dengan finishing halus untuk tampilan yang elegan.
                        </li>
                        <li class="text-justify">
                            <b> Ukuran : </b> Skala kecil yang ideal untuk meja samping, rak buku mini, atau sebagai hiasan.
                        </li>
                        <li>
                            <b> Desain : </b> Detail yang teliti dengan aksen yang menawan untuk menambah keindahan estetika
                            ruangan.
                        </li>

                    </ul>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 my-5">
                    <h3 class="mb-4">Keunggulan</h3>
                    <ul class="pl-3">
                        <li class="text-justify">
                            Cocok sebagai hadiah untuk pecinta miniatur atau penggemar dekorasi rumah.
                        </li>
                        <li class="text-justify">
                            Mudah dipindahkan dan ditempatkan di berbagai sudut ruangan.
                        </li>
                        <li>
                            Menawarkan kombinasi antara fungsi dan estetika dalam ruang yang terbatas.
                        </li>

                    </ul>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 my-5">
                    <h3 class="mb-4">Aplikasi</h3>

                    <ul class="pl-3">
                        <li class="text-justify">
                            Hiasan di ruang tamu, kamar tidur, atau ruang kerja. </li>
                        <li class="text-justify">
                            Koleksi miniatur untuk menambahkan dimensi ke dalam koleksi Anda </li>
                    </ul>
                </div>


            </div>

        </div>

    </div>
@endsection
