@extends('admin_layout')
@section('admin_content')
<!-- DataTales Example -->
<h1 class="h3 mb-2 text-gray-800 text-center">Danh sách sản phẩm</h1>
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
                      <th>Tên sản phẩm</th>
                      <th>Thư viện ảnh</th>
                      <th>Số lượng</th>
                      <th>Slug</th>
                      <th>Giá bán</th>
                      <th>Giá gốc</th>
                      <th>Hình ảnh sản phẩm</th>
                      <th>Danh mục</th>
                      <th>Thương hiệu</th>
                      <th>Trạng thái</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($all_product as $key => $pro)
                    <tr>
                      <td>{{$loop->index + 1}}</td>
                      <td>{{ $pro->product_name }}</td>
                      <td><a href="{{url('/add-gallery/'.$pro->product_id)}}">Thêm thư viện ảnh</a></td>
                      <td>{{ $pro->product_quantity }}</td>
                      <td>{{ $pro->product_slug }}</td>
                      <td>{{ number_format($pro->product_price,0,',','.') }}đ</td>
                      <td>{{ number_format($pro->price_cost,0,',','.') }}đ</td>
                      <td><img src="public/uploads/product/{{ $pro->product_image }}" height="100" width="100"></td>
                      <td>{{ $pro->category_name }}</td>
                      <td>{{ $pro->brand_name }}</td>
                      <td><?php
               if($pro->product_status==0){
                ?>
                <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}" title="Ẩn"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-product/'.$pro->product_id)}}" title="Hiện"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                <?php
               }
              ?></td>
              <td>
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active styling-edit" title="Sửa">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active styling-edit" title="Xoá">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $all_product->links() }}
              </div>
            </div>
          </div>
@endsection