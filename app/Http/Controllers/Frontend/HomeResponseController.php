<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeResponseController extends Controller
{
    

    public function getDataTransaksiSelesai($id)
    {
        $transaksiSelesai = Transaksi::with(['transaksiProduct.product'])->find($id);


        return response()->json($transaksiSelesai);
    }


}
