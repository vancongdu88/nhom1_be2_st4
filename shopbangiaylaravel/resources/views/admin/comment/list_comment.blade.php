@extends('admin_layout')
@section('admin_content')
<!-- DataTales Example -->
<h1 class="h3 mb-2 text-gray-800 text-center">Danh sách comment</h1>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
            <div id="notify_comment"></div>
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
                    <th>Duyệt</th>
                    <th>Tên người gửi</th>
                    <th>Bình luận</th>
                    <th>Ngày gửi</th>
                    <th>Sản phẩm</th>
                    <th>Quản lý</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($comment as $key => $comm)
          <tr>
            <td>
            @if($comm->comment_status==1)
                <input type="button" data-comment_status="0" data-rating_status="0" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-primary btn-xs comment_duyet_btn" value="Duyệt" >
              @else 
                <input type="button" data-comment_status="1" data-rating_status="1" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-danger btn-xs comment_duyet_btn" value="Bỏ Duyệt" >
              @endif
            </td>
            <td>{{ $comm->comment_name }}</td>
            <td>{{ $comm->comment }}
              <style type="text/css">
                ul.list_rep li {
                  list-style-type: decimal;
                  color: blue;
                  margin: 5px 40px;
              }
              </style>
              <ul class="list_rep">
                Trả lời : 
                @foreach($comment_rep as $key => $comm_reply)
                  @if($comm_reply->comment_parent_comment==$comm->comment_id)
                    <li> {{$comm_reply->comment}}</li>
                  @endif
                @endforeach
              </ul>
              @if($comm->comment_status==0)
              <br/><textarea class="form-control reply_comment_{{$comm->comment_id}}" rows="5"></textarea>
              <br/><button class="btn btn-primary btn-xs btn-reply-comment" data-product_id="{{$comm->comment_product_id}}"  data-comment_id="{{$comm->comment_id}}">Trả lời bình luận</button>
              @endif
              </td>
            <td class="text-center">{{ $comm->comment_date }}</td>
            <td><a href="{{url('/chi-tiet/'.$comm->product->product_slug)}}" target="_blank">{{ $comm->product->product_name }}</a></td>
            <td class="text-center">
              <a onclick="return confirm('Bạn có chắc là muốn xóa bình luận này ko?')" title="Xoá" href="{{URL::to('/delete-comment/'.$comm->comment_id)}}" class="active styling-edit">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
                  </tbody>
                </table>
                {{ $comment->links() }}
              </div>
            </div>
          </div>
@endsection