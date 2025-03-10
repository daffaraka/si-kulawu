<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardAdminController extends Controller
{

    public function index()
    {
        // Mengambil data dengan aggregate dalam satu query
        $data['jumlah_produk'] = Product::count();
        $data['jumlah_user'] = User::count();
        $data['jumlah_transaksi'] = Transaksi::count();
        $data['jumlah_transaksi_selesai'] = Transaksi::where('payment_status', '2')->count();

        // Mengambil transaksi terbaru
        $data['transaksis'] = Transaksi::latest()->get();

        // Penjualan per hari
        $data['penjualanBar'] = Transaksi::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as jumlah'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get()
            ->pluck('jumlah', 'date');  // Membuat key => value (tanggal => jumlah)

        $data['penjualanLabels'] = $data['penjualanBar']->keys();  // Ambil tanggal
        $data['penjualanData'] = $data['penjualanBar']->values(); // Ambil jumlah transaksi

        return view('admin.dashboard-admin', $data);
    }
}
