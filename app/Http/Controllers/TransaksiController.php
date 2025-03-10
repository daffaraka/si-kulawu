<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Exports\TransaksiExport;
use App\Models\TransaksiProduct;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{

    protected $serverKey;
    protected $isProduction;
    protected $isSanitized;
    protected $is3ds;


    public function __construct()
    {
        $this->serverKey = config('midtrans.server_key');
        $this->isProduction = config('midtrans.is_production');
        $this->isSanitized = config('midtrans.is_sanitized');
        $this->is3ds = config('midtrans.is_3ds');

        $this->_configureMidtrans();
    }

    public function _configureMidtrans()
    {
        Config::$serverKey = $this->serverKey;
        Config::$isProduction = $this->isProduction;
        Config::$isSanitized = $this->isSanitized;
        Config::$is3ds = $this->is3ds;
    }
    public function index()
    {

        $transaksi = Transaksi::with(['user', 'transaksiProduct.product'])->get();

        return view('admin.transaksi.transaksi-index', compact('transaksi'));
    }


    public function buatOrder()
    {

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

        $snapToken = '';

        $order = new Transaksi();
        $order->user_id = $carts[0]['user_id'];
        $order->total_price = $final_total;
        $order->payment_status = 1;
        $order->number = 1;
        $order->save();

        $payload = [
            'transaction_details' => [
                'order_id' => $order->order_id,
                'gross_amount' => $final_total,
            ],
            'item_details' => $itemDetails,
            'customer_details' => [
                'first_name' => $order->user->name,
                'email' => $order->user->email,
            ]
        ];


        foreach ($carts as $cart) {
            $transaksiProduct = new TransaksiProduct();
            $transaksiProduct->transaksi_id = $order->id;
            $transaksiProduct->product_id = $cart['product']['id'];
            $transaksiProduct->total_price = $cart['product']['harga_produk'] * $cart['qty'];
            $transaksiProduct->qty = $cart['qty'];
            $transaksiProduct->save();
        }


        // if (empty($order->snap_token)) {
        //     $order->snap_token = Snap::getSnapToken($payload);
        //     $order->save();
        // }

        // $snapToken = $order->snap_token;


        $transaksi = $order;

        // dd($transaksi);

        return to_route('home.lengkapiPembayaran', ['transaksi' => $transaksi]);
    }


    public function lengkapiPembayaran($transaksi)
    {

        $transaksi = Transaksi::with(['transaksiProduct.product'])->find($transaksi);
        $snapToken = $transaksi->snap_token;
        $order = $transaksi;


        return view('home.bayar', compact('order', 'snapToken'));
    }

    public function show(Transaksi $transaksi)
    {
        //
    }

    public function edit(Transaksi $transaksi)
    {
        //
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        
    }

    public function destroy(Transaksi $transaksi) {
        
    }


    public function exportExcel() {
        return Excel::download(new TransaksiExport, 'transaksi.xlsx');
    }

    public function print() {
        // return Excel::download(new TransaksiExport, 'transaksi.xlsx');
    }
}
