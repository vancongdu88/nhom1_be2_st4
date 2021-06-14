<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product;

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
        view()->composer('*',function($view) {
            if(session()->has('brand_id')){
                if(session()->has('price')){
                    $price = session()->get('price');
                    $min_price = $price['min_price'];
                    $max_price = $price['max_price'];
    
                $min_price_range = Product::with('brand')->where('brand_id',session()->get('brand_id'))->min('product_price');
                $max_price_range = Product::with('brand')->where('brand_id',session()->get('brand_id'))->max('product_price');
                }
                else{
                    $min_price = Product::with('brand')->where('brand_id',session()->get('brand_id'))->min('product_price');
                    $max_price = Product::with('brand')->where('brand_id',session()->get('brand_id'))->max('product_price');
        
                    $min_price_range = $min_price;
                    $max_price_range = $max_price;
                }
            }
            else{
                $min_price = Product::min('product_price');
                $max_price = Product::max('product_price');
    
                $min_price_range = $min_price;
                $max_price_range = $max_price;
            }

            $share_image = '';

            $view->with('min_price', $min_price )->with('max_price', $max_price )->with('min_price_range', $min_price_range )->with('max_price_range', $max_price_range );

        });
    }
}
