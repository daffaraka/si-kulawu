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
use Barryvdh\DomPDF\Facade\Pdf;
class TransaksiController extends Controller
{

    public function index()
    {

        $transaksi = Transaksi::with(['user', 'transaksiProduct.product'])->paginate(10);

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
            'metode_pembayaran' => $request->metode_pembayaran,
            'pengiriman' => $request->pengiriman,
            'nama_penerima' => $request->nama_penerima,
            'alamat' => $request->alamat,
            'payment_status' => 2
        ]);
        
        return redirect()->back();
    }


    public function exportExcel() {
        return Excel::download(new TransaksiExport, 'transaksi.xlsx');
    }

    public function print()
    {
        $transaksi = Transaksi::with(['user', 'transaksiProduct.product'])->get();
        $pdf = Pdf::loadview('admin.transaksi.transaksi-pdf', compact('transaksi'))
            ->setPaper('a4', 'landscape');
        $tgl = date('d-m-Y_H-i`-s');
        return $pdf->stream('transaksi' . $tgl . '.pdf');
    }

    public function edit(Transaksi $transaksi)
    {
        $transaksi->load('transaksiProduct','user');
        return view('admin.transaksi.transaksi-edit',compact('transaksi'));
}


    public function update(Request $request, Transaksi $transaksi)
    {
        $transaksi = Transaksi::find(request('transaksi_id'));
     
        $resi = $request->input('resi');

        if ($request->payment_status == 'Diproses' && $transaksi->payment_status == 1) {
            return redirect()->back()->with('error', 'Gagal, Harus lewat Verifikasi Pembayaran dulu.');
        }

        if ($request->payment_status == 'Dikirim' && empty($resi)) {
            return redirect()->back()->with('error', 'Gagal, Harus isi nomor resi dulu.');
        }

        if ($request->payment_status == 'Selesai' && $transaksi->status == 'Dikirim') {
            $transaksi->payment_status = 3;
        }

        $transaksi->payment_status = $request->payment_status;
        $transaksi->save();

        if ($request->payment_status == 'Dikirim') {
            $transaksi->update(['resi' => $resi]);
        }

        return redirect()->back()->with('success', 'Berhasil');
    }


    
}
