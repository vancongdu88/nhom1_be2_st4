<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Product;
use Session;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
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
    public function all_brand_product(){
        $this->AuthLogin();
    	//$all_brand_product = DB::table('tbl_brand')->get(); //static huong doi tuong
        // $all_brand_product = Brand::all(); 
        $all_brand_product = Brand::orderBy('brand_id','DESC')->paginate(5);
    	$manager_brand_product  = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
    	return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }
    public function add_brand_product(){
        $this->AuthLogin();
    	return view('admin.add_brand_product');
    }
    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $brand_condition = Brand::where('brand_slug',$data['brand_slug'])->get();
        if(count($brand_condition) > 0){
            Session::put('error','Thương hiệu sản phẩm này đã có, hãy điền một cái tên mới');
            return Redirect::to('add-brand-product');
        }
        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_slug = $data['brand_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();
       
    	// $data = array();
    	// $data['brand_name'] = $request->brand_product_name;
        // $data['brand_slug'] = $request->brand_slug;
    	// $data['brand_desc'] = $request->brand_product_desc;
    	// $data['brand_status'] = $request->brand_product_status;
    	// DB::table('tbl_brand')->insert($data);
        
    	Session::put('message','Thêm thương hiệu sản phẩm thành công');
    	return Redirect::to('all-brand-product');
    }
    public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Session::put('message','Không kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');

    }
    public function active_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put('message','Kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');

    }
    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();

        // $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
        $edit_brand_product = Brand::where('brand_id',$brand_product_id)->get();
        $manager_brand_product  = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);

        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }
    public function update_brand_product(Request $request,$brand_product_id){
        $this->AuthLogin();
        $data = $request->all();
        $brand_condition = Brand::where('brand_slug',$data['brand_slug'])->where('brand_id','!=',$brand_product_id)->get();
        if(count($brand_condition) > 0){
            Session::put('error','Tên thương hiệu bạn vừa sửa đã bị trùng');
            return Redirect::to('edit-brand-product/'.$brand_product_id);
        }
        $brand = Brand::find($brand_product_id);
        // $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_slug = $data['brand_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();
        // $data = array();
        // $data['brand_name'] = $request->brand_product_name;
        // $data['brand_slug'] = $request->brand_slug;
        // $data['brand_desc'] = $request->brand_product_desc;
        // DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        $all_product_brand = Product::where('brand_id',$brand_product_id)->get();
        if(count($all_product_brand) > 0){
            foreach($all_product_brand as $key => $product){
                $product->delete();
            }
        }
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return redirect()->back();
    }
    public function show_brand_home(Request $request, $brand_slug){
        Session::forget('brand_id');
        Session::forget('category_id');
        Session::forget('price');
        //database
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
       
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_brand.brand_slug',$brand_slug)->get();

        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_slug',$brand_slug)->limit(1)->get();
        $brand_by_slug = Brand::where('brand_slug',$brand_slug)->get();
        //get brand id
        foreach($brand_by_slug as $key => $brand){
            $brand_id = $brand->brand_id;
        }
        $min_price = Product::with('brand')->where('brand_id',$brand_id)->min('price_cost');
        $max_price = Product::with('brand')->where('brand_id',$brand_id)->max('price_cost');
        $min_price_range = $min_price;
        $max_price_range = $max_price;
        if(isset($_GET['start_price']) && $_GET['end_price']){

            $price_array = array(
                'min_price' => $_GET['start_price'],
                'max_price' => $_GET['end_price']
              );
              Session::put('price',$price_array);
            $brand_by_id = Product::with('brand')->where('brand_id',$brand_id)->whereBetween('price_cost',[$_GET['start_price'],$_GET['end_price']])->orderBy('price_cost','DESC')->get();
        
        }else{
            $brand_by_id = Product::with('brand')->where('brand_id',$brand_id)->orderBy('price_cost','DESC')->get();
        }

        foreach($brand_name as $key => $val){
            //seo 
            $meta_desc = $val->brand_desc; 
            $meta_keywords = $val->brand_desc;
            $bread_crumb = 'Brand';
            $meta_title = $val->brand_name;
            $url_canonical = $request->url();
            //--seo
        }
        Session::put('brand_id',$brand_id);
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('bread_crumb',$bread_crumb)->with('url_canonical',$url_canonical)->with('min_price',$min_price)->with('max_price',$max_price)->with('max_price_range',$max_price_range)->with('min_price_range',$min_price_range);
    }
}
