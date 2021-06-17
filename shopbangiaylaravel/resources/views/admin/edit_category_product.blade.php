@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Sửa Danh Mục</h1>
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
                    <h1 class="h4 text-gray-900 mb-4">Thông tin danh mục</h1>
                  </div>
                  @foreach($edit_category_product as $key => $edit_value)
                  <form class="user" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail" class="dark">Tên danh mục</label>
                      <input type="text" class="form-control" value="{{$edit_value->category_name}}" data-validation="length" data-validation-length="min3" data-validation-error-msg="Làm ơn điền ít nhất 3 ký tự" name="category_product_name" class="form-control " id="slug" onkeyup="ChangeToSlug();"  placeholder="Nhập tên thương hiệu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Slug</label>
                      <input type="text" class="form-control" value="{{$edit_value->slug_category_product}}" name="slug_category_product" id="convert_slug">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Mô tả danh mục</label>
                        <textarea style="resize: none"  rows="8" class="form-control" name="category_product_desc" placeholder="Nội dung danh mục" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự">{{$edit_value->category_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Từ khóa danh mục</label>
                        <textarea style="resize: none"  rows="8" class="form-control" name="category_product_keywords" placeholder="Nội dung từ khoá" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự">{{$edit_value->meta_keywords}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Hiển thị</label>
                        <select name="category_product_status" class="form-control input-sm m-bot15">
                        @if($edit_value->category_status == 0)
                                          <option selected value="0">Hiển thị</>
                                          <option value="1">Ẩn</option>
                                        @else
                                          <option selected value="1">Ẩn</option>
                                          <option value="0">Hiển thị</>
                                        @endif        
                        </select>                   
                    </div>
                    <button type="submit" name="add_category_product" class="btn btn-info">Sửa danh mục</button>
                    </form>
                    @endforeach
                </div>
              </div>
          </div>

        </div>
        
@endsection