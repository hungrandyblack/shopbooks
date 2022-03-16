@extends("Backend.Layout.App")
@section("content")
<div class="container " style="width:900px" >
<h1 class="mt-4 text-center text-primary">Chỉnh sửa nhân viên</h1>
<div class="card mb-4 container">
    <div class="card-body">
        <form method="post" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Tên nhân viên :</label>
                <input type="text" class="form-control" placeholder="Tên nhân viên" name="name" value="{{$user->name}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{$user->email}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('email') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Mật khẩu:</label>
                <input type="password" class="form-control" placeholder="Mật khẩu" name="password" value="{{$user->password}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('password') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Vai trò:</label>
                <input type="text" class="form-control" placeholder="Vai trò" name="role" value="{{$user->role}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('role') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Số điện thoại:</label>
                <input type="text" class="form-control" placeholder="Số điện thoại" name="phone" value="{{$user->phone}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('phone') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Giới tính</label></br>
                <select name="gender" class="form-control" >
                    <option value="{{$user->gender}}">{{$user->gender}}</option>
                     <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('gender') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Địa chỉ:</label>
                <input type="text" class="form-control" placeholder="Địa chỉ" name="address" value="{{$user->address}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Ngày sinh:</label>
                <input type="date" class="form-control" placeholder="Ngày sinh" name="birthday" value="{{$user->birthday}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('birthday') }}</p>
                    @endif
                </div>
            </div>
            <br>

            <button type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Lưu</button>
            <a class="btn btn-danger" href="{{route('users.index')}}"> <i class="fas fa-backward"></i> Trở về </a>
        </form>
    </div>
</div>
</div>
@endsection