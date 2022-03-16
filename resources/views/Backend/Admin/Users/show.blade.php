@extends("Backend.Layout.App")
@section("content")
<div class="container" style="width:600px">
    <h1 class="text-center">Chi tiết nhân viên</h1>
    <div class="card">
        <div class="card-header" style="text-align: center;color:red">Thông tin <b style="color:black">{{$user->name}}</b></div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title" style="color:red"># : <b style="color:black"> {{$user->id}} </b> </h5>
                <p class="card-text" style="color:red">Tên nhân viên: <b style="color:black">{{$user->name}}</b>
                </p>
                <p class="card-text" style="color:red">Vai trò : <b style="color:black">{{$user->role}}</b>
                </p>
                <p class="card-text" style="color:red">Email: <b style="color:black">{{$user->email}}</b>
                </p>
                <p class="card-text" style="color:red">Số điện thoại : <b style="color:black">{{$user->phone}}</b>
                </p>
            </div>
            </hr>
        </div>
    </div>
    <div class="mt-2 text-end">
        <a href="{{route('users.index')}}" class="btn btn-danger"> <i class="fas fa-backward"></i> Trở về</a>
    </div>
</div>
@endsection