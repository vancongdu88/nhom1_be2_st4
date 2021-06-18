<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class CouponController extends Controller
{
    public function AuthLogin(){
        
        if(Session::get('login_normal')){

            $admin_id = Session::get('admin_id');
        }else{
            $admin_id = Auth::id();
        }
            if($admin_id){
                return Redirect::to('dashboard');
            }else{
                return Redirect::to('admin')->send();
            } 
        
       
    }
    public function list_coupon(){
        $this->AuthLogin();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d');
    	$coupon = Coupon::orderby('coupon_id','DESC')->paginate(5);
    	return view('admin.coupon.list_coupon')->with(compact('coupon','today'));
    }
    public function delete_coupon($coupon_id){
    	$coupon = Coupon::find($coupon_id);
    	$coupon->delete();
    	Session::put('message','Xóa mã giảm giá thành công');
        return Redirect::to('list-coupon');
    }
    public function unset_coupon(){
		$coupon = Session::get('coupon');
        if($coupon==true){
          
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa mã khuyến mãi thành công');
        }
	}
    public function insert_coupon(){
        $this->AuthLogin();
    	return view('admin.coupon.insert_coupon');
    }
    public function insert_coupon_code(Request $request){
    	$data = $request->all();
        $coupon_condition = Coupon::where('coupon_code',$data['coupon_code'])->get();
        if(count($coupon_condition) > 0){
            Session::put('error','Mã giảm giá này đã có, hãy điền một cái tên mới');
            return Redirect::to('insert-coupon');
        }
        $coupon_number = filter_var($data['coupon_number'], FILTER_SANITIZE_NUMBER_INT);
    	$coupon = new Coupon;

    	$coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_date_start = $data['coupon_date_start'];
        $coupon->coupon_date_end = $data['coupon_date_end'];
    	$coupon->coupon_number = $coupon_number;
    	$coupon->coupon_code = $data['coupon_code'];
    	$coupon->coupon_time = $data['coupon_time'];
    	$coupon->coupon_condition = $data['coupon_condition'];
    	$coupon->save();

    	Session::put('message','Thêm mã giảm giá thành công');
        return Redirect::to('list-coupon');


    }
}
