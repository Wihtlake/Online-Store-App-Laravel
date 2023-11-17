<?php

namespace App\Providers;
use App\Models\Cart;
use App\Models\Feedback;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		$feedback = Feedback::all();// Здесь ваш код для получения значения feedback
		$carts = Cart::with('products')->get();
		View::composer('layouts.layout', function ($view) use ($feedback, $carts) {
			$view->with(compact('feedback', 'carts'));
		});
    }
}
