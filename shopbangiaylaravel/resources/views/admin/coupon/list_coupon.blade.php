@extends('admin_layout')
@section('admin_content')
<!-- DataTales Example -->
<h1 class="h3 mb-2 text-gray-800 text-center">Danh sách mã giảm giá</h1>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tên mã giảm giá</th>
                      <th>Ngày bắt đầu</th>
                      <th>Ngày kết thúc</th>
                      <th>Mã giảm giá</th>
                      <th>Số lượng mã</th>
                      <th>Điều kiện giảm</th>
                      <th>Số giảm</th>
                      <th>Tình trạng</th>
                      <th>Hạn sử dụng</th>
                      <th>Thao tác</th>
                      <th>Gửi mã</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($coupon as $key => $cou)
          <tr>
            <td>{{ $cou->coupon_name }}</td>
            <td>{{ $cou->coupon_date_start }}</td>
            <td>{{ $cou->coupon_date_end }}</td>
            <td>{{ $cou->coupon_code }}</td>
            <td>{{ $cou->coupon_time }}</td>
            
            <td class="text-center"><span class="text-ellipsis">
              <?php
               if($cou->coupon_condition==1){
                ?>
                   Giảm theo %                
                <?php
                 }else{
                ?>  
                 Giảm theo tiền
                <?php
               }
              ?>
            </span></td>

            <td class="text-center"><span class="text-ellipsis">
              <?php
               if($cou->coupon_condition==1){
                ?>
                   Giảm {{$cou->coupon_number}} %                
                <?php
                 }else{
                ?>  
                 Giảm {{$cou->coupon_number}} k
                <?php
               }
              ?>
            </span></td>

            <td class="text-center"><span class="text-ellipsis">
              <?php
               if($cou->coupon_status==1){
                ?>
                   <span style="color:green">Đang kích hoạt</span>                
                <?php
                 }else{
                ?>  
                 <span style="color:red">Đã khóa</span>
                <?php
               }
              ?>
            </span></td>
            <td>

          @if($cou->coupon_date_end>=$today)
          <span style="color:green">Còn hạn</span>
          @else 
          <span style="color:red">Đã hết hạn</span>
          @endif
          

        </td>
        <td>

          <a onclick="return confirm('Bạn có chắc là muốn xóa mã này ko?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active styling-edit" ui-toggle-class="">
            <i class="fa fa-times text-danger text"></i>
          </a>
        </td>
        <td>
      
      <p><a href="{{url('/send-coupon-vip', [ 

        'coupon_time'=> $cou->coupon_time,
        'coupon_condition'=> $cou->coupon_condition,
        'coupon_number'=> $cou->coupon_number,
        'coupon_code'=> $cou->coupon_code


      ])}}" class="btn btn-primary" style="margin:5px 0;">Gửi giảm giá khách vip</a></p>    
      <p><a href="{{url('/send-coupon',[ 

       
        'coupon_time'=> $cou->coupon_time,
        'coupon_condition'=> $cou->coupon_condition,
        'coupon_number'=> $cou->coupon_number,
        'coupon_code'=> $cou->coupon_code


      ])}}" class="btn btn-default">Gửi giảm giá khách thường</a></p>  
   

   </td>
          </tr>
          @endforeach
                  </tbody>
                </table>
                {{ $coupon->links() }}
              </div>
            </div>
          </div>
@endsection