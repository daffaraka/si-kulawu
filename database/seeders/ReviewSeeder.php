<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $products = Product::pluck('id')->toArray();
        $transaksis = Transaksi::pluck('id')->toArray();

        // Buat 20 ulasan produk
        for ($i = 0; $i < 20; $i++) {
            $ulasanVariasi = [
                'Produk ini sangat bagus dan sesuai dengan harapan.',
                'Kualitas produk memuaskan, pengiriman cepat.',
                'Barang diterima dengan baik, akan beli lagi.',
                'Desain produk menarik dan fungsional.',
                'Produk berkualitas tinggi, sangat direkomendasikan.',
                'Harga sebanding dengan kualitasnya.',
                'Pengalaman berbelanja yang menyenangkan.',
                'Barang diterima dalam kondisi baik, sesuai deskripsi.',
                'Pelayanan penjual ramah dan responsif.',
                'Produk ini cukup memuaskan, namun masih bisa ditingkatkan.',
                'Barang diterima cepat dan dalam kondisi bagus.',
                'Tidak ada masalah dengan produk ini, kualitas oke.',
                'Sangat senang dengan pembelian ini.',
                'Produk berkualitas dengan harga terjangkau.',
                'Pengemasan rapi dan aman.',
                'Barang sesuai deskripsi, sangat puas.',
                'Rekomendasi dari teman, ternyata benar-benar bagus.',
                'Pengiriman cepat dan produk sesuai harapan.',
                'Saya akan merekomendasikan produk ini ke teman-teman.',
                'Ulasan positif dari saya, tidak mengecewakan.',
            ];
        
            Review::create([
                'user_id' => $users[array_rand($users)],
                'product_id' => $products[array_rand($products)],
                'transaksi_id' => $transaksis[array_rand($transaksis)],
                'ulasan' => $ulasanVariasi[array_rand($ulasanVariasi)],
                'rating' => rand(1, 5), // Rating acak antara 1 dan 5
            ]);
        }
        
    }
}
