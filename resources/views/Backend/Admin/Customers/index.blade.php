@extends("Backend.Layout.App")
@section("content")
<h1 class="mt-4 text-center text-danger">Quản lý khách hàng</h1>
<div class="card mb-4 container">
    @if (Session::has('success'))
    <div class="alert alert-success">{{session::get('success')}}</div>
    @endif
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <a href="{{route('customers.create')}}" class="btn btn-success mb-3 ">Tạo mới <i class="fas fa-plus-square"></i></a>
            </div>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr class="bg-danger">
                    <th scope="col">STT</th>
                    <th scope="col">Tên </th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $key => $customer)
                <tr>
                    <th scope="row">{{$customer->id}}</th>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->gender}}</td>
                    <td>{{$customer->address}}</td>
                    <td>
                        <a href="{{route('customers.edit',$customer->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <form action="{{route('customers.destroy',$customer->id)}}" method="post" Style="display:inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
     </div>
</div>
@endsection