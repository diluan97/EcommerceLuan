<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Slide;
use Cart;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('share.header', function ($view) {
            $categories = Category::whereStatus(1)->get();
            $cartInfo = Cart::instance('default')->count();
            $view->with([
                'categories' => $categories,
                'cartAmount' => $cartInfo

            ]);
        });
        View::composer('share.mobile', function ($view) {
            $categories = Category::whereStatus(1)->get();
            $view->with([
                'categories' => $categories,
            ]);
        });
        View::composer('share.slide', function ($view) {
            $slide = Slide::all();
            $view->with([
                'slide' => $slide,
            ]);
        });
        View::composer('layouts.guest.master', function ($view) {
            $hinhanh = Slide::find(1);
            $view->with([
                'hinhanh' => $hinhanh,
            ]);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
