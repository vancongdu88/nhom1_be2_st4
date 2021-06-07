@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Thêm Admin</h1>
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
                    <h1 class="h4 text-gray-900 mb-4">Thông tin admin</h1>
                  </div>
                  <form class="user" action="{{URL::to('store-users')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail" class="dark">Tên user</label>
                      <input type="text" class="form-control" data-validation="length" data-validation-length="min3" data-validation-error-msg="Làm ơn điền ít nhất 3 ký tự" name="admin_name" class="form-control"   placeholder="Nhập tên admin">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                      <input type="text" class="form-control" name="admin_email" placeholder="Nhập Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Phone</label>
                        <input type="text" class="form-control" id="exampleInputEmail" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền số" name="admin_phone" placeholder="Nhập giá số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Password</label>
                        <input type="password" name="admin_password" class="form-control" id="exampleInputEmail1" placeholder="Password">
                    </div>
                    <button type="submit" name="add_admin" class="btn btn-info">Thêm admin</button>
                    </form>
                </div>
              </div>
          </div>

        </div>
        
@endsection