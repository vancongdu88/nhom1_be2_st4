<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProductModel;
use Session;
use Auth;
use DB;
use App\Exports\ExcelExports;
use App\Imports\ExcelImports;
use App\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
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
    public function add_category_product(){
        $this->AuthLogin();
        $category = CategoryProductModel::orderBy('category_id','DESC')->get();
        return view('admin.add_category_product')->with(compact('category'));
    }
    public function all_category_product(){
        $this->AuthLogin();

        $all_category_product = DB::table('tbl_category_product')->orderBy('category_id','DESC')->paginate(10);

        $manager_category_product  = view('admin.all_category_product')->with('all_category_product',$all_category_product);

        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        $cate_condition = CategoryProductModel::where('slug_category_product',$data['slug_category_product'])->get();
        if(count($cate_condition) > 0){
            Session::put('error','Danh mục sản phẩm này đã có, hãy điền danh mục mới');
            return Redirect::to('add-category-product');
        }
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');

    }
    public function active_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();

        $category = CategoryProductModel::orderBy('category_id','DESC')->get();

        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();

        $manager_category_product  = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product)->with('category',$category);

        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc'] = $request->category_product_desc;
        $cate_condition = CategoryProductModel::where('slug_category_product',$data['slug_category_product'])->where('category_id','!=',$category_product_id)->get();
        if(count($cate_condition) > 0){
            Session::put('error','Tên danh mục bạn vừa sửa đã bị trùng');
            return Redirect::to('edit-category-product/'.$category_product_id);
        }
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        $all_product_cate = Product::where('category_id',$category_product_id)->get();
        if(count($all_product_cate) > 0){
            foreach($all_product_cate as $key => $product){
                $product->delete();
            }
        }
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return redirect()->back();
    }

    public function show_category_home(Request $request ,$slug_category_product){
        Session::forget('category_id');
        Session::forget('brand_id');
        Session::forget('price');
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $category_by_slug = CategoryProductModel::where('slug_category_product',$slug_category_product)->get();

        foreach($category_by_slug as $key => $cate){
            $category_id = $cate->category_id;
        }
        $min_price = Product::with('category')->where('category_id',$category_id)->min('price_cost');
        $max_price = Product::with('category')->where('category_id',$category_id)->max('price_cost');
        $min_price_range = $min_price;
        $max_price_range = $max_price;

        if(isset($_GET['start_price']) && $_GET['end_price']){

            $price_array = array(
                'min_price' => $_GET['start_price'],
                'max_price' => $_GET['end_price']
              );
              Session::put('price',$price_array);
            $category_by_id = Product::with('category')->where('category_id',$category_id)->whereBetween('price_cost',[$_GET['start_price'],$_GET['end_price']])->orderBy('price_cost','DESC')->get();
        
        }else{
            $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('price_cost','DESC')->get();
        }


        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.slug_category_product',$slug_category_product)->limit(1)->get();

        foreach($category_name as $key => $val){
            //seo 
            $meta_desc = $val->category_desc; 
            $meta_keywords = $val->meta_keywords;
            $bread_crumb = 'Category';
            $meta_title = $val->category_name;
            $url_canonical = $request->url();
            //--seo
        }
        Session::put('category_id',$category_id);
        return view('pages.category.show_category',compact('bread_crumb'))->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('min_price',$min_price)->with('max_price',$max_price)->with('max_price_range',$max_price_range)->with('min_price_range',$min_price_range);
    }
}
