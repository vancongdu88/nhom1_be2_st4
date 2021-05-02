<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use File;
use Storage;
use App\Gallery;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 
       

        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product',$brand_product);
    	

    }
    public function all_product(){
        $this->AuthLogin();
    	$all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->paginate(5);
    	$manager_product  = view('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product', $manager_product);

    }
    public function save_product(Request $request){
            $this->AuthLogin();
            $data = array();
            
            $product_price = filter_var($request->product_price, FILTER_SANITIZE_NUMBER_INT);
            $price_cost = filter_var($request->price_cost, FILTER_SANITIZE_NUMBER_INT);
           
            $data['product_name'] = $request->product_name;
            $data['price_cost'] = $price_cost;
            $data['product_tags'] = $request->product_tags;
            $data['product_quantity'] = $request->product_quantity;
            $data['product_slug'] = $request->product_slug;
            $data['product_price'] = $product_price;
            $data['product_desc'] = $request->product_desc;
            $data['product_content'] = $request->product_content;
            $data['category_id'] = $request->product_cate;
            $data['brand_id'] = $request->product_brand;
            $data['product_status'] = $request->product_status;
            $data['product_image'] = $request->product_status;
    
            $get_image = $request->file('product_image');
            $get_document = $request->file('document');
    
            $path = 'public/uploads/product/';
            $path_gallery = 'public/uploads/gallery/';
            $path_document = 'public/uploads/document/';
            //them hinh anh
            if($get_image){
    
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move($path,$new_image);
                File::copy($path.$new_image,$path_gallery.$new_image);
                $data['product_image'] = $new_image;
               
            }
            //them document
            if($get_document){
    
                $get_name_document = $get_document->getClientOriginalName();
                $name_document = current(explode('.',$get_name_document));
                $new_document =  $name_document.rand(0,99).'.'.$get_document->getClientOriginalExtension();
                $get_document->move($path_document,$new_document);
                $data['product_file'] = $new_document;
               
            }
            $pro_id = DB::table('tbl_product')->insertGetId($data);
            $gallery = new Gallery();
            $gallery->gallery_image = $new_image;
            $gallery->gallery_name = $new_image;
            $gallery->product_id = $pro_id;
            $gallery->save();
    
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        public function delete_product($product_id){
            $this->AuthLogin();
            DB::table('tbl_product')->where('product_id',$product_id)->delete();
            Session::put('message','Xóa sản phẩm thành công');
            return Redirect::to('all-product');
        }
        public function edit_product($product_id){
            $this->AuthLogin();
           $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
           $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 
   
           $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
   
           $manager_product  = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
   
           return view('admin_layout')->with('admin.edit_product', $manager_product);
       }
       public function unactive_product($product_id){
        $this->AuthLogin();
       DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
       Session::put('message','Không kích hoạt sản phẩm thành công');
       return Redirect::to('all-product');

   }
   public function active_product($product_id){
        $this->AuthLogin();
       DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
       Session::put('message','Kích hoạt sản phẩm thành công');
       return Redirect::to('all-product');
   }
   public function update_product(Request $request,$product_id){
    $this->AuthLogin();
   $data = array();
   $product_price = filter_var($request->product_price, FILTER_SANITIZE_NUMBER_INT);
   $price_cost = filter_var($request->price_cost, FILTER_SANITIZE_NUMBER_INT);

   $data['product_name'] = $request->product_name;
   $data['price_cost'] = $price_cost;
   $data['product_tags'] = $request->product_tags;
   $data['product_quantity'] = $request->product_quantity;
   $data['product_slug'] = $request->product_slug;
   $data['product_price'] = $product_price;
   $data['product_desc'] = $request->product_desc;
   $data['product_content'] = $request->product_content;
   $data['category_id'] = $request->product_cate;
   $data['brand_id'] = $request->product_brand;
   $data['product_status'] = $request->product_status;

   $get_image = $request->file('product_image');
   $get_document = $request->file('document');

   $path_document = 'public/uploads/document/';

   if($get_image){
               $get_name_image = $get_image->getClientOriginalName();
               $name_image = current(explode('.',$get_name_image));
               $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
               $get_image->move('public/uploads/product',$new_image);
               $data['product_image'] = $new_image;
               DB::table('tbl_product')->where('product_id',$product_id)->update($data);
               Session::put('message','Cập nhật sản phẩm thành công');
               return Redirect::to('all-product');
   }
   //them document
   if($get_document){

       $get_name_document = $get_document->getClientOriginalName();
       $name_document = current(explode('.',$get_name_document));
       $new_document =  $name_document.rand(0,99).'.'.$get_document->getClientOriginalExtension();
       $get_document->move($path_document,$new_document);
       $data['product_file'] = $new_document;

       //lay file old document 
       $product = Product::find($product_id);
       
       if($product->product_file){
           unlink($path_document.$product->product_file);
       }

   }   
   DB::table('tbl_product')->where('product_id',$product_id)->update($data);
  

   Session::put('message','Cập nhật sản phẩm thành công');
   return Redirect::to('all-product');
}
}
