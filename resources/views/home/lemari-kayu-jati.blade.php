@extends('home.layout')
@section('title', 'Lemari Kayu Jati')
@section('meta-tags')
    <meta name="description" content="Lemari Kayu Jati Elegan adalah pilihan sempurna untuk Anda yang menginginkan kombinasi keindahan dan fungsionalitas dalam satu produk. Dibuat dari kayu jati berkualitas tinggi, lemari ini tidak hanya menambah estetika ruangan Anda, tetapi juga menawarkan kekuatan dan ketahanan yang luar biasa.">
    <meta name="keywords" content="lemari jati terbaik, furniture”, furniture lemari">
@endsection
@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-5">
                    <img src="{{ asset('home/assets/img/Lemari-Kayu-Jati.jpg') }}" alt="">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-5">
                    <h2 class="font-weight-bold">Lemari Kayu Jati </h2>
                    <h3 class="font-weight-normal">Rp.2.000.000</h3>

                    <p style="text-align: justify;">
                        Lemari Kayu Jati Elegan adalah pilihan sempurna untuk Anda yang menginginkan kombinasi keindahan dan
                        fungsionalitas dalam satu produk. Dibuat dari kayu jati berkualitas tinggi, lemari ini tidak hanya
                        menambah estetika ruangan Anda, tetapi juga menawarkan kekuatan dan ketahanan yang luar biasa. Jika
                        Anda ingin lemari yang disesuaikan dengan kebutuhan spesifik Anda, kami menyediakan layanan <a href="{{ route('home.custom-design') }}">custom design</a>. 
                        Selain itu, bagi Anda yang membutuhkan solusi furnitur untuk ruang kecil, koleksi <a href="{{ route('home.mini-furniture') }}">mini furniture</a> kami adalah pilihan yang ideal.
                    </p>
                </div>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5">
                    <h2 class="text-center orange-text">Spesifikasi</h2>

                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 my-5">
                    <h3 class="mb-4">Cocok Untuk</h3>
                    <ul>
                        <li class="text-justify">
                            Kamar Tidur
                        </li>
                        <li class="text-justify">
                            Ruang Tamu
                        </li>
                        <li>
                            Ruang Keluarga
                        </li>
                        <li class="text-justify">
                            Ruang Kerja
                        </li>

                    </ul>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 my-5">
                    <h3 class="mb-4">Fitur</h3>

                    <ul class="pl-3">
                        <li class="text-justify">
                            Tahan Lama: Kayu jati dikenal karena daya tahannya terhadap kerusakan dan serangan serangga.
                        </li>
                        <li class="text-justify">
                            Mudah Perawatan: Mudah dibersihkan dan dirawat, cukup lap dengan kain lembab.
                        </li>
                        <li>
                            Pintu Ganda: Didesain dengan pintu ganda yang memudahkan akses dan memberikan kesan simetris
                            yang
                            indah.
                        </li>
                        <li class="text-justify">
                            Ramah Lingkungan: Dibuat dari kayu jati yang dipanen secara berkelanjutan, mendukung praktik
                            ramah lingkungan
                        </li>
                    </ul>
                </div>




                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-5">
                    <h2 class="text-center">Keunggulan</h2>
                    <p style="text-align: justify;">
                        Lemari Kayu Jati Elegan adalah investasi jangka panjang untuk rumah Anda, memberikan kombinasi
                        sempurna antara fungsi dan keindahan alami kayu jati. Miliki sekarang dan tambahkan sentuhan
                        kemewahan pada interior Anda.
                    </p>
                </div>
            </div>

        </div>

    </div>
@endsection
