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
        $statuses = [1, 2, 3, 4]; // Status bisa disesuaikan dengan status yang sesuai

        for ($i = 0; $i < 20; $i++) {
            // Membuat transaksi baru
            $transaksi = Transaksi::create([
                'user_id' => $userIds[array_rand($userIds)],
                'total_price' => rand(100000, 1000000),
                'payment_status' => $statuses[array_rand($statuses)],
                'number' => $i + 1,
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
