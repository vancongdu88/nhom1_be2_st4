@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Sửa sản phẩm</h1>
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
                  @foreach($edit_product as $key => $pro)
                  <form class="user" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail" class="dark"> Tên sản phẩm</label>
                      <input type="text" class="form-control" value="{{$pro->product_name}}" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="product_name" class="form-control " id="slug" onkeyup="ChangeToSlug();"  placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail"> Số lượng sp</label>
                      <input type="number" class="form-control" value="{{$pro->product_quantity}}" data-validation="number" data-validation-error-msg="Làm ơn điền số lượng" name="product_quantity" id="exampleInputPassword" name="product_quantity" min="0" placeholder="Nhập số lượng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Slug</label>
                      <input type="text" class="form-control" value="{{$pro->product_slug}}" name="product_slug" id="convert_slug">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Giá bán</label>
                      <input type="text" class="form-control price_format" value="{{$pro->product_price}}" id="exampleInputEmail" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền số tiền" name="product_price"  placeholder="Nhập giá bán">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Giá gốc</label>
                      <input type="text" class="form-control  price_format" value="{{$pro->price_cost}}" id="exampleInputEmail" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền số tiền" name="price_cost" placeholder="Nhập giá gốc">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Hình ảnh sản phẩm</label>
                      <input type="file" class="form-control" id="exampleInputEmail" name="product_image">
                      <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100" width="100">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Tài liệu</label>
                      <input type="file" class="form-control" id="exampleInputEmail" name="document">
                      @if($pro->product_file)
                                    <p class="cofile">

                                        <a target="_blank" href="{{asset('public/uploads/document/'.$pro->product_file)}}">
                                            {{$pro->product_file}}
                                        </a>

                                        <button type="button" data-document_id="{{$pro->product_id}}" class="btn btn-sm btn-danger btn-delete-document"><i class="fa fa-times"></i></button>

                                    </p>
                                    @else 
                                    <p class="cofile">Không file</p>
                                    @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Mô tả sản phẩm</label>
                        <textarea style="resize: none"  rows="8" class="form-control form-control-user" name="product_desc" id="ckeditor1" placeholder="Mô tả sản phẩm">{{$pro->product_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Nội dung sản phẩm</label>
                        <textarea style="resize: none"  rows="8" class="form-control form-control-user" name="product_content" id="id4" placeholder="Nội dung sản phẩm">{{$pro->product_content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Danh mục sản phẩm</label>
                        <select name="product_cate" class="form-control">
                        @foreach($cate_product as $key => $cate)
                                            @if($cate->category_id==$pro->category_id)
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                        @endforeach        
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail"> Màu sản phẩm</label>
                      <input type="text" class="form-control" value="{{$pro->product_color}}" id="exampleInputEmail" data-role="tagsinput" name="product_colors">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail"> Size sản phẩm</label>
                      <input type="text" class="form-control" value="{{$pro->product_size}}" id="exampleInputEmail" data-role="tagsinput" name="product_sizes">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail"> Tags sản phẩm</label>
                      <input type="text" class="form-control" value="{{$pro->product_tags}}" id="exampleInputEmail" data-role="tagsinput" name="product_tags">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail"> Thương hiệu</label>
                        <select name="product_brand" class="form-control">
                        @foreach($brand_product as $key => $brand)
                                             @if($brand->brand_id==$pro->brand_id)
                                            <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                             @else
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                             @endif
                        @endforeach        
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Hiển thị</label>
                        <select name="product_status" class="form-control input-sm m-bot15">
                                        @if($pro->product_status == 0)
                                          <option selected value="0">Hiển thị</>
                                          <option value="1">Ẩn</option>
                                        @else
                                          <option selected value="1">Ẩn</option>
                                          <option value="0">Hiển thị</>
                                        @endif
                        </select>                   
                    </div>
                    <button type="submit" name="edit_product" class="btn btn-info">Sửa sản phẩm</button>
                    </form>
                    @endforeach
                </div>
              </div>
          </div>

        </div>
        
@endsection