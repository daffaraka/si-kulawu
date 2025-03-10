<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;

        $keranjang = Cart::with(['user', 'product'])->whereStatus('Dalam Keranjang')->where('user_id', $user_id)->latest()->get();
    
        $produkLain = Product::whereNotIn('id', $keranjang->pluck('product_id'))->get();

        return view('home.keranjang', compact(['keranjang','produkLain']));
    }
}
