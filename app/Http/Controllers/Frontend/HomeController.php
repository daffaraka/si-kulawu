<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\User;

use App\Models\Review;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\TransaksiProduct;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $data['products'] = Product::take(8)->get();
        return view('home.userpage', $data);
    }

    public function detailProduct($id)
    {
        $product = Product::find($id);
        // $produkRating = number_format($product->reviews()->avg('rating'), 1);
        // $produkJumlahRating = $product->reviews->groupBy('rating')
        // ->map(function ($reviews) {
        //     return $reviews->pluck('rating');
        // })->map(function ($count) {
        //     return $count->count();
        // })->sortKeysDesc();

        // $review =  Review::orderBy('rating')->get()->groupBy('rating')
        // ->map(function ($reviews) {
        //     return $reviews->pluck('rating');
        // });

        // dd($produkRating);
        return view('home.detail-product', compact('product'));
    }


    // public function addToCart($id)
    // {
    //     $product = Product::find($id);
    //     $user_id = Auth::user()->id;

    //     $qty = 1;

    //     $cart = new Cart();


    //     if ($cart->where('user_id', $user_id)->where('product_id', $product->id)->exists()) {

    //         $cart->where('user_id', $user_id)->where('product_id', $product->id)->increment('qty', $qty);
    //         // $cart->qty->save();
    //     } else {

    //         $cart->product_id = $product->id;
    //         $cart->user_id = $user_id;
    //         $cart->qty = $qty;
    //         $cart->status = 'Dalam Keranjang';
    //         $cart->save();
    //     }

    //     return redirect()->route('home.keranjang');
    //     // $transaksi = Transaksi::where('user_id',$user_id)->get();
    // }


    public function checkout()
    {

        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $user_id = Auth::user()->id;
        $transaksi = new Transaksi();
    }
    public function daftarTransaksi()
    {
        $user_id = Auth::user()->id;

        $transaksi = Transaksi::with(['user', 'transaksiProduct.product'])->where('user_id', $user_id)->latest()->get();
        $transaksiSelesai = Transaksi::with(['user', 'transaksiProduct.product'])
            ->whereIn('payment_status', [2])
            ->where('user_id', $user_id)
            // ->whereDoesntHave('reviews')
            ->latest()->get();


        // dd($transaksi);
        return view('home.daftar-transaksi', compact(['transaksi', 'transaksiSelesai']));
    }




    public function addToCart(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => true,
                'status' => 'error',

                'message' => 'Silahkan login terlebih dahulu'
            ]);
        } else {
            $product = Product::find($id);
            $user_id = Auth::user()->id;


            $qty = $request->qty;

            $cart = new Cart();


            if ($cart->where('user_id', $user_id)->where('product_id', $product->id)->exists()) {

                $cart->where('user_id', $user_id)->where('product_id', $product->id)->increment('qty', $qty);
                // $cart->qty->save();

                return response()->json([
                    'success' => true,
                    'status' => 'success',

                    'message' => 'Produk berhasil ditambahkan'
                ]);
            } else {

                $cart->product_id = $product->id;
                $cart->user_id = $user_id;
                $cart->qty = $qty;
                $cart->status = 'Dalam Keranjang';
                $cart->save();

                return response()->json([
                    'success' => true,
                    'status' => 'success',
                    'message' => 'Produk berhasil ditambahkan'
                ]);
            }
        }
    }


    public function buatOrder(Request $request)
    {


        // $cartsId = array_keys($request->qty);

        // dd($cartsId);


        foreach ($request->qty as $index => $value) {


            // dd([$value => $value]);
            $cart = Cart::find($index);
            $cart->qty = $value;
            $cart->save();
        }

        $carts = Cart::with('product')->where('user_id', Auth::user()->id)->whereStatus('Dalam Keranjang')->get()->toArray();
        Cart::where('user_id', Auth::user()->id)->update(['status' => 'Dalam Transaksi']);


        $final_total = 0;

        foreach ($carts as $price) {
            $total_price = $price['product']['harga_produk'] * $price['qty'];
            $final_total += $total_price;
        }


        $itemDetails = [];
        foreach ($carts as $itemDetail) {
            $itemDetails[] =
                [
                    'id' => $itemDetail['product']['id'],
                    'price' => $itemDetail['product']['harga_produk'],
                    'quantity' => $itemDetail['qty'],
                    'name' => $itemDetail['product']['nama_produk']
                ];
        }


        $order = new Transaksi();
        $order->user_id = $carts[0]['user_id'];
        $order->total_price = $final_total;
        $order->payment_status = 1;
        $order->number = 1;
        $order->save();

        foreach ($carts as $cart) {
            $transaksiProduct = new TransaksiProduct();
            $transaksiProduct->transaksi_id = $order->id;
            $transaksiProduct->product_id = $cart['product']['id'];
            $transaksiProduct->total_price = $cart['product']['harga_produk'] * $cart['qty'];
            $transaksiProduct->qty = $cart['qty'];
            $transaksiProduct->save();
        }



        Cart::where('user_id', Auth::user()->id)->whereStatus('Dalam Transaksi')->delete();


        $transaksi = $order;


        return to_route('home.lengkapiPembayaran', ['transaksi' => $transaksi]);
    }


    public function lengkapiPembayaran($transaksi)
    {

        $transaksi = Transaksi::with(['transaksiProduct.product'])->find($transaksi);
        $snapToken = $transaksi->snap_token;
        $order = $transaksi;


        return view('home.bayar', compact('order', 'snapToken'));
    }

    public function storeTransaksi(Request $request, Transaksi $transaksi)
    {
        // dd($request->all());
        $transaksi->update([
            // 'metode_pembayaran' => $request->metode_pembayaran,
            // 'pengiriman' => $request->pengiriman,
            'nama_penerima' => $request->nama_penerima,
            'alamat' => $request->alamat,
       
        ]);

        return redirect()->back();
    }


    public function uploadBuktiPembayaran(Request $request, Transaksi $transaksi)
    {


        $file = $request->file('bukti_pembayaran');
        $fileName = $file->getClientOriginalName();
        $fileSaved = $transaksi->id . '-' .now()->format('Y-m-d H-i-s').$fileName;
        $path = $request->file('bukti_pembayaran')->storeAs('bukti_pembayaran', $fileSaved, 'public');

        $transaksi->update([

            'bukti_pembayaran' => $path,
            'payment_status' => 2
        ]);


        return response(
            [
                'success' => true,
                'message' => 'Bukti pembayaran berhasil diupload',
                'data' => $transaksi
            ]
        );
    }

    // public function buatUlasan($id)
    // {
    //     $transaksi = Transaksi::find($id);


    //     return view('home.ulasan', compact('transaksi'));
    // }


    // public function tambahkanUlasan(Request $request)
    // {

    //     // dd($request->rating);

    //     $requestRating = array_values($request->rating);

    //     // dd($request->all());


    //     // dd(count($requestRating));
    //     for ($i = 0; $i < count($requestRating); $i++) {

    //         $review = new Review();
    //         $review->ulasan = $request->ulasan[$i];
    //         $review->rating = $requestRating[$i];
    //         $review->product_id = $request->product_id[$i];
    //         $review->transaksi_id = $request->transaksi_id;
    //         $review->user_id = Auth::user()->id;
    //         $review->save();
    //     }


    //     return to_route('home.daftarTransaksi');
    // }
}
