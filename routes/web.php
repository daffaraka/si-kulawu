<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\PaymentCallBackController;
use App\Http\Controllers\Frontend\HomeResponseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!z
|
*/

route::get('/', [HomeController::class, 'index']);




// Route::get('/redirect', [HomeController::class, 'redirect']);
Route::view('/product', 'home.product')->name('home.product');
Route::view('/tentang-kami', 'home.tentang-kami')->name('home.tentang-kami');
Route::view('/layanan/furniture-kayu-jati', 'home.furniture-kayu-jati')->name('home.furniture-kayu-jati');
Route::view('/layanan/lemari-kayu-jati', 'home.lemari-kayu-jati')->name('home.lemari-kayu-jati');
Route::view('/layanan/meja-kayu-jati', 'home.meja-kayu-jati')->name('home.meja-kayu-jati');
Route::view('/layanan/custom-design', 'home.custom-design')->name('home.custom-design');
Route::view('/layanan/mini-furniture', 'home.mini-furniture')->name('home.mini-furniture');
Route::view('/kontak-kami', 'home.kontak-kami')->name('home.kontak-kami');
Route::get('detail-product/{id}', [HomeController::class, 'detailProduct'])->name('home.detail-product');
// Route::get('berikan-ulasan/{id}', [HomeController::class, 'berikanUlasan'])->name('home.berikanUlasan');
// Route::post('kirim-ulasan', [HomeController::class, 'tambahkanUlasan'])->name('home.tambahkanUlasan');


// 
Route::post('get-data-transaksi-selesai/{id}', [HomeResponseController::class, 'getDataTransaksiSelesai'])->name('home.getDataTransaksi');

// Route::middleware(['auth'])->group(function () {

//     // Route::get('/bayar/{id}', 'home.pembayaran')->name('home.pembayaran');
// });
Route::middleware(['auth'])->group(function () {

    // Dashboard Admin
    Route::middleware('is_admin')->prefix('dashboard')->group(function () {
        Route::get('/', [DashboardAdminController::class, 'index'])->name('dashboard');
        // Produk
        Route::get('product', [ProductController::class, 'index'])->name('product.index');
        Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


        // Transaksi
        Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('tansaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
        Route::get('transaksi/edit/{transaksi}', [TransaksiController::class, 'edit'])->name('transaksi.edit');
        Route::post('transaksi/update/{transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update');
        Route::get('destroy/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
        Route::get('transaksi/export', [TransaksiController::class, 'exportExcel'])->name('transaksi.export');
        Route::get('transaksi/print', [TransaksiController::class, 'print'])->name('transaksi.print');
        
        // Route::get('review', [ReviewController::class, 'index'])->name('review.index');
        // Route::get('review/show/{id}', [ReviewController::class, 'show'])->name('review.edit');

    });

    Route::post('/formulir-pembayaran', [HomeController::class, 'buatOrder'])->name('home.bayar');
    Route::get('/lengkapi-pembayaran/{transaksi}', [HomeController::class, 'lengkapiPembayaran'])->name('home.lengkapiPembayaran');

    Route::post('/add-to-cart/{id}', [HomeController::class, 'addTocart'])->name('home.addToCart');
    Route::get('/keranjang', [CartController::class, 'index'])->name('home.keranjang');
    Route::get('/daftar-transaksi', [HomeController::class, 'daftarTransaksi'])->name('home.daftarTransaksi');
    Route::post('/bayar/{transaksi}', [HomeController::class, 'storeTransaksi'])->name('home.storeTransaksi');
});

// Route::post('payments/midtrans-notification', [PaymentCallBackController::class, 'receive']);

route::get('/view_catagory', [AdminController::class, 'view_catagory']);


require __DIR__ . '/auth.php';
