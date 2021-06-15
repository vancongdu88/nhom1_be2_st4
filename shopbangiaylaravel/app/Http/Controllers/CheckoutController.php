<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use App\City;
use App\Province;
use App\Wards;
use App\Feeship;
use App\Order;
use App\Coupon;
use App\OrderDetails;
use App\Shipping;
use App\Product;
use App\Customer;
use Mail;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{

  public function confirm_order(Request $request){
    $data = $request->all();
     //get coupon
     if($data['order_coupon']!='no'){
      $coupon = Coupon::where('coupon_code',$data['order_coupon'])->first();
      $coupon->coupon_used = $coupon->coupon_used.','.Session::get('customer_id');
      $coupon->coupon_time = $coupon->coupon_time - 1;
      $coupon_mail = $coupon->coupon_code;
      $coupon->save();
     }else{
       $coupon_mail = 'không có sử dụng';
     }
    //get van chuyen
    $shipping = new Shipping();
    $shipping->shipping_name = $data['shipping_name'];
    $shipping->shipping_email = $data['shipping_email'];
    $shipping->shipping_phone = $data['shipping_phone'];
    $shipping->shipping_address = $data['shipping_address'];
    $shipping->shipping_notes = $data['shipping_notes'];
    $shipping->shipping_method = $data['shipping_method'];
    $shipping->save();
    $shipping_id = $shipping->shipping_id;
 
    $checkout_code = substr(md5(microtime()),rand(0,26),5);
 
     //get order
    $order = new Order;
    $order->customer_id = Session::get('customer_id');
    $order->shipping_id = $shipping_id;
    $order->order_status = 1;
    $order->order_code = $checkout_code;
 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
          
    $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
    
    $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
    $order->created_at = $today;
    $order->order_date = $order_date;
    $order->save();
    
 
    if(Session::get('cart')==true){
     foreach(Session::get('cart') as $key => $cart){
       $order_details = new OrderDetails;
       $order_details->order_code = $checkout_code;
       $order_details->product_id = $cart['product_id'];
       $order_details->product_name = $cart['product_name'];
       $order_details->product_price = $cart['product_price'];
       $order_details->product_color = $cart['product_color'];
       $order_details->product_size = $cart['product_size'];
       $order_details->product_sales_quantity = $cart['product_qty'];
       $order_details->product_coupon =  $data['order_coupon'];
       $order_details->product_feeship = $data['order_fee'];
       $order_details->save();
     }
   }
 
 
 
   //send mail confirm
   $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
 
   $title_mail = "Đơn hàng xác nhận ngày".' '.$now;
 
   $customer = Customer::find(Session::get('customer_id'));
       
   $data['email'][] = $customer->customer_email;
   //lay gio hang
   if(Session::get('cart')==true){
 
     foreach(Session::get('cart') as $key => $cart_mail){
 
       $cart_array[] = array(
         'product_name' => $cart_mail['product_name'],
         'product_price' => $cart_mail['product_price'],
         'product_color' => $cart_mail['product_color'],
         'product_size' => $cart_mail['product_size'],
         'product_qty' => $cart_mail['product_qty']
       );
     }
 
   }
   //lay shipping
   if(Session::get('fee')==true){
     $fee = Session::get('fee').'k';
   }else{
     $fee = '25k';
   }
   
   $shipping_array = array(
     'fee' =>  $fee,
     'customer_name' => $customer->customer_name,
     'shipping_name' => $data['shipping_name'],
     'shipping_email' => $data['shipping_email'],
     'shipping_phone' => $data['shipping_phone'],
     'shipping_address' => $data['shipping_address'],
     'shipping_notes' => $data['shipping_notes'],
     'shipping_method' => $data['shipping_method']
 
   );
   //lay ma giam gia, lay coupon code
   $ordercode_mail = array(
     'coupon_code' => $coupon_mail,
     'order_code' => $checkout_code,
   );
 
   Mail::send('pages.mail.mail_order',  ['cart_array'=>$cart_array, 'shipping_array'=>$shipping_array ,'code'=>$ordercode_mail] , function($message) use ($title_mail,$data){
       $message->to($data['email'])->subject($title_mail);//send this mail with subject
       $message->from($data['email'],$title_mail);//send from this mail
   });
    Session::forget('coupon');
    Session::forget('fee');
    Session::forget('cart');
 }
    public function login_checkout(Request $request){

$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
//seo 
$meta_title = "Đăng nhập";
$bread_crumb = 'Setting';
$url_canonical = $request->url();
      //--seo 

return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_title',$meta_title)->with('bread_crumb',$bread_crumb)->with('url_canonical',$url_canonical);
}

public function login_customer(Request $request){

 $email = $request->email_account;
 $password = md5($request->password_account);
 $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
 if(Session::get('coupon')==true){
  Session::forget('coupon');
}

if($result){
  Session::put('customer_id',$result->customer_id);
  Session::put('customer_name',$result->customer_name);
  Session::put('back',0);
  return Redirect::to('/');
}else{
  Session::put('error','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
  return Redirect::to('/dang-nhap');
}
Session::save();


}
public function logout_checkout(){
    Session::forget('customer_id');
    Session::forget('customer_name');
    Session::forget('coupon');
    Session::put('notification_logout',0);
    return Redirect::to('/');
   }
   public function add_customer(Request $request){
    date_default_timezone_set('Asia/Ho_Chi_Minh');
         
    $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
    $customer_email = Customer::where('customer_email',$request->customer_email)->get();
    if(count($customer_email) > 0){
      Session::put('error2','Email của bạn đã có người sử dụng vui lòng nhập email mới');
      return Redirect::to('/dang-nhap');
    }
    else{
      $data = array();
      $data['customer_name'] = $request->customer_name;
      $data['customer_phone'] = $request->customer_phone;
      $data['customer_email'] = $request->customer_email;
      $data['customer_password'] = md5($request->customer_password);
      $data['created_at'] = $today;
     
      $customer_id = DB::table('tbl_customers')->insertGetId($data);
     
      Session::put('customer_id',$customer_id);
      Session::put('customer_name',$request->customer_name);
      Session::put('notification',0);
    }
    return Redirect::to('/');
   }
   public function select_delivery_home(Request $request){
    $data = $request->all();
    if($data['action']){
      $output = '';
      if($data['action']=="city"){
        $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
        $output.='<option value="">---Chọn quận huyện---</option>';
        foreach($select_province as $key => $province){
          $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
        }
  
      }else{
  
        $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
        $output.='<option value="">---Chọn xã phường---</option>';
        foreach($select_wards as $key => $ward){
          $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
        }
      }
      echo $output;
    }
  }
  public function changeaddress(Request $request){

    $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
    $city = City::orderby('matp','ASC')->get();
    Session::forget('fee');
    return view('pages.checkout.checkout_address')->with('category',$cate_product)->with('brand',$brand_product)->with('city',$city);
    }
   public function checkaddress(Request $request){
    if(!Session::get('cart')){
			return redirect('gio-hang');
		}else{
      $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
      $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
      $city = City::orderby('matp','ASC')->get();
      //seo
  $bread_crumb = "Checkout Processing";
  $meta_title = "Địa chỉ giao hàng";
  $url_canonical = $request->url();
    if(Session::get('fee')==true){
      return Redirect::to('/checkout');
    }
    
    return view('pages.checkout.checkout_address',compact('meta_title','url_canonical','bread_crumb'))->with('category',$cate_product)->with('brand',$brand_product)->with('city',$city);
  }
    }

   public function checkout(Request $request){
    if(!Session::get('fee')){
			return redirect('history');
		}else{
$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
$city = City::orderby('matp','ASC')->get();
//seo
  $bread_crumb = "Checkout Processing";
  $meta_title = "Thanh toán";
  $url_canonical = $request->url();

return view('pages.checkout.show_checkout',compact('meta_title','url_canonical','bread_crumb'))->with('category',$cate_product)->with('brand',$brand_product)->with('city',$city);
    }
}
public function calculate_fee(Request $request){
  $data = $request->all();
  if($data['city']){
    $feeship = Feeship::where('fee_matp',$data['city'])->where('fee_maqh',$data['province'])->where('fee_xaid',$data['wards'])->get();
    if($feeship){
      $count_feeship = $feeship->count();
      if($count_feeship>0){
       foreach($feeship as $key => $fee){
        Session::put('fee',$fee->fee_feeship);
        Session::save();
      }
    }else{ 
      Session::put('fee',25000);
      Session::save();
    }
  }
}
return Redirect::to('/checkout');
}
}
