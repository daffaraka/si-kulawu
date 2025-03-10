@extends('home.layout')
@section('title', 'Furniture Kayu Jati Terbaik')
@section('meta-tags')
    <meta name="description" content="Lemari furnitur kayu jati ini menawarkan sentuhan elegan dan keanggunan klasik pada setiap ruangan. Dibuat dari kayu jati berkualitas tinggi, lemari ini tidak hanya kokoh dan tahan lama, tetapi juga memiliki estetika yang mewah dan natural.">
    <meta name="keywords" content="kayu jati terbaik, furniture kayu, furniture kayu, kayu jati">
@endsection
@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-5 px-5">
                    <img src="{{asset('home/assets/img/Furniture-Kayu-Jati.jpg')}}" alt="">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-5">
                    <h2 class="font-weight-bold">Furniture Kayu Jati</h2>
                    <h3 class="font-weight-normal">Rp.1.500.000</h3>
                    <p style="text-align: justify;">
                        Lemari furnitur kayu jati ini menawarkan sentuhan elegan dan keanggunan klasik pada setiap ruangan.
                        Dibuat dari kayu jati berkualitas tinggi, lemari ini tidak hanya kokoh dan tahan lama, tetapi juga
                        memiliki estetika yang mewah dan natural. Warna alami jati memberikan kesan hangat dan mewah, cocok
                        untuk berbagai gaya dekorasi interior, dari tradisional hingga modern. Kami juga menyediakan opsi
                        <a href="{{ route('home.custom-design') }}">custom design</a> yang memungkinkan Anda mendapatkan lemari yang sesuai dengan kebutuhan dan preferensi
                        khusus. Selain itu, bagi Anda yang mencari solusi untuk ruang kecil, koleksi <a href="{{ route('home.mini-furniture') }}">mini furniture</a> kami
                        bisa menjadi pilihan sempurna.
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
                            Desain Elegan: Lemari ini menampilkan ukiran halus yang menambah nilai estetika dan seni.
                        </li>
                        <li class="text-justify">
                            Ruang Penyimpanan Luas: Dilengkapi dengan beberapa rak dan laci yang luas, memberikan ruang yang
                            cukup
                            untuk menyimpan pakaian, aksesoris, atau barang-barang lainnya.
                        </li>
                        <li>
                            Pintu Ganda: Didesain dengan pintu ganda yang memudahkan akses dan memberikan kesan simetris
                            yang
                            indah.
                        </li>
                        <li class="text-justify">
                            Ketahanan Terhadap Serangga: Kayu jati secara alami tahan terhadap serangga dan rayap,
                            memastikan
                            lemari tetap awet dan aman untuk jangka waktu yang lama.
                        </li>
                        <li class="text-justify">
                            Perawatan Mudah: Permukaan kayu yang halus dan finishing yang berkualitas membuat lemari ini
                            mudah
                            dibersihkan dan dirawat.
                        </li>
                    </ul>
                </div>




                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-5">
                    <h2 class="text-center">Keunggulan</h2>
                    <p style="text-align: justify;">
                        Lemari furnitur kayu jati ini adalah pilihan yang sempurna bagi mereka yang menginginkan kombinasi
                        antara fungsi praktis dan penampilan estetis. Kekuatan dan daya tahan kayu jati memastikan bahwa
                        investasi Anda akan bertahan seumur hidup. Selain itu, desain yang elegan dan multifungsi membuatnya
                        menjadi pusat perhatian di setiap ruangan. Bagi Anda yang ingin sesuatu yang lebih personal, kami
                        juga menawarkan opsi <a href="{{ route('home.custom-design') }}">custom design</a> yang dapat disesuaikan dengan kebutuhan dan gaya interior Anda.
                    </p>
                </div>
            </div>

        </div>

    </div>
@endsection
