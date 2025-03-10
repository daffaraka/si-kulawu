<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    
    public function index()
    {
        $data['reviews'] = Review::with(['product','user'])->latest()->get();
        
        return view('admin.review.review-index',$data);
    }
}
