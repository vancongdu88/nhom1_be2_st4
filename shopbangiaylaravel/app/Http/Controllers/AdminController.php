<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
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
    	return view('admin.dashboard');
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
}
