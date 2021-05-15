@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Thêm Thương Hiệu</h1>
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
                  <form class="user" action="{{URL::to('/save-brand-product')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail" class="dark"> Tên sản phẩm</label>
                      <input type="text" class="form-control" data-validation="length" data-validation-length="min3" data-validation-error-msg="Làm ơn điền ít nhất 3 ký tự" name="brand_product_name" class="form-control " id="slug" onkeyup="ChangeToSlug();"  placeholder="Nhập tên thương hiệu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Slug</label>
                      <input type="text" class="form-control" name="brand_slug" id="convert_slug">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Mô tả thương hiệu</label>
                        <textarea style="resize: none"  rows="8" class="form-control" name="brand_product_desc" placeholder="Nội dung thương hiệu"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Hiển thị</label>
                        <select name="brand_product_status" class="form-control input-sm m-bot15">
                                         <option value="0">Hiển thị</option>
                                         <option value="1">Ẩn</option>
                                            
                        </select>                   
                    </div>
                    <button type="submit" name="add_brand" class="btn btn-info">Thêm thương hiệu</button>
                    </form>
                </div>
              </div>
          </div>

        </div>
        
@endsection