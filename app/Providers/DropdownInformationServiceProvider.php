<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class DropdownInformationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {



        View::composer('*', function ($view) {
            if (Auth::user()) {
                $view->with([
                    'cart_count' => Cart::where('user_id', Auth::user()->id)->whereStatus('Dalam Keranjang')->count() ?? 0,
                    'transaksi_count' => Transaksi::where('user_id', Auth::user()->id)->wherePaymentStatus('1')->count() ?? 0
                ]);
            }
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
