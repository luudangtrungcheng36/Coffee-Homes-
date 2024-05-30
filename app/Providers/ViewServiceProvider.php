<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $categories = Category::all();
            $carts = Auth::check() ? Cart::where('account_id', Auth::user()->id)->orderBy('created_at')->get() : false;
            // $view->with('categories', $categories);
            $view->with(compact('categories', 'carts'));
        });
    }
}
