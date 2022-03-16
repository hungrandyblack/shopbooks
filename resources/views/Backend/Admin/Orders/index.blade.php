@extends("Backend.Layout.App")
@section("content")

<table class="table">
    <h3 class="mt-4 text-center text-danger">Đơn Hàng</h3>
    <thead>
        <tr class="bg-danger">
            <th scope="col">Stt</th>
            <th scope="col">Tên Người Mua</th>
            <th scope="col">Email</th>
            <th scope="col">Số Điện Thoại</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Tổng Tiền</th>
            <th scope="col">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $key => $order)
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $order->customer->name }}</td>
            <td>{{ $order->customer->email }}</td>
            <td>{{ $order->customer->phone }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ number_format($order->total)." đ" }}</td>
            <td>
                <a href="{{route('orderdetails.show',$order->id)}}" class="btn btn-warning"><i class="fas fa-eye"></i>Xem</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $orders->links() }}
</div>

@endsection