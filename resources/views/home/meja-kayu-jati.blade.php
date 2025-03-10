@extends('home.layout')
@section('title', 'Meja Kayu Jati')
@section('meta-tags')
    <meta name="description" content="Meja kayu minimalis ini terbuat dari kayu jati solid yang terkenal dengan kekuatan dan keawetannya. Desainnya yang sederhana namun elegan membuat meja ini cocok ditempatkan di berbagai ruang, seperti ruang tamu, ruang makan, atau bahkan ruang kerja.">
    <meta name="keywords" content="meja makan kayu, meja furniture">
@endsection
@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-5 px-5">
                    <img src="{{ asset('home/assets/img/Meja-Kayu.jpg') }}" alt="">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-5">
                    <h2 class="font-weight-bold">Meja Kayu Minimalis </h2>
                    <h3 class="font-weight-normal">Rp.1.000.000</h3>

                    <p style="text-align: justify;">
                        Meja kayu minimalis ini terbuat dari kayu jati solid yang terkenal dengan kekuatan dan keawetannya.
                        Desainnya yang sederhana namun elegan membuat meja ini cocok ditempatkan di berbagai ruang, seperti
                        ruang tamu, ruang makan, atau bahkan ruang kerja. Permukaan meja yang halus dan lapisan finishing
                        yang rapi memberikan sentuhan akhir yang sempurna dan tahan terhadap goresan. Bagi Anda yang
                        menginginkan meja dengan spesifikasi khusus, kami menawarkan layanan <a href="{{ route('home.custom-design') }}">custom design</a>. Selain itu, Anda
                        juga bisa melengkapi ruang kecil Anda dengan pilihan <a href="{{ route('home.mini-furniture') }}">mini furniture</a> kami yang fungsional dan
                        stylish.
                    </p>
                </div>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5">
                    <h2 class="text-center orange-text">Spesifikasi</h2>
                    <hr>

                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 my-5">
                    <h3 class="mb-4">Cocok Untuk</h3>
                    <ul class="p-0">
                        <li class="text-justify">
                            Rumah Tinggal
                        </li>
                        <li class="text-justify">
                            Kantor
                        </li>
                        <li>
                            Kafe atau restoran
                        </li>
                        <li class="text-justify">
                            Studio Kreatif
                        </li>

                    </ul>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 my-5">
                    <h3 class="mb-4">Fitur Utama</h3>
                    <ul class="p-0">
                        <li class="text-justify">
                            Desain Minimalis: Menambah estetika ruangan dengan tampilan yang sederhana dan elegan.
                        </li>
                        <li class="text-justify">
                            Konstruksi Kokoh: Dibuat dari kayu jati solid yang kuat dan tahan lama.
                        </li>
                        <li>
                            Finishing Berkualitas: Permukaan meja dilapisi dengan lapisan finishing berkualitas tinggi yang
                            memberikan perlindungan ekstra terhadap goresan dan noda.
                        </li>
                        <li class="text-justify">
                            Mudah Dibersihkan: Permukaan yang halus dan tidak mudah menyerap kotoran memudahkan dalam
                            perawatan sehari-hari.
                        </li>

                    </ul>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 my-5">
                    <h3 class="mb-4">Fitur</h3>

                    <ul class="pl-3">
                        <li class="text-justify">
                            Desain Minimalis: Menambah estetika ruangan dengan tampilan yang sederhana dan elegan. </li>
                        <li class="text-justify">
                            Konstruksi Kokoh: Dibuat dari kayu jati solid yang kuat dan tahan lama. </li>
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
                        Dengan meja kayu minimalis ini, Anda tidak hanya mendapatkan produk yang fungsional, tetapi juga
                        menambah nilai estetika pada ruangan Anda. Buatlah ruangan Anda lebih berkelas dengan sentuhan alami
                        dari kayu jati!
                    </p>
                    <h2 class="text-center orange-text mt-5">Kelebihan</h2>
                    <ul class="p-0">
                        <li>
                            Ramah Lingkungan: Terbuat dari kayu alami yang tahan lama dan dapat didaur ulang.

                        </li>
                        <li>
                            Multifungsi: Cocok untuk berbagai keperluan dan ruang.

                        </li>
                        <li>
                            Investasi Jangka Panjang: Kayu jati dikenal sebagai bahan yang tahan lama dan tidak mudah rusak.

                        </li>
                    </ul>

                </div>
            </div>

        </div>

    </div>
@endsection
