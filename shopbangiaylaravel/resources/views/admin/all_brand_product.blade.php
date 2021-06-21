@extends('admin_layout')
@section('admin_content')
<!-- DataTales Example -->
<h1 class="h3 mb-2 text-gray-800 text-center">Danh sách thương hiệu</h1>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
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
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên brand</th>
                      <th>Brand Slug</th>
                      <th>Trạng thái</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  use App\Product;
                  ?>
                  @foreach($all_brand_product as $key => $brand_pro)
          <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{ $brand_pro->brand_name }}</td>
            <td>{{ $brand_pro->brand_slug }}</td>
            <td class="text-center"><span class="text-ellipsis">
              <?php
               if($brand_pro->brand_status==0){
                ?>
                <a href="{{URL::to('/unactive-brand-product/'.$brand_pro->brand_id)}}" title="Ẩn"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-brand-product/'.$brand_pro->brand_id)}}" title="Hiện"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                <?php
               }
              ?>
            </span></td>
           
            <td class="text-center d-flex justify-content-around">
              <a href="{{URL::to('/edit-brand-product/'.$brand_pro->brand_id)}}" class="active styling-edit" title="Sửa">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <?php
                $all_product_brand = Product::where('brand_id',$brand_pro->brand_id)->get();
                $total_pro = count($all_product_brand);
                ?>
                @if($total_pro > 0)
                <a onclick="return confirm('Hiện tại đang có {{$total_pro}} sản phẩm thuộc brand này, bạn có chắc muốn xóa brand này ?')" title="Xoá" href="{{URL::to('/delete-brand-product/'.$brand_pro->brand_id)}}" class="active styling-edit">
                <i class="fa fa-times text-danger text"></i>
                </a>
                @else
                <a onclick="return confirm('Bạn có chắc là muốn xóa thương hiệu này ko?')" title="Xoá" href="{{URL::to('/delete-brand-product/'.$brand_pro->brand_id)}}" class="active styling-edit">
                <i class="fa fa-times text-danger text"></i>
                </a>
                @endif
            </td>
          </tr>
          @endforeach
                  </tbody>
                </table>
                {{ $all_brand_product->links() }}
              </div>
            </div>
          </div>
@endsection