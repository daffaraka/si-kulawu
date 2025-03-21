<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $faker = \Faker\Factory::create();
        DB::table('products')->insert([
            [
                'nama_produk' => 'Kemeja Pria',
                'deskripsi' => 'Kemeja pria dengan bahan katun, cocok untuk acara formal.',
                'harga_produk' => $faker->numberBetween(100, 20000)  *100,
                'stok' => 10,
                'gambar_produk' => 'kemeja_pria.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Celana Jeans',
                'deskripsi' => 'Celana jeans dengan kualitas bagus, cocok untuk semua usia.',
                'harga_produk' => $faker->numberBetween(100, 20000)  *100,
                'stok' => 15,
                'gambar_produk' => 'celana_jeans.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Baju Koko',
                'deskripsi' => 'Baju koko dengan desain modern, cocok untuk acara formal.',
                'harga_produk' => $faker->numberBetween(100, 20000)  *100,
                'stok' => 20,
                'gambar_produk' => 'baju_koko.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Baju Batik',
                'deskripsi' => 'Baju batik dengan kualitas bagus, cocok untuk acara semi formal.',
                'harga_produk' => $faker->numberBetween(100, 20000)  *100,
                'stok' => 15,
                'gambar_produk' => 'baju_batik.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Baju Olahraga',
                'deskripsi' => 'Baju olahraga dengan kualitas bagus, cocok untuk berolahraga.',
                'harga_produk' => $faker->numberBetween(100, 20000)  *100,
                'stok' => 50,
                'gambar_produk' => 'baju_olahraga.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
