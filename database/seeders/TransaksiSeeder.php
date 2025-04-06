<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use App\Models\TransaksiProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        $productIds = Product::pluck('id')->toArray();
        $statuses = [1, 2, 3, 4, 5, 6]; // Status bisa disesuaikan dengan status yang sesuai
        $metodePembayarans = ['Bank Transfer', 'Ovo', 'Gopay', 'Dana'];
        $pengirimans = ['JNE', 'TIKI', 'Pos Indonesia', 'SiCepat', 'J&T'];

        for ($i = 0; $i < 30; $i++) {
            // Membuat transaksi baru
            $transaksi = Transaksi::create([
                'number' => $i + 1,
                'user_id' => $userIds[array_rand($userIds)],
                'total_price' => rand(100000, 1000000),
                'payment_status' => $statuses[array_rand($statuses)],
                'nama_penerima' => 'Penerima ' . ($i + 1),
                // 'metode_pembayaran' => $metodePembayarans[array_rand($metodePembayarans)],
                // 'pengiriman' => $pengirimans[array_rand($pengirimans)],
                'alamat' => 'Alamat ' . ($i + 1),
            ]);

            // Menambahkan produk ke transaksi
            $productCount = rand(1, 5); // Jumlah produk dalam satu transaksi
            for ($j = 0; $j < $productCount; $j++) {
                TransaksiProduct::create([
                    'transaksi_id' => $transaksi->id,
                    'product_id' => $productIds[array_rand($productIds)],
                    'total_price' => rand(100000, 500000),
                    'qty' => rand(1, 5),
                ]);
            }
        }
    }
}
