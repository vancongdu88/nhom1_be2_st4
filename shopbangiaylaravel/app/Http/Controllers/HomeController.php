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
        $dem_hang = 0;
        if(Session::get('cart')){
            $dem_hang = count(Session::get('cart'));
        }
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_parent','desc')->orderby('category_order','ASC')->get(); 
        
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(6); 

        $cate_pro_tabs = CategoryProductModel::where('category_parent','<>',0)->orderBy('category_order','ASC')->get();

    	return view('main')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('dem_hang',$dem_hang);
    }
    public function yeu_thich(Request $request){
       //seo 
       $meta_desc = "Yêu thích"; 
       $meta_keywords = "Yêu thích";
       $meta_title = "Yêu thích";
       $url_canonical = $request->url();
       //--seo
       
       $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_parent','desc')->orderby('category_order','ASC')->get(); 
       
       $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

       // $all_product = DB::table('tbl_product')
       // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
       // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
       // ->orderby('tbl_product.product_id','desc')->get();
       
       $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(6); 

       return view('pages.yeuthich.yeuthich')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical); //1
    
    }
}
