<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;

use App\Models\Product;
use App\Models\Review;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $data['product'] = Product::all();
        return view('home.userpage', $data);
    }

    public function detailProduct($id)
    {
        $product = Product::with('reviews.user')->find($id);
        $produkRating = number_format($product->reviews()->avg('rating'), 1);
        $produkJumlahRating = $product->reviews->groupBy('rating')
        ->map(function ($reviews) {
            return $reviews->pluck('rating');
        })->map(function ($count) {
            return $count->count();
        })->sortKeysDesc();

        // $review =  Review::orderBy('rating')->get()->groupBy('rating')
        // ->map(function ($reviews) {
        //     return $reviews->pluck('rating');
        // });
      
        // dd($produkRating);
        return view('home.detail-product', compact('product','produkRating','produkJumlahRating'));
    }


    public function addToCart($id)
    {
        $product = Product::find($id);
        $user_id = Auth::user()->id;

        $qty = 1;

        $cart = new Cart();


        if ($cart->where('user_id', $user_id)->where('product_id', $product->id)->exists()) {

            $cart->where('user_id', $user_id)->where('product_id', $product->id)->increment('qty', $qty);
            // $cart->qty->save();
        } else {

            $cart->product_id = $product->id;
            $cart->user_id = $user_id;
            $cart->qty = $qty;
            $cart->status = 'Dalam Keranjang';
            $cart->save();
        }

        return redirect()->route('home.keranjang');
        // $transaksi = Transaksi::where('user_id',$user_id)->get();
    }


    public function checkout()
    {

        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $user_id = Auth::user()->id;
        $transaksi = new Transaksi();
    }
    public function daftarTransaksi()
    {
        $user_id = Auth::user()->id;

        $transaksi = Transaksi::with(['user', 'transaksiProduct.product'])->whereIn('payment_status', [1])->where('user_id', $user_id)->latest()->get();
        $transaksiSelesai = Transaksi::with(['user', 'transaksiProduct.product'])
            ->whereIn('payment_status', [2])
            ->where('user_id', $user_id)
            // ->whereDoesntHave('reviews')
            ->latest()->get();


        // dd($transaksi);
        return view('home.daftar-transaksi', compact(['transaksi', 'transaksiSelesai']));
    }


    public function buatUlasan($id)
    {
        $transaksi = Transaksi::find($id);


        return view('home.ulasan', compact('transaksi'));
    }


    public function tambahkanUlasan(Request $request)
    {

        // dd($request->rating);

        $requestRating = array_values($request->rating);

        // dd($request->all());


        // dd(count($requestRating));
        for ($i = 0; $i < count($requestRating); $i++) {

            $review = new Review();
            $review->ulasan = $request->ulasan[$i];
            $review->rating = $requestRating[$i];
            $review->product_id = $request->product_id[$i];
            $review->transaksi_id = $request->transaksi_id;
            $review->user_id = Auth::user()->id;
            $review->save();
        }


        return to_route('home.daftarTransaksi');
    }
}
