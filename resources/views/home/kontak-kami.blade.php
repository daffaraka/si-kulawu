@extends('home.layout')
@section('title', 'Kontak Kami')
@section('meta-tags')
    <meta name="description"
        content="Menak Furniture selalu siap membantu Anda. Silakan hubungi tim layanan pelanggan kami untuk informasi lebih lanjut tentang produk, pesanan, atau pertanyaan lainnya.">
    <meta name="keywords" content="kontak menak furniture">
@endsection
@section('content')
    <div class="product-section" style="margin: 30vh; ">
        <div class="container">
            <p style="font-family: Arial, sans-serif; font-size: 16px; color: #333; margin-bottom: 60px;">
                Terima kasih telah mengunjungi <strong>Menak Furniture</strong>! Jika Anda mencari produk
                <a href="#">furniture kayu</a> berkualitas tinggi yang menggabungkan kekuatan dan estetika, Anda berada
                di tempat yang tepat. Kami menawarkan berbagai pilihan
                <a href="#">meja kayu</a> yang elegan dan tahan lama, serta solusi
                <a href="#">custom design</a> untuk Anda yang ingin furnitur dibuat sesuai keinginan dan kebutuhan.
                Selain itu, koleksi
                <a href="#">mini furniture</a> kami sangat cocok untuk ruang terbatas, memberikan fungsi maksimal
                tanpa mengorbankan gaya. Hubungi kami hari ini untuk informasi lebih lanjut atau konsultasi mengenai produk
                yang sesuai dengan kebutuhan Anda.
            </p>

            <h2 class="mb-5">FAQ Menak Furniture</h2>


            <div class="content-faq my-5">
                <!-- Pertanyaan 1 -->

                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-xxl-6 col-sm-12 col-md-12 col-xs-12">
                        <div class="my-3">
                            <p class="d-inline-flex gap-1">
                                <a class="font-weight-bold text-dark" data-bs-toggle="collapse" href="#collapseOne"
                                    role="button" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Apa itu Menak Furniture?
                                </a>
                            </p>
                            <div class="collapse" id="collapseOne">
                                <div class="card card-body">
                                    Menak Furniture adalah usaha kerajinan kayu yang menawarkan berbagai jenis furniture
                                    berkualitas
                                    tinggi untuk kebutuhan rumah dan kantor. Kami menyediakan beragam produk dengan desain
                                    modern,
                                    klasik, hingga minimalis yang dapat disesuaikan dengan gaya hidup Anda.
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 2 -->
                        <div class="my-3">
                            <p class="d-inline-flex gap-1">
                                <a class="font-weight-bold text-dark" data-bs-toggle="collapse" href="#collapseTwo"
                                    role="button" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Bagaimana cara melakukan pemesanan
                                    di Menak
                                    Furniture?
                                </a>
                            </p>
                            <div class="collapse" id="collapseTwo">
                                <div class="card card-body">
                                    Untuk memesan produk di Menak Furniture, ikuti langkah-langkah berikut:
                                    <ul>
                                        <li>Pilih produk yang Anda inginkan.</li>
                                        <li>Klik tombol "Lihat Produk" atau "Tambah ke Keranjang".</li>
                                        <li>Lanjutkan ke halaman pembayaran.</li>
                                        <li>Masukkan detail pengiriman dan pilih metode pembayaran.</li>
                                        <li>Setelah pembayaran berhasil, Anda akan menerima konfirmasi pesanan melalui
                                            email.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 3 -->
                        <div class="my-3">
                            <p class="d-inline-flex gap-1">
                                <a class="font-weight-bold text-dark" data-bs-toggle="collapse" href="#collapseThree"
                                    role="button" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Apa saja metode pembayaran yang
                                    tersedia?
                                </a>
                            </p>
                            <div class="collapse" id="collapseThree">
                                <div class="card card-body">
                                    Kami menerima berbagai metode pembayaran, termasuk:
                                    <ul>
                                        <li>Transfer Bank</li>
                                        <li>Kartu Kredit/Debit (Visa, MasterCard)</li>
                                        <li>E-Wallet (OVO, GoPay, Dana)</li>
                                        <li>Bayar di tempat (Cash on Delivery) untuk wilayah Singaraja.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 4 -->
                        <div class="my-3">
                            <p class="d-inline-flex gap-1">
                                <a class="font-weight-bold text-dark" data-bs-toggle="collapse" href="#collapseFour"
                                    role="button" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Berapa lama waktu pengiriman?
                                </a>
                            </p>
                            <div class="collapse" id="collapseFour">
                                <div class="card card-body">
                                    Waktu pengiriman tergantung lokasi tujuan. Estimasi waktu pengiriman sebagai berikut:
                                    <ul>
                                        <li>Wilayah Singaraja: 2-5 hari kerja</li>
                                        <li>Pulau Jawa: 3-7 hari kerja</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 5 -->
                        <div class="my-3">
                            <p class="d-inline-flex gap-1">
                                <a class="font-weight-bold text-dark" data-bs-toggle="collapse" href="#collapseFive"
                                    role="button" aria-expanded="false" aria-controls="collapseFive">
                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Apakah saya bisa mengubah atau
                                    membatalkan
                                    pesanan setelah melakukan pemesanan?
                                </a>
                            </p>
                            <div class="collapse" id="collapseFive">
                                <div class="card card-body">
                                    Jika pesanan Anda belum diproses untuk pengiriman, Anda masih dapat mengubah atau
                                    membatalkan
                                    pesanan. Untuk melakukan perubahan atau pembatalan, segera hubungi layanan pelanggan
                                    kami dengan
                                    menyertakan nomor pesanan Anda. Jika pesanan sudah dalam proses pengiriman, sayangnya,
                                    perubahan
                                    atau pembatalan tidak dapat dilakukan, tetapi Anda bisa mengikuti prosedur pengembalian
                                    barang
                                    setelah pesanan diterima.
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-6 col-xxl-6 col-sm-12 col-md-12 col-xs-12">
                        <div class="my-3">
                            <p class="d-inline-flex gap-1">
                                <a class="font-weight-bold text-dark" data-bs-toggle="collapse" href="#collapseSix"
                                    role="button" aria-expanded="false" aria-controls="collapseSix">
                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Bagaimana kebijakan pengembalian
                                    barang di
                                    Menak Furniture?
                                </a>
                            </p>
                            <div class="collapse" id="collapseSix">
                                <div class="card card-body">
                                    Kami memiliki kebijakan pengembalian barang sebagai berikut:
                                    <ul>
                                        <li>Pengembalian dapat dilakukan dalam waktu 7 hari setelah barang diterima.</li>
                                        <li>Barang harus dalam kondisi asli, belum dipakai, dan dalam kemasan aslinya.</li>
                                        <li>Hubungi layanan pelanggan kami untuk proses pengembalian atau penggantian
                                            barang.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 7 -->
                        <div class="my-3">
                            <p class="d-inline-flex gap-1">
                                <a class="font-weight-bold text-dark" data-bs-toggle="collapse" href="#collapseSeven"
                                    role="button" aria-expanded="false" aria-controls="collapseSeven">
                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Apakah ada garansi untuk produk
                                    Menak
                                    Furniture?
                                </a>
                            </p>
                            <div class="collapse" id="collapseSeven">
                                <div class="card card-body">
                                    Ya, kami memberikan garansi untuk produk-produk tertentu. Informasi lebih lanjut
                                    mengenai
                                    garansi akan tertera di deskripsi produk yang Anda pilih.
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 8 -->
                        <div class="my-3">
                            <p class="d-inline-flex gap-1">
                                <a class="font-weight-bold text-dark" data-bs-toggle="collapse" href="#collapseEight"
                                    role="button" aria-expanded="false" aria-controls="collapseEight">
                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Apakah Menak Furniture menawarkan
                                    layanan
                                    pemasangan furniture?
                                </a>
                            </p>
                            <div class="collapse" id="collapseEight">
                                <div class="card card-body">
                                    Kami menawarkan layanan pemasangan furniture untuk produk tertentu dengan biaya
                                    tambahan,
                                    tergantung lokasi pengiriman dan jenis produk. Informasi lebih lanjut akan diberikan
                                    saat proses
                                    checkout.
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 9 -->
                        <div class="my-3">
                            <p class="d-inline-flex gap-1">
                                <a class="font-weight-bold text-dark" data-bs-toggle="collapse" href="#collapseNine"
                                    role="button" aria-expanded="false" aria-controls="collapseNine">
                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Bagaimana cara menghubungi
                                    layanan
                                    pelanggan Menak Furniture?
                                </a>
                            </p>
                            <div class="collapse" id="collapseNine">
                                <div class="card card-body">
                                    Anda dapat menghubungi layanan pelanggan kami melalui:
                                    <ul>
                                        <li>Email: menakfurniture@gmail.com</li>
                                        <li>Instagram: @menak.furniture</li>
                                        <li>Telepon/WhatsApp: +62 823-3967-7216</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 10 -->
                        <div class="my-3">
                            <p class="d-inline-flex gap-1">
                                <a class="font-weight-bold text-dark" data-bs-toggle="collapse" href="#collapseTen"
                                    role="button" aria-expanded="false" aria-controls="collapseTen">
                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Apakah Menak Furniture memiliki
                                    toko
                                    fisik?
                                </a>
                            </p>
                            <div class="collapse" id="collapseTen">
                                <div class="card card-body">
                                    Ya, selain beroperasi secara online, Menak Furniture juga memiliki toko fisik. Anda
                                    dapat
                                    mengunjungi toko kami di <a href="https://maps.app.goo.gl/grDC6fmcZGGQfMZu8">lokasi
                                        ini</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Pertanyaan 6 -->

            </div>


            <hr>
            <div class="kontak">
                <h5> WhatsApp: <span class="text-warning">+62 823-3967-7216 </span>
                </h5>
                <h5> Instagram: <span class="text-warning"> @menak.furniture </span>
                </h5>
                <h5> Email: <span class="text-warning"> menakfurniture@gmail.com</span>
                </h5>
            </div>



        </div>

    </div>

@endsection
