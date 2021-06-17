@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Thêm sản phẩm</h1>
          <!-- DataTales Example -->
          @if(session()->has('message'))
							<div class="alert alert-success">
								{!! session()->get('message') !!}
                                <?php
                                Session::forget('message')
                                ?>
							</div>
							@elseif(session()->has('error'))
							<div class="alert alert-danger">
								{!! session()->get('error') !!}
                                <?php
                                Session::forget('error')
                                ?>
							</div>
							@endif
          <div class="card shadow mb-4">
          <div class="col-lg-8 m-auto">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Thông tin sản phẩm</h1>
                  </div>
                  <form class="user" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail" class="dark"> Tên sản phẩm</label>
                      <input type="text" class="form-control" data-validation="length" data-validation-length="min7" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="product_name" class="form-control " id="slug" onkeyup="ChangeToSlug();"  placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail"> Số lượng sp</label>
                      <input type="number" class="form-control" data-validation="number" data-validation-error-msg="Làm ơn điền số lượng" name="product_quantity" id="exampleInputPassword" name="product_quantity" min="0" placeholder="Nhập số lượng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Slug</label>
                      <input type="text" class="form-control" name="product_slug" id="convert_slug">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Giá gốc</label>
                      <input type="text" class="form-control  price_format" id="exampleInputEmail" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền số tiền" name="price_cost" placeholder="Nhập giá gốc">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Giá bán (Giá khuyến mãi)</label>
                      <input type="text" class="form-control price_format" id="exampleInputEmail" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền số tiền" name="product_price"  placeholder="Nhập giá bán">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Hình ảnh sản phẩm</label>
                      <input type="file" class="form-control" id="exampleInputEmail" name="product_image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Tài liệu</label>
                      <input type="file" class="form-control" id="exampleInputEmail" name="document">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Mô tả sản phẩm</label>
                        <textarea style="resize: none"  rows="8" class="form-control form-control-user" name="product_desc" id="ckeditor1" placeholder="Mô tả sản phẩm"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Nội dung sản phẩm</label>
                        <textarea style="resize: none"  rows="8" class="form-control form-control-user" name="product_content" id="id4" placeholder="Nội dung sản phẩm"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Danh mục sản phẩm</label>
                        <select name="product_cate" class="form-control">
                                        @foreach($cate_product as $key => $cate)
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                            
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail"> Màu sản phẩm</label>
                      <input type="text" class="form-control" id="exampleInputEmail" data-role="tagsinput" name="product_colors">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail"> Size sản phẩm</label>
                      <input type="text" class="form-control" id="exampleInputEmail" data-role="tagsinput" name="product_sizes">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail"> Tags sản phẩm</label>
                      <input type="text" class="form-control" id="exampleInputEmail" data-role="tagsinput" name="product_tags">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail"> Thương hiệu</label>
                        <select name="product_brand" class="form-control">
                                        @foreach($brand_product as $key => $brand)
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                            
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Hiển thị</label>
                        <select name="product_status" class="form-control input-sm m-bot15">
                                         <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            
                        </select>                   
                    </div>
                    <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                </div>
              </div>
          </div>

        </div>
        
@endsection