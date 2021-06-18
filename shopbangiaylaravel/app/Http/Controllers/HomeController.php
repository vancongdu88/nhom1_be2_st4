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
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','DESC')->get(); 
        
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->take(8)->get();

        $sale_product = DB::table('tbl_product')->where('product_status','0')->where('product_condition_id',3)->orderby('product_id','desc')->get();

        $new_product = DB::table('tbl_product')->where('product_status','0')->where('product_condition_id',2)->orderby('product_id','desc')->get();

    	return view('main',compact('sale_product','new_product'))->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('dem_hang',$dem_hang);
    }

    public function search(Request $request){
        
        $keywords = $request->keywords_submit;

        //seo 
        $meta_desc = "Tìm kiếm sản phẩm";
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        //--seo

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get(); 


        return view('pages.sanpham.search')->with('keywords',$keywords)->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title);

    }

    public function yeu_thich(Request $request){
        //seo 
        $meta_desc = "Yêu thích"; 
        $meta_keywords = "Yêu thích";
        $meta_title = "Yêu thích";
        $url_canonical = $request->url();
        //--seo
 
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','DESC')->get();
 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
 
        $all_product = DB::table('tbl_product')->where('product_status','0')->where('wishlist','1')->orderby(DB::raw('RAND()'))->paginate(6); 
 
        return view('pages.yeuthich.yeuthich')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical); //1
 
     }
}
