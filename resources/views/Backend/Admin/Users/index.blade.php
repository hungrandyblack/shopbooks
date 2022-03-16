@extends("Backend.Layout.App")
@section("content")
<h1 class="mt-4 text-center text-danger">Quản lý nhân viên </h1>
<div class="card mb-4 container">
    @if (Session::has('success'))
    <div class="alert alert-success">{{session::get('success')}}</div>
    @endif
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <a href="{{route('users.create')}}" class="btn btn-success mb-3 ">Tạo mới <i class="fas fa-plus-square"></i></a>
            </div>
            <!-- <div class="col-4">
                <form class="" method="get" action="{{route('users.index')}}">
                    @csrf
                    <div class="input-group">
                        <input class="form-control" type="text" name="search" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div> -->
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr class="bg-danger">
                    <th scope="col">STT</th>
                    <th scope="col">Tên </th>
                    <th scope="col">Vai trò</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                        <a href="{{route('users.show',$user->id)}}" class="btn btn-primary" title="Xem"><i class="fas fa-eye"></i></a>
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-success" title="Sửa"><i class="fas fa-edit"></i></a>
                        <form action="{{route('users.destroy',$user->id)}}" method="post" Style="display:inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa?')" title="Xoá"><i class="fas fa-trash-alt"></i></button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
         <span>{{ $users->links() }} </span>
    </div>
     </div>


</div>
@endsection