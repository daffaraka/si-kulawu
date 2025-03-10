<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index()
    {

        $data['judul'] = 'Beranda Product';
        $data['product'] = Product::all();

        return view('admin.product.product-index', $data);
    }

    public function create()
    {
        return view('admin.product.product-create');
    }


    public function store(Request $request)
    {
        $file = $request->file('gambar_produk');
        $fileName = $file->getClientOriginalName();
        $time = now()->format('Y-m-d H-i-s');
        $fileSaved = $request->nama_produk . '-' . $time . $fileName;
        $file->move('produk', $fileSaved);

        $product = new Product();
        $product->nama_produk = $request->nama_produk;
        $product->deskripsi = $request->deskripsi;
        $product->harga_produk = $request->harga_produk;
        $product->stok = $request->stok;
        $product->gambar_produk = $fileSaved;
        $product->save();


        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        //
    }


    public function edit($id)
    {
        $data['product'] = Product::find($id);
        return view('admin.product.product-edit ', $data);
    }


    public function update(Request $request, $id)

    {
        $product = Product::find($id);


        $file = '';
        $time = now()->format('Y-m-d H-i-s');

        if ($request->has('gambar_produk')) {
            $file = $request->file('gambar_produk');
            $fileName = $file->getClientOriginalName();
            $fileSaved = $request->nama_produk . '-' . $time . $fileName;
            if (File::exists('produk/' . $product->gambar_produk)) {
                File::delete('produk/' . $product->gambar_produk);
                $file->move('produk', $fileSaved);
            } else {
                $file->move('produk', $fileSaved);
            }
        } else {
            $fileSaved = $product->gambar_produk;
        }

        // $file = $request->file('gambar_produk');
        // $fileName = $file->getClientOriginalName();
        // $time = now()->format('Y-m-d H-i-s');
        // $fileSaved = $request->nama_produk . '-' . $time . $fileName;



        $product->nama_produk = $request->nama_produk;
        $product->deskripsi = $request->deskripsi;
        $product->harga_produk = $request->harga_produk;
        $product->stok = $request->stok;
        $product->gambar_produk = $fileSaved;
        $product->save();

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.index');
    }
}
