<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (env(key: 'APP_ENV') !== 'local') {
            URL::forceScheme(scheme: 'https');
        }

        view()->composer('*', function ($view)  {

            
            $keranjangCount = Auth::check() ? Cart::where('user_id', Auth::user()->id)->count() : 0;

            $view->with('keranjangCount', $keranjangCount);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Pagination\Paginator::useBootstrap();
    }
}
