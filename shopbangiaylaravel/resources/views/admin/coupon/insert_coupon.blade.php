@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Thêm Mã Giảm Giá</h1>
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
                    <h1 class="h4 text-gray-900 mb-4">Thông tin mã giảm giá</h1>
                  </div>
                  <form class="user" action="{{URL::to('/insert-coupon-code')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail" class="dark"> Tên mã giảm giá</label>
                      <input type="text" class="form-control" data-validation="length" data-validation-length="min3" data-validation-error-msg="Làm ơn điền ít nhất 3 ký tự" name="coupon_name" class="form-control "  placeholder="Nhập tên mã giảm" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Ngày bắt đầu</label>
                      <input type="text" class="form-control" name="coupon_date_start" id="start_coupon" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Ngày kết thúc</label>
                      <input type="text" class="form-control" name="coupon_date_end" id="end_coupon" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="dark">Mã giảm giá</label>
                      <input type="text" class="form-control" data-validation="length" data-validation-length="min3" data-validation-error-msg="Làm ơn điền ít nhất 3 ký tự" name="coupon_code" class="form-control "  placeholder="Nhập mã giảm giá" required>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail"> Số lượng mã</label>
                      <input type="number" class="form-control" data-validation="number" data-validation-error-msg="Làm ơn điền số lượng" name="coupon_time" id="exampleInputPassword"  min="0" placeholder="Nhập số lượng" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Tính năng mã</label>
                        <select name="coupon_condition" class="form-control input-sm m-bot15" required>
                                            <option value="">----Chọn-----</option>
                                            <option value="1">Giảm theo phần trăm</option>
                                            <option value="2">Giảm theo tiền</option>
                                            
                        </select>                   
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Nhập phần trăm hoặc tiền giảm</label>
                      <input type="text" class="form-control price_format" id="exampleInputEmail" data-validation="length" data-validation-length="min1" data-validation-error-msg="Làm ơn điền số tiền" name="coupon_number"  placeholder="Nhập số tiền hoặc phần trăm" required>
                    </div>
                    <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã</button>
                    </form>
                </div>
              </div>
          </div>

        </div>
        
@endsection