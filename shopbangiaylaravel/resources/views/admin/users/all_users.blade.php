@extends('admin_layout')
@section('admin_content')
<!-- DataTales Example -->
<h1 class="h3 mb-2 text-gray-800 text-center">Danh sách người dùng</h1>
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
                    <th>Tên user</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Author</th>
                    <th>Admin</th>
                    <th>User</th>
                    <th class="text-center">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($admin as $key => $user)
            <form action="{{url('/assign-roles')}}" method="POST">
              @csrf
          <tr>
            <td>{{ $user->admin_name }}</td>
            <td>{{ $user->admin_email }} 
                  <input type="hidden" name="admin_email" value="{{ $user->admin_email }}">
                  <input type="hidden" name="admin_id" value="{{ $user->admin_id }}"></td>
            <td>{{ $user->admin_phone }}</td>
            <td class="text-center"><input type="checkbox" name="author_role" {{$user->hasRole('author') ? 'checked' : ''}}></td>
            <td class="text-center"><input type="checkbox" name="admin_role"  {{$user->hasRole('admin') ? 'checked' : ''}}></td>
            <td class="text-center"><input type="checkbox" name="user_role"  {{$user->hasRole('user') ? 'checked' : ''}}></td>
           
            <td class="text-center d-flex justify-content-around">
                 <p><input type="submit" value="Phân quyền" class="btn btn-sm btn-default"></p>
                 <p><a onclick="return confirm('Bạn có chắc là muốn xóa người dùng này ko?')" title="Xoá" style="margin:5px 0;" class="btn btn-sm btn-danger" href="{{url('/delete-user-roles/'.$user->admin_id)}}">Xóa user</a></p>
                 <p><a style="margin:5px 0;" class="btn btn-sm btn-success" href="{{url('/impersonate/'.$user->admin_id)}}">Chuyển quyền</a></p>
            </td>
          </tr>
          </form>
          @endforeach
                  </tbody>
                </table>
                {{ $admin->links() }}
              </div>
            </div>
          </div>
@endsection