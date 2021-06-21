@extends('admin_layout')
@section('admin_content')
<!-- DataTales Example -->
<h1 class="h3 mb-2 text-gray-800">Chi tiết đơn hàng</h1>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-auto font-weight-bold text-primary text-center">Thông tin khách hàng</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tên khách hàng</th>
                      <th>Số điện thoại</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
          <tr>
            <td>{{$customer->customer_name}}</td>
            <td>{{$customer->customer_phone}}</td>
            <td>{{$customer->customer_email}}</td>
          </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary text-center">Thông tin vận chuyển</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tên người nhận</th>
                      <th>Địa chỉ</th>
                      <th>Số điện thoại</th>
                      <th>Email</th>
                      <th>Ghi chú</th>
                      <th>Hình thức thanh toán</th>
                    </tr>
                  </thead>
                  <tbody>
          <tr>
          <td>{{$shipping->shipping_name}}</td>
          <td>{{$shipping->shipping_address}}</td>
          <td>{{$shipping->shipping_phone}}</td>
          <td>{{$shipping->shipping_email}}</td>
          <td>{{$shipping->shipping_notes}}</td>
          <td>@if($shipping->shipping_method==0) Chuyển khoản @else Tiền mặt @endif</td>
          </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-auto font-weight-bold text-primary text-center">Liệt kê chi tiết đơn hàng</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên sản phẩm</th>
                      <th>Số lượng kho còn</th>
                      <th>Mã giảm giá</th>
                      <th>Phí ship hàng</th>
                      <th>Màu</th>
                      <th>Size</th>
                      <th>Số lượng</th>
                      <th>Giá bán</th>
                      <th>Tổng tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php 
                  use App\Product;
          $total = 0;
          @endphp
          @foreach($order_details as $key => $details)

          @php 
          $subtotal = $details->product_price*$details->product_sales_quantity;
          $total+=$subtotal;
          @endphp
          <tr>
            <td><i>{{$loop->index + 1}}</i></td>
            <td>{{$details->product_name}}</td>
            <td>{{$details->product->product_quantity}}</td>
            <td>
            @if($details->product_coupon!='no')
              {{$details->product_coupon}}
              @else 
              Không mã
              @endif
            </td>
            <td>{{number_format($details->product_feeship ,0,',','.')}}đ</td>
            <td>
            <?php
            $product = Product::where('product_id',$details->product_id)->first();
            $colors = $product->product_color;
            $colors = explode(",",$colors);
            $sizes = $product->product_size;
            $sizes = explode(",",$sizes);
            ?>
            <select {{$order_status==2 ? 'disabled' : ''}} class="order_color_{{$details->product_id}}" name="product_color">
                @foreach($colors as $color)
                <?php
                $color = str_replace(' ', '', $color);
                ?>
                @if($color == $details->product_color)
                <option selected value="{{$color}}">{{$color}}</option>
                @else
                <option value="{{$color}}">{{$color}}</option>
                @endif
                @endforeach
            </select>
            </td>
            <td>
            <select {{$order_status==2 ? 'disabled' : ''}} class="order_size_{{$details->product_id}}" name="product_size">
                @foreach($sizes as $size)
                @if($size == $details->product_size)
                <option selected value="{{$size}}">{{$size}}</option>
                @else
                <option value="{{$size}}">{{$size}}</option>
                @endif
                @endforeach
            </select>
            </td>
            <td>
            <input type="number" min="1" {{$order_status==2 ? 'disabled' : ''}} class="order_qty_{{$details->product_id}}" value="{{$details->product_sales_quantity}}" name="product_sales_quantity">

<input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->product_id}}" value="{{$details->product->product_quantity}}">

<input type="hidden" name="order_code" class="order_code" value="{{$details->order_code}}">

<input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">

@if($order_status!=2) 

<button class="btn btn-default update_quantity_order" data-product_id="{{$details->product_id}}" name="update_quantity_order">Cập nhật</button>
@endif
            </td>
            <td>{{number_format($details->product_price ,0,',','.')}}đ</td>
            <td>{{number_format($subtotal ,0,',','.')}}đ</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="2">  
              @php 
              $total_coupon = 0;
              @endphp
              @if($coupon_condition==1)
              @php
              $total_after_coupon = ($total*$coupon_number)/100;
              echo 'Tổng giảm :'.number_format($total_after_coupon,0,',','.').'</br>';
              $total_coupon = $total + $details->product_feeship - $total_after_coupon ;
              @endphp
              @else 
              @php
              echo 'Tổng giảm :'.number_format($coupon_number,0,',','.').'k'.'</br>';
              $total_coupon = $total + $details->product_feeship - $coupon_number ;

              @endphp
              @endif

              Phí ship : {{number_format($details->product_feeship,0,',','.')}}đ</br> 
              Thanh toán: {{number_format($total_coupon,0,',','.')}}đ 
          
            </td>
          </tr>
          <tr>
            <td colspan="2">
              @foreach($getorder as $key => $or)
              @if($or->order_status==1)
              <form>
               @csrf
               <select class="form-control order_details">
                
                <option id="{{$or->order_id}}" selected value="1">Chưa xử lý</option>
                <option id="{{$or->order_id}}" value="2">Đã xử lý-Đã giao hàng</option>
                
              </select>
            </form>
            
            @else

            <form>
              @csrf
              <select class="form-control order_details">
               
                <option disabled id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                <option id="{{$or->order_id}}" selected value="2">Đã xử lý-Đã giao hàng</option>
                
              </select>
            </form>

            

            @endif
            @endforeach


          </td>
        </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection