@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Thêm Thư Viện Ảnh</h1>
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
                    <h1 class="h4 text-gray-900 mb-4">Thêm ảnh</h1>
                  </div>
                  <form class="user" action="{{url('/insert-gallery/'.$pro_id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                    <div class="row">
                            <div class="col-md-3" align="right">
                                
                            </div>
                            <div class="col-md-6">
                                <input type="file" class="form-control" id="file" name="file[]" accept="image/*" multiple>
                                <span id="error_gallery"></span>
                            </div>
                            <div class="col-md-3" >
                                <input type="submit" name="upload" name="taianh" value="Tải ảnh" class="btn btn-success ">
                            </div>
                            
                        </div>
                    </form>
                    <div class="panel-body">
                            <input type="hidden" value="{{$pro_id}}" name="pro_id" class="pro_id">
                            <form>
                                @csrf
                                <div id="gallery_load">
                                   
                                </div>
                            </form>

                        </div>
                </div>
              </div>
          </div>

        </div>
        
@endsection