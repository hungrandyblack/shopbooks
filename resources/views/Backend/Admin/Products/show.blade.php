@extends("Backend.Layout.App")
@section("content")
<section>
        <div class="container" style="width:600px">
            <h1 class="text-center">Chi tiết Sản Phẩm</h1>
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <h5 class="card-title" style="color:red"># : <b style="color:black"> {{$product->id}} </b> </h5>
                        <p class="card-text" style="color:red">Tên Sản Phẩm: <b style="color:black">{{$product->name}}</b>
                        </p>
                        <p class="card-text" style="color:red">Tên Danh Mục: <b style="color:black">{{$product->name_categories}}</b>
                        </p>
                        <img style="width:150px;height:150px" src="{{asset('front-end/images/'.$product->image)}}" alt="">
                        <p class="card-text" style="color:red">Giá Sản Phẩm: <b style="color:black">{{ number_format($product->price).' đ'}}</b></p>
                        <p class="card-text" style="color:red">Số Lượng Sản Phẩm: <b style="color:black">{{$product->quantity}}</b></p>
                        <p class="card-text" style="color:red">Trạng Thái Sản Phẩm: <b style="color:black">{{$product->status}}</b></p>
                        <p class="card-text" style="color:red">Mô tả Sản Phẩm: <b style="color:black">{{$product->description}}</b>

                    </div>
                    </hr>
                </div>
            </div>
            <div class="mt-2 text-end">
                <a href="{{route('products.index')}}" class="btn btn-success"><i class="fas fa-backward"></i> Quay lại</a>
            </div>
        </div>
</section>
@endsection