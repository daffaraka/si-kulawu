<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

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


    public function hapusItemKeranjang(Cart $cart)
    {


        // dd($cart);
        if ($cart->delete()) {
            return response()->json([
                'status' => 'success',

                'message' => 'Item keranjang berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Item keranjang gagal dihapus'
            ]);
        }
    }
}
