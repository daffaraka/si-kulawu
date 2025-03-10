@extends('home.layout')
@section('title', 'Menjadi Unik dengan Sentuhan Pribadi')
@section('meta-tags')
    <meta name="description" content="Custom design adalah solusi terbaik untuk menciptakan produk yang benar-benar mencerminkan kepribadian dan gaya hidup Anda. Baik itu pakaian, aksesori, furnitur, atau barang-barang digital, custom design memungkinkan Anda untuk memiliki sesuatu yang benar-benar eksklusif dan dibuat khusus sesuai keinginan Anda.">
    <meta name="keywords" content="custom design furniture">
@endsection
@section('content')
<div class="product-section mt-150 mb-150">
    <div class="container">

            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-5 px-5">
                    <img src="{{asset('home/assets/img/Custome-Design.jpg')}}" alt="">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-5">
                    <h2 class="font-weight-bold">Menjadi Unik dengan Sentuhan Pribadi</h2>
                    <p style="text-align: justify;">
                        Dalam dunia yang serba cepat ini, setiap individu ingin mengekspresikan diri mereka dengan cara yang
                        unik dan autentik. Custom design adalah solusi terbaik untuk menciptakan produk yang benar-benar
                        mencerminkan kepribadian dan gaya hidup Anda. Baik itu pakaian, aksesori, <a href="{{ route('home.furniture-kayu-jati') }}">furniture kayu</a>, atau
                        barang-barang digital, custom design memungkinkan Anda untuk memiliki sesuatu yang benar-benar
                        eksklusif dan dibuat khusus sesuai keinginan Anda. Dari <a href="{{ route('home.meja-kayu-jati') }}">meja kayu</a> hingga <a href="{{ route('home.mini-furniture') }}">mini furniture</a>, setiap
                        produk dapat dirancang agar sesuai dengan kebutuhan spesifik Anda, memberikan sentuhan personal pada
                        setiap detail.
                    </p>
                </div>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5">
                    <h2 class="text-center orange-text">Spesifikasi</h2>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 my-5">
                    <h3 class="mb-4">Kelebihan Custom Design</h3>
                    <ul class="pl-3 pr-5">
                        <li class="text-justify">
                            <b> Personalisasi Tanpa Batas:</b> Dengan custom design, Anda bisa memilih bahan, warna, bentuk,
                            dan detail lainnya yang sesuai dengan preferensi Anda. Ini memberikan kebebasan untuk
                            menciptakan sesuatu yang benar-benar unik.
                        </li>
                        <li class="text-justify">
                            <b> Kualitas Terjamin: </b> Produk custom design biasanya dibuat dengan tangan oleh ahli yang
                            berpengalaman, memastikan setiap detail dibuat dengan sempurna dan dengan kualitas terbaik.
                        </li>
                        <li>
                            <b> Ekspresi Diri:</b> Custom design memungkinkan Anda untuk mengekspresikan diri dengan cara
                            yang tidak mungkin dilakukan dengan produk massal. Ini adalah cara terbaik untuk
                            menunjukkan kepribadian dan gaya Anda kepada dunia.
                        </li>
                        <li class="text-justify">
                            <b> Kesempatan Berkolaborasi : </b> Proses custom design sering kali melibatkan kolaborasi
                            antara desainer dan pelanggan, memastikan hasil akhir sesuai dengan visi dan harapan Anda.
                        </li>

                    </ul>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 my-5">
                    <h3 class="mb-4">Proses Custom Design</h3>

                    <ul class="pl-3">
                        <li class="text-justify">
                            <b> Konsultasi Awal : </b> Proses dimulai dengan diskusi antara desainer dan Anda untuk memahami
                            kebutuhan, preferensi, dan inspirasi Anda.
                        </li>
                        <li class="text-justify">
                            <b> Desain Konsep : </b> Desainer akan membuat konsep awal berdasarkan konsultasi tersebut. Anda
                            akan diberikan beberapa pilihan untuk dipertimbangkan.
                        </li>
                        <li>
                            <b> Revisi dan Finalisasi :</b>Setelah memilih konsep yang paling Anda sukai, Anda dapat
                            memberikan masukan untuk revisi. Desainer akan melakukan penyesuaian hingga Anda benar-benar
                            puas dengan desain akhir.
                        </li>
                        <li class="text-justify">
                            <b> Produksi :</b> Setelah desain disetujui, produk akan diproduksi dengan kualitas terbaik,
                            menggunakan bahan dan teknik yang telah disepakati.
                        </li>
                        <li class="text-justify">
                            <b> Pengiriman : </b>Produk custom design Anda siap dikirim dan dinikmati.
                        </li>
                    </ul>
                </div>




                
            </div>

        </div>

    </div>
@endsection
