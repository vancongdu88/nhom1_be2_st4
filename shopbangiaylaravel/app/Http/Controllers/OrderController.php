<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use App\OrderDetails;
use App\Customer;
use App\Shipping;
use App\Coupon;
use App\Product;
use App\Statistic;
use Carbon\Carbon;
use Mail;
use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class OrderController extends Controller
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
    public function manage_order(){
        $this->AuthLogin();
		$getorder = Order::orderby('order_id','DESC')->paginate(5);
		return view('admin.manage_order')->with(compact('getorder'));
	}
    public function order_code(Request $request ,$order_code){
        $this->AuthLogin();
		$order = Order::where('order_code',$order_code)->first();
		$order->delete();
		Session::put('message','Xóa đơn hàng thành công');
		return redirect()->back();

	}
    public function view_order($order_code){
		$order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
		$getorder = Order::where('order_code',$order_code)->get();
		foreach($getorder as $key => $ord){
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
			$order_status = $ord->order_status;
		}
		$customer = Customer::where('customer_id',$customer_id)->first();
		$shipping = Shipping::where('shipping_id',$shipping_id)->first();

		$order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();

		foreach($order_details_product as $key => $order_d){
			$product_coupon = $order_d->product_coupon;
		}
		if($product_coupon != 'no'){
			$coupon = Coupon::where('coupon_code',$product_coupon)->first();
			$coupon_condition = $coupon->coupon_condition;
			$coupon_number = $coupon->coupon_number;
		}else{
			$coupon_condition = 2;
			$coupon_number = 0;
		}
		
		return view('admin.view_order')->with(compact('order_details','customer','shipping','coupon_condition','coupon_number','getorder','order_status'));

	}
	public function history(Request $request){
		if(!Session::get('customer_id')){
			return redirect('dang-nhap')->with('error','Vui lòng đăng nhập để xem lịch sử mua hàng');
		}else{
	        //seo 
	        $meta_desc = "Lịch sử đơn hàng"; 
	        $meta_keywords = "Lịch sử đơn hàng";
			$bread_crumb = 'Đơn hàng của bạn';
	        $meta_title = "Lịch sử đơn hàng";
	        $url_canonical = $request->url();
	        //--seo
	        
	    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
	        
	        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

	        $getorder = Order::where('customer_id',Session::get('customer_id'))->orderby('order_id','DESC')->paginate(5);

	    	return view('pages.history.history')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('bread_crumb',$bread_crumb)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('getorder',$getorder); //1
		}
	}
	public function view_history_order(Request $request,$order_code){
		if(!Session::get('customer_id')){
			return redirect('dang-nhap')->with('error','Vui lòng đăng nhập để xem lịch sử mua hàng');
		}else{
	        //seo 
	        $meta_desc = "Lịch sử đơn hàng"; 
	        $meta_keywords = "Lịch sử đơn hàng";
			$bread_crumb = 'Đơn hàng của bạn';
	        $meta_title = "Chi tiết đơn hàng";
	        $url_canonical = $request->url();
	        //--seo
	        
	    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
	        
	        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

	        
	        //xem lich sử
	        $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
			$getorder = Order::where('order_code',$order_code)->first();
			
			$customer_id = $getorder->customer_id;
			$shipping_id = $getorder->shipping_id;
			$order_status = $getorder->order_status;
			
			$customer = Customer::where('customer_id',$customer_id)->first();
			$shipping = Shipping::where('shipping_id',$shipping_id)->first();

			$order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();

			foreach($order_details_product as $key => $order_d){

				$product_coupon = $order_d->product_coupon;
			}
			if($product_coupon != 'no'){
				$coupon = Coupon::where('coupon_code',$product_coupon)->first();
				$coupon_condition = $coupon->coupon_condition;
				$coupon_number = $coupon->coupon_number;
			}else{
				$coupon_condition = 2;
				$coupon_number = 0;
			}

	    	return view('pages.history.view_history_order')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('bread_crumb',$bread_crumb)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('order_details',$order_details)->with('customer',$customer)->with('shipping',$shipping)->with('coupon_condition',$coupon_condition)->with('coupon_number',$coupon_number)->with('getorder',$getorder)->with('order_status',$order_status)->with('order_code',$order_code); //1
		}
	}
    public function update_qty(Request $request){
		$data = $request->all();
		$order_details = OrderDetails::where('product_id',$data['order_product_id'])->where('order_code',$data['order_code'])->first();
		$order_details->product_sales_quantity = $data['order_qty'];
		$order_details->product_color = $data['order_color'];
		$order_details->product_size = $data['order_size'];
		$order_details->save();
	}
    public function update_order_qty(Request $request){
		//update order
		$data = $request->all();
		$order = Order::find($data['order_id']);
		$order->order_status = $data['order_status'];
		$order->save();
		Session::put('notification','Cập nhật trạng thái đơn hàng thành công');
		//send mail confirm
		$now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
		$title_mail = "Đơn hàng đã đặt được xác nhận".' '.$now;
		$customer = Customer::where('customer_id',$order->customer_id)->first();
		$data['email'][] = $customer->customer_email;
		$total = 0;
		if($customer->customer_vip != 1){
			foreach($data['order_product_id'] as $key => $product){
				$product2 = Product::find($product);
				foreach($data['quantity'] as $key2 => $qty){
					if($key==$key2){
						if($product2->product_condition_id == 1)
						{
							$total += $product2['price_cost'] * $qty;
						}
						else
						{
							$total += $product2['product_price'] * $qty;
						}
					}
				}
			}
			if($total >= 20000000)
			{
				$customer->customer_vip = 1;
				$customer->save();
			}
		}
	  	//lay san pham
		foreach($data['order_product_id'] as $key => $product){
				$product_mail = Product::find($product);
				foreach($data['quantity'] as $key2 => $qty){
				 	if($key==$key2){
						foreach($data['color'] as $key3 => $color){
							if($key==$key3){
								foreach($data['size'] as $key4 => $size){
									if($key==$key4){
										if($product_mail->product_condition_id == 1){
											$price_sale = $product_mail['price_cost'];
										}
										else{
											$price_sale = $product_mail['product_price'];
										}
					            $cart_array[] = array(
						            'product_name' => $product_mail['product_name'],
						            'product_price' => $price_sale,
						            'product_qty' => $qty,
						            'product_color' => $color,
									'product_size' => $size
					            );
							}
				        }
				   }
				}
			}
		}
    }
	  	//lay shipping
	  	$details = OrderDetails::where('order_code',$order->order_code)->first();

		$fee_ship = $details->product_feeship;
		$coupon_mail = $details->product_coupon;

	  	$shipping = Shipping::where('shipping_id',$order->shipping_id)->first();
	  	
		$shipping_array = array(
			'fee_ship' =>  $fee_ship,
			'customer_name' => $customer->customer_name,
			'shipping_name' => $shipping->shipping_name,
			'shipping_email' => $shipping->shipping_email,
			'shipping_phone' => $shipping->shipping_phone,
			'shipping_address' => $shipping->shipping_address,
			'shipping_notes' => $shipping->shipping_notes,
			'shipping_method' => $shipping->shipping_method

		);
	  	//lay ma giam gia, lay coupon code
		$ordercode_mail = array(
			'coupon_code' => $coupon_mail,
			'order_code' => $details->order_code
		);

		Mail::send('admin.confirm_order',  ['cart_array'=>$cart_array, 'shipping_array'=>$shipping_array ,'code'=>$ordercode_mail] , function($message) use ($title_mail,$data){
			      $message->to($data['email'])->subject($title_mail);//send this mail with subject
			      $message->from($data['email'],$title_mail);//send from this mail
		});


		//order date
		$order_date = $order->order_date;	
		$statistic = Statistic::where('order_date',$order_date)->get();
		if($statistic){
			$statistic_count = $statistic->count();	
		}else{
			$statistic_count = 0;
		}	

		if($order->order_status==2){
			//them
			$total_order = 0;
			$sales = 0;
			$profit = 0;
			$quantity = 0;

			foreach($data['order_product_id'] as $key => $product_id){

				$product = Product::find($product_id);
				$product_quantity = $product->product_quantity;
				$product_sold = $product->product_sold;
				//them
				if($product->product_condition_id == 1){
					$product_price = $product->price_cost;
				}
				else{
					$product_price = $product->product_price;
				}
				$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

				foreach($data['quantity'] as $key2 => $qty){

					if($key==$key2){
						$pro_remain = $product_quantity - $qty;
						$product->product_quantity = $pro_remain;
						$product->product_sold = $product_sold + $qty;
                        $product->user_bought = $product->user_bought.','.$customer->customer_id;
						$product->save();
						//update doanh thu
						$quantity+=$qty;
						$total_order+=1;
						$sales+=$product_price*$qty;
					}
				}
			}
			//update doanh so db
			if($statistic_count>0){
				$statistic_update = Statistic::where('order_date',$order_date)->first();
				$statistic_update->sales = $statistic_update->sales + $sales;
				$statistic_update->quantity =  $statistic_update->quantity + $quantity;
				$statistic_update->total_order = $statistic_update->total_order + $total_order;
				$statistic_update->save();

			}else{

				$statistic_new = new Statistic();
				$statistic_new->order_date = $order_date;
				$statistic_new->sales = $sales;
				$statistic_new->quantity =  $quantity;
				$statistic_new->total_order = $total_order;
				$statistic_new->save();
			}



		}


	}

}
