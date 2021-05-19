<?php

namespace App\Http\Controllers;
use DB;
use Session;
use App\Http\Requests;
use Mail;
use App\CategoryProductModel;
use App\Product;
use Illuminate\Support\Facades\Redirect;
session_start();

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // add homecomtroller

    public function index(Request $request){
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_parent','desc')->orderby('category_order','ASC')->get(); 
        
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(6); 

        $cate_pro_tabs = CategoryProductModel::where('category_parent','<>',0)->orderBy('category_order','ASC')->get();

    	return view('main')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
}
