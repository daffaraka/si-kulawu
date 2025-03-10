<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'nama_produk',
        'deskripsi',
        'harga_produk',
        'stok',
        'gambar_produk'
    ];

    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class);
    }

    public function transaksiProduct()
    {
        return $this->hasMany(TransaksiProduct::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
