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
    
                $min_price_range = Product::with('brand')->where('brand_id',session()->get('brand_id'))->min('price_cost');
                $max_price_range = Product::with('brand')->where('brand_id',session()->get('brand_id'))->max('price_cost');
                }
                else{
                    $min_price = Product::with('brand')->where('brand_id',session()->get('brand_id'))->min('price_cost');
                    $max_price = Product::with('brand')->where('brand_id',session()->get('brand_id'))->max('price_cost');
        
                    $min_price_range = $min_price;
                    $max_price_range = $max_price;
                }
            }
            elseif(session()->has('category_id')){
                if(session()->has('price')){
                    $price = session()->get('price');
                    $min_price = $price['min_price'];
                    $max_price = $price['max_price'];
    
                $min_price_range = Product::with('category')->where('category_id',session()->get('category_id'))->min('price_cost');
                $max_price_range = Product::with('category')->where('category_id',session()->get('category_id'))->max('price_cost');
                }
                else{
                    $min_price = Product::with('category')->where('category_id',session()->get('category_id'))->min('price_cost');
                    $max_price = Product::with('category')->where('category_id',session()->get('category_id'))->max('price_cost');
        
                    $min_price_range = $min_price;
                    $max_price_range = $max_price;
                }
            }
            else{
                $min_price = Product::min('price_cost');
                $max_price = Product::max('price_cost');
    
                $min_price_range = $min_price;
                $max_price_range = $max_price;
            }

            $share_image = '';

            $view->with('min_price', $min_price )->with('max_price', $max_price )->with('min_price_range', $min_price_range )->with('max_price_range', $max_price_range );

        });
    }
}
