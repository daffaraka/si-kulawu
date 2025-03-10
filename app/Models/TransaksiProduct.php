<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiProduct extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'product_id',
        'transaksi_id',
        'qty',
        'total_price'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }
}
