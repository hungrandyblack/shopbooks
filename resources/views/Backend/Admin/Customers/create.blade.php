@extends("Backend.Layout.App")
@section("content")
<div class="container " style="width:900px">
    <h1 class="mt-4 text-center text-success">Thêm mới khách hàng</h1>
    <div class="card mb-4 ">
        <div class="card-body">
            <form action="{{route('customers.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Tên:</label>
                    <input type="text" class="form-control" placeholder="Tên khách hàng" name="name">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Số điện thoại:</label>
                    <input type="text" class="form-control" placeholder="Số điện thoại" name="phone">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('phone') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Giới tính:</label>
                    <select name="gender" class="form-control">
                        <option value="">Vui lòng chọn giới tính</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('gender') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Địa chỉ:</label>
                    <input type="text" class="form-control" placeholder="Địa chỉ" name="address">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                </div>

        </div>
        <br>

        <button class="btn btn-primary"><i class="fas fa-download"></i> Lưu</button>
        <a class="btn btn-danger" href="{{route('customers.index')}}"> <i class="fas fa-backward"></i> Trở về </a>
        </form>
    </div>
</div>
</div>
@endsection