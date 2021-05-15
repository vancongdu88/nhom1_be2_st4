@extends('admin_layout')
@section('admin_content')
<!-- DataTales Example -->
<h1 class="h3 mb-2 text-gray-800 text-center">Danh sách đơn hàng</h1>
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
                      <th>STT</th>
                      <th>Mã đơn hàng</th>
                      <th>Ngày đặt</th>
                      <th class="text-center">Tình trạng đơn hàng</th>
                      <th class="text-center">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getorder as $key => $ord)
          <tr>
            <td>{{$loop->index + 1}}</td>
            <td style="text-transform: uppercase;">{{ $ord->order_code }}</td>
            <td>{{ $ord->created_at }}</td>
            <td class="text-center">
                @if($ord->order_status==1)
                    Đơn hàng mới
                @else 
                    Đã xử lý - Đã giao hàng
                @endif
            </td>
           
            <td class="text-center d-flex justify-content-around">
              <a href="{{URL::to('/view-order/'.$ord->order_code)}}" class="active styling-edit" title="Xem chi tiết đơn hàng">
              <i class="fa fa-eye text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa thương hiệu này ko?')" title="Xoá" href="{{URL::to('/delete-order/'.$ord->order_code)}}" class="active styling-edit">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
                  </tbody>
                </table>
                {{ $getorder->links() }}
              </div>
            </div>
          </div>
@endsection