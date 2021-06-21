<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\SocialCustomers;
use App\Customer;
use App\Order;
use App\Comment;
use App\Statistic;
use Socialite;
use Auth;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
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
    public function index(){
     return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $samonthnow = Statistic::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
        $sadaynow = Statistic::where('order_date',$now)->get();
        $allneworder = Order::where('order_status',1)->get();
        $allnewcomment = Comment::where('comment_status',1)->get();
        $totalneworder = count($allneworder);
        $totalnewcomment = count($allnewcomment);
        if(count($sadaynow) > 0){
            foreach($sadaynow as $key => $value){
                $totalsaday = $value->sales;
                $proinday = $value->quantity;
            }
        }
        else{
            $totalsaday = 0;
            $proinday = 0;
        }
        $totalsamonth = 0;
        $proinmonth = 0;
        foreach($samonthnow as $key => $value){
            $totalsamonth += $value->sales;
            $proinmonth += $value->quantity;
        }
    	return view('admin.dashboard',compact('totalsaday','totalsamonth','totalneworder','totalnewcomment','proinmonth','proinday'));
    }
    public function dashboard(Request $request){
    	$this->validate($request,[
            'admin_email' => 'required|email|max:255', 
            'admin_password' => 'required|max:255'
        ]);
        // $data = $request->all();

        if(Auth::attempt(['admin_email'=>$request->admin_email,'admin_password'=>$request->admin_password ])){
            return redirect('/dashboard');
        }else{
            return redirect('/admin')->with('message','Lỗi đăng nhập authentication');
        }


    }
    public function logout(){
        $this->AuthLogin();
    Session::put('admin_name',null);
    Session::put('admin_id',null);
    Session::put('login_normal',null);
    return Redirect::to('/admin');
    }
    public function findOrCreateCustomer($users, $provider){
        $authUser = SocialCustomers::where('provider_user_id', $users->id)->first();
        if($authUser){
            return $authUser;
        }else{
            $customer_new = new SocialCustomers([
                'provider_user_id' => $users->id,
                'provider_user_email' => $users->email,
                'provider' => strtoupper($provider)
            ]);

            $customer = Customer::where('customer_email',$users->email)->first();

            if(!$customer){

                $customer = Customer::create([
                    'customer_name' => $users->name,
                    'customer_picture' => $users->avatar,
                    'customer_email' => $users->email,
                    'customer_password' => '',
                    'customer_phone' => ''
                ]);
            }

            $customer_new->customer()->associate($customer);

            $customer_new->save();
            return $customer_new;
        }           

    }
    public function login_customer_google(){
        config( ['services.google.redirect' => env('GOOGLE_CLIENT_URL')] );
        return Socialite::driver('google')->redirect();
    }
    public function callback_customer_google(){

        config( ['services.google.redirect' => env('GOOGLE_CLIENT_URL')] );

        $users = Socialite::driver('google')->stateless()->user(); 

        $authUser = $this->findOrCreateCustomer($users, 'google');

        if($authUser){
            $account_name = Customer::where('customer_id',$authUser->user)->first();
            Session::put('customer_id',$account_name->customer_id);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_name',$account_name->customer_name);
            Session::put('login-gg', "Đăng nhập bằng tài khoản google ".$account_name->customer_email." thành công");

        }elseif($customer_new){
            $account_name = Customer::where('customer_id',$authUser->user)->first();
            Session::put('customer_id',$account_name->customer_id);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_name',$account_name->customer_name);
            Session::put('login-gg', "Đăng nhập bằng tài khoản google ".$account_name->customer_email." thành công");
        }

        return redirect('/');  
    }
    
}
