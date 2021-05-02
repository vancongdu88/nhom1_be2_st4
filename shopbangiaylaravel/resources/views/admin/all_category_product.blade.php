@extends('admin_layout')
@section('admin_content')
<!-- DataTales Example -->
<h1 class="h3 mb-2 text-gray-800 text-center">Danh sách danh mục</h1>
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
                      <th>Tên danh mục</th>
                      <th>Thuộc danh mục</th>
                      <th>Slug</th>
                      <th>Thứ tự danh mục</th>
                      <th>Hiển thị</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($all_category_product as $key => $cate_pro)
          <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{ $cate_pro->category_name }}</td>
            <td>@if($cate_pro->category_parent==0)
                <span style="color:red;">Danh mục cha</span>

              @else 

                @foreach($category_product as $key => $cate_sub_pro)

                  @if($cate_sub_pro->category_id==$cate_pro->category_parent)
                    <span style="color:green;">{{$cate_sub_pro->category_name}}</span>
                  @endif

                @endforeach

              @endif
            </td>
            <td>{{ $cate_pro->slug_category_product }}</td>
            <td>{{ $cate_pro->category_order }}</td>
            <td class="text-center"><span class="text-ellipsis">
              <?php
               if($cate_pro->category_status==0){
                ?>
                <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}" title="Ẩn"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}" title="Hiện"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                <?php
               }
              ?>
            </span></td>
           
            <td class="text-center d-flex justify-content-around">
              <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active styling-edit" title="Sửa">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa thương hiệu này ko?')" title="Xoá" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active styling-edit">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
                  </tbody>
                </table>
                {{ $all_category_product->links() }}
              </div>
            </div>
          </div>
@endsection