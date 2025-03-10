<?php

namespace App\Http\Controllers;

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
