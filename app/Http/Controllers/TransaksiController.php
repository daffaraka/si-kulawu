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

        $transaksi = Transaksi::with(['user', 'transaksiProduct.product'])->latest()->paginate(10);

        return view('admin.transaksi.transaksi-index', compact('transaksi'));
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
