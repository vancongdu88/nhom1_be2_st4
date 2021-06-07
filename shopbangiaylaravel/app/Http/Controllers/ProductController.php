<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use File;
use Storage;
use App\Product;
use App\Rating;
use App\Gallery;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    // product controller
    public function details_product($product_slug , Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_slug',$product_slug)->get();

        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
            $product_id = $value->product_id;
            $product_cate = $value->category_name;
            $cate_slug = $value->slug_category_product;
                //seo 
                $meta_desc = $value->product_desc;
                $meta_keywords = $value->product_slug;
                $meta_title = $value->product_name;
                $url_canonical = $request->url();
                $share_images = url('public/uploads/product/'.$value->product_image);
                //--seo
            }

        //gallery
         $gallery = Gallery::where('product_id',$product_id)->get();
         $product = Product::where('product_id',$product_id)->get();
        //update views 
        $product = Product::where('product_id',$product_id)->first();
        $product->product_views = $product->product_views + 1;
        $product->save();
        
        //related product
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_slug',[$product_slug])->orderby(DB::raw('RAND()'))->paginate(3);

        $rating = Rating::where('product_id',$product_id)->avg('rating');
        $rating = round($rating);
        return view('pages.sanpham.show_details')->with('category',$cate_product)->with('product',$product)->with('brand',$brand_product)->with('product_details',$details_product)->with('relate',$related_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('gallery',$gallery)->with('product_cate',$product_cate)->with('cate_slug',$cate_slug)->with('rating',$rating)->with('share_images',$share_images);

    }
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
