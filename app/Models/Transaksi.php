<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;


    protected $filable =
    [
        'number',
        'user_id',
        'total_price',
        'payment_status',
        // 'snap_token'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsToMany(Product::class,'transaksi_products','transaksi_id','product_id');
    }

    public function transaksiProduct()
    {
        return $this->hasMany(TransaksiProduct::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Otomatis buat Produk-1 , Produk-2, Produk-3 dst
        static::creating(function ($order) {
            $lastOrder = static::latest()->first();

            if ($lastOrder) {
                $lastCode = explode('-', $lastOrder->order_id);
                $number = intval($lastCode[1]);
                $order->order_id = 'ORDER-' . ($number + 1) . ' - ' . date('Y-m-d - H:i:s');
            } else {
                $order->order_id = 'ORDER-1' . ' - ' . date('Y-m-d - H:i:s');
            }
        });
    }
}
