@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Sửa Thương Hiệu</h1>
          <!-- DataTales Example -->
          <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
          <div class="card shadow mb-4">
          <div class="col-lg-8 m-auto">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Thông tin thương hiệu</h1>
                  </div>
                  @foreach($edit_brand_product as $key => $edit_value)
                  <form class="user" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail" class="dark"> Tên sản phẩm</label>
                      <input type="text" class="form-control" value="{{$edit_value->brand_name}}" data-validation="length" data-validation-length="min3" data-validation-error-msg="Làm ơn điền ít nhất 3 ký tự" name="brand_product_name" class="form-control " id="slug" onkeyup="ChangeToSlug();"  placeholder="Nhập tên thương hiệu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Slug</label>
                      <input type="text" class="form-control" value="{{$edit_value->brand_slug}}" name="brand_slug" id="convert_slug">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Mô tả thương hiệu</label>
                        <textarea style="resize: none"  rows="8" class="form-control" name="brand_product_desc" placeholder="Nội dung thương hiệu">{{$edit_value->brand_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Hiển thị</label>
                        <select name="brand_product_status" class="form-control input-sm m-bot15">
                        @if($edit_value->brand_status == 0)
                                          <option selected value="0">Hiển thị</>
                                          <option value="1">Ẩn</option>
                                        @else
                                          <option selected value="1">Ẩn</option>
                                          <option value="0">Hiển thị</>
                                        @endif   
                        </select>                   
                    </div>
                    <button type="submit" name="edit_brand" class="btn btn-info">Sửa thương hiệu</button>
                    </form>
                    @endforeach
                </div>
              </div>
          </div>

        </div>
        
@endsection