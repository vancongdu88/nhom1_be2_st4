<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//front end
Route::get('/','HomeController@index');
//back end
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@logout');
/* Product */
Route::get('/add-product','ProductController@add_product');
Route::get('/all-product','ProductController@all_product');
Route::post('/save-product','ProductController@save_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
/* Galery */
Route::get('add-gallery/{product_id}','GalleryController@add_gallery');
Route::post('select-gallery','GalleryController@select_gallery');
Route::post('insert-gallery/{pro_id}','GalleryController@insert_gallery');
Route::post('update-gallery-name','GalleryController@update_gallery_name');
Route::post('delete-gallery','GalleryController@delete_gallery');
Route::post('update-gallery','GalleryController@update_gallery');
/* Brand */
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');
Route::get('/thuong-hieu/{brand_slug}','BrandProduct@show_brand_home');

Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');

Route::post('/save-brand-product','BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');
/* Category product */
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');

Route::post('/export-csv','CategoryProduct@export_csv');
Route::post('/import-csv','CategoryProduct@import_csv');

Route::post('/arrange-category','CategoryProduct@arrange_category');

Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');

Route::post('/product-tabs','CategoryProduct@product_tabs');
/* Order */
Route::get('/view-history-order/{order_code}','OrderController@view_history_order');
Route::get('/history','OrderController@history');
Route::get('/delete-order/{order_code}','OrderController@order_code');
Route::get('/print-order/{checkout_code}','OrderController@print_order');
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::post('/update-order-qty','OrderController@update_order_qty');
Route::post('/update-qty','OrderController@update_qty');
/* Checkout */
Route::get('/dang-nhap','CheckoutController@login_checkout');
Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
/* Authentication role */
Route::get('/register-auth','AuthController@register_auth');
Route::post('/register','AuthController@register');
/* Cart */
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/gio-hang','CartController@gio_hang');
Route::post('/update-cart','CartController@update_cart');
Route::get('/del-product/{session_id}','CartController@delete_product');
/* Coupon */
Route::post('/check-coupon','CartController@check_coupon');
Route::get('/unset-coupon','CouponController@unset_coupon');
// detail product
Route::get('/chi-tiet/{product_slug}','ProductController@details_product');
Route::get('/list-coupon','CouponController@list_coupon');
Route::get('/insert-coupon','CouponController@insert_coupon');
Route::post('/insert-coupon-code','CouponController@insert_coupon_code');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');
/* Checkout */
Route::get('/checkaddress','CheckoutController@checkaddress');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::post('/confirm-order','CheckoutController@confirm_order');
//  Danh muc san pham
Route::get('/danh-muc/{slug_category_product}','CategoryProduct@show_category_home'); /// mi mo mic len di t roi t giai thich cho/ thoi met qua . de im t xem cai da