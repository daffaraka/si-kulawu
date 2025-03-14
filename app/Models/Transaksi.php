<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;


    protected $fillable =
    [
        'number',
        'user_id',
        'total_price',
        'payment_status',
        'nama_penerima',
        'metode_pembayaran',
        'pengiriman',
        'alamat'
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
        static::creating(function ($order) {
            $lastOrder = Transaksi::latest('id')->value('order_id');
        
            if ($lastOrder && preg_match('/ORDER-(\d+)/', $lastOrder, $matches)) {
                $number = intval($matches[1]) + 1;
            } else {
                $number = 1;
            }
        
            $order->order_id = 'ORDER-' . $number;
        });
        
    }
}
