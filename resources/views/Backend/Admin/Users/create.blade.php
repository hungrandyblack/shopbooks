@extends("Backend.Layout.App")
@section("content")
<div class="container " style="width:900px">
    <h1 class="mt-4 text-center text-success">Thêm mới nhân viên</h1>
    <div class="card mb-4 ">
        <div class="card-body">
            <form action="{{route('users.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Tên:</label>
                    <input type="text" class="form-control" placeholder="Tên nhân viên" name="name">
                    @if ($errors)
                    <div class="text-danger">{{$errors->first('name')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    @if ($errors)
                    <div class="text-danger">{{$errors->first('email')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Mật khẩu:</label>
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                    @if ($errors)
                    <div class="text-danger">{{$errors->first('password')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Vai trò:</label>
                    <input type="text" class="form-control" placeholder="Vai trò" name="role">
                    @if ($errors)
                    <div class="text-danger">{{$errors->first('role')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Số điện thoại:</label>
                    <input type="text" class="form-control" placeholder="Số điện thoại" name="phone">
                    @if ($errors)
                    <div class="text-danger">{{$errors->first('phone')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Giới tính</label></br>
                    <select name="gender" class="form-control">
                        <option value="">Vui lòng chọn giới tính</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                    @if ($errors)
                    <div class="text-danger">{{$errors->first('gender')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Địa chỉ:</label>
                    <input type="text" class="form-control" placeholder="Địa chỉ" name="address">
                    @if ($errors)
                    <div class="text-danger">{{$errors->first('address')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Ngày sinh:</label>
                    <input type="date" class="form-control" placeholder="Ngày sinh" name="birthday">
                    @if ($errors)
                    <div class="text-danger">{{$errors->first('birthday')}}</div>
                    @endif
                </div>

        </div>
        <br>

        <button class="btn btn-primary"><i class="fas fa-download"></i> Lưu</button>
        <a class="btn btn-danger" href="{{route('users.index')}}"> <i class="fas fa-backward"></i> Trở về </a>
        </form>
    </div>
</div>
</div>
@endsection