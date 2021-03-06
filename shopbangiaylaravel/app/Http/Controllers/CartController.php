<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Carbon\Carbon;
use App\Coupon;
use App\Product;
session_start();

class CartController extends Controller
{
    public function gio_hang(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        $dem_hang = 0;
        $meta_desc = "Giỏ hàng của bạn"; 
        $bread_crumb = 'Cart';
        $meta_keywords = "Giỏ hàng Ajax";
        $meta_title = "Giỏ hàng của bạn";
        $url_canonical = $request->url();
        if(Session::get('cart')){
            $dem_hang = count(Session::get('cart'));
        }
   return view('pages.cart.cart_ajax',compact('dem_hang','meta_title','url_canonical','bread_crumb'))->with('category',$cate_product)->with('brand',$brand_product);
}
    public function add_cart_ajax(Request $request){
        // Session::forget('cart');
    $data = $request->all();
    $session_id = substr(md5(microtime()),rand(0,26),5);
    $cart = Session::get('cart');
    if($cart==true){
        $is_avaiable = 0;
        $key_cart = 0;
        foreach($cart as $key => $val){
            if($val['product_id']==$data['cart_product_id'] && $val['product_color']==$data['cart_product_color'] && $val['product_size']==$data['cart_product_size']){
                $is_avaiable++;
                $cart[$key]['product_qty'] = $val['product_qty'] + $data['cart_product_qty'];
                Session::put('cart',$cart);
            }
        }
        if($is_avaiable == 0){
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],
                'product_color' => $data['cart_product_color'],
                'product_size' => $data['cart_product_size'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart',$cart);
        }
    }else{
        $cart[] = array(
            'session_id' => $session_id,
            'product_name' => $data['cart_product_name'],
            'product_id' => $data['cart_product_id'],
            'product_image' => $data['cart_product_image'],
            'product_quantity' => $data['cart_product_quantity'],
            'product_qty' => $data['cart_product_qty'],
            'product_color' => $data['cart_product_color'],
            'product_size' => $data['cart_product_size'],
            'product_price' => $data['cart_product_price'],

        );
        Session::put('cart',$cart);
    }
    Session::save();

}
public function check_coupon(Request $request){
    $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d');
    $data = $request->all();
    if(Session::get('customer_id')){
       $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->where('coupon_used','LIKE','%'.Session::get('customer_id').'%')->first();
       if($coupon){
        return redirect()->back()->with('error','Mã giảm giá đã sử dụng,vui lòng nhập mã khác');
    }else{

       $coupon_login = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->first();
            if($coupon_login){
                $count_coupon = $coupon_login->count();
                if($count_coupon>0){
                    $coupon_session = Session::get('coupon');
                    if($coupon_session==true){
                        $is_avaiable = 0;
                        if($is_avaiable==0){
                            $cou[] = array(
                                'coupon_code' => $coupon_login->coupon_code,
                                'coupon_condition' => $coupon_login->coupon_condition,
                                'coupon_number' => $coupon_login->coupon_number,

                            );
                            Session::put('coupon',$cou);
                        }
                    }else{
                        $cou[] = array(
                            'coupon_code' => $coupon_login->coupon_code,
                            'coupon_condition' => $coupon_login->coupon_condition,
                            'coupon_number' => $coupon_login->coupon_number,

                        );
                        Session::put('coupon',$cou);
                    }
                    Session::save();
                    return redirect()->back()->with('message','Thêm mã giảm giá thành công');
                }


            }else{
                return redirect()->back()->with('error','Mã giảm giá không đúng - hoặc đã hết hạn');
            }
    }
    //neu chua dang nhap
}else{
    $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->first();
    if($coupon){
        $count_coupon = $coupon->count();
        if($count_coupon>0){
            $coupon_session = Session::get('coupon');
            if($coupon_session==true){
                $is_avaiable = 0;
                if($is_avaiable==0){
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,

                    );
                    Session::put('coupon',$cou);
                }
            }else{
                $cou[] = array(
                    'coupon_code' => $coupon->coupon_code,
                    'coupon_condition' => $coupon->coupon_condition,
                    'coupon_number' => $coupon->coupon_number,

                );
                Session::put('coupon',$cou);
            }
            Session::save();
            return redirect()->back()->with('message','Thêm mã giảm giá thành công');
        }


    }else{
        return redirect()->back()->with('error','Mã giảm giá không đúng - hoặc đã hết hạn');
    }

}

}
public function update_cart(Request $request){
    $data = $request->all();
    $cart = Session::get('cart');
    if($cart==true){
        $message = '';
        foreach($data['cart_color'] as $key => $color){
            $i = 0;
            foreach($cart as $session => $val){
                $i++;

                if($val['session_id']==$key){

                    $cart[$session]['product_color'] = $color;

                }
            }

        }
        foreach($data['cart_size'] as $key => $size){
            $i = 0;
            foreach($cart as $session => $val){
                $i++;

                if($val['session_id']==$key){

                    $cart[$session]['product_size'] = $size;

                }
            }

        }
        foreach($data['cart_qty'] as $key => $qty){
            $i = 0;
            foreach($cart as $session => $val){
                $i++;

                if($val['session_id']==$key && $qty<$cart[$session]['product_quantity']){

                    $cart[$session]['product_qty'] = $qty;


                }elseif($val['session_id']==$key && $qty>$cart[$session]['product_quantity']){
                    $message.='<p style="color:red">'.$i.') Cập nhật số lượng :'.$cart[$session]['product_name'].' thất bại</p>';
                }

            }

        }
        $message.='<p class="mb-0" style="color:blue">Cập nhật số lượng sản phẩm thành công</p>';
        Session::put('cart',$cart);
        return redirect()->back()->with('message',$message);
    }else{
        return redirect()->back()->with('message','Cập nhật số lượng thất bại');
    }
}
public function delete_product($session_id){
    $cart = Session::get('cart');
        // echo '<pre>';
        // print_r($cart);
        // echo '</pre>';
    if($cart==true){
        foreach($cart as $key => $val){
            if($val['session_id']==$session_id){
                unset($cart[$key]);
            }
        }
        Session::put('cart',$cart);
        return redirect()->back()->with('message','Xóa sản phẩm thành công');

    }else{
        return redirect()->back()->with('message','Xóa sản phẩm thất bại');
    }

}
public function add_wishlist(Request $request){
    // $product = Product::where('wishlist',$wishlist)->get();
    $data = $request->all();
    
    // $session_id = substr(md5(microtime()),rand(0,26),5);
    // // $cart = Session::get('tbl_product');
    
    // // $cart[] = array(
    // //     'session_id' => $session_id,
    // //     'wishlist' => $data['wishlist'],
    // // );   
    // Session::put('tbl_product',$cart);
    // Session::save();

    return response()->json(['success'=>'Ajax request submitted successfully']);
}
}
// nó không update lại ấy , t muốn hỏi  là làm sao để t update lại 