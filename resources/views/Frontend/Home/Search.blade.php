@extends("Frontend.Layout.Home")
@section("content")
<section class="_1khoi sachmoi bg-white">
    <div class="container">
        <div class="noidung" style=" width: 100%;">
            <div class="row">
                <!--header-->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                    <h1 class="header text-uppercase" style="font-weight: 400;">DANG SÁCH TÌM KIẾM</h1>
                    <a href="sach-moi-tuyen-chon.html" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                </div>
            </div>
            <div class="khoisanpham" style="padding-bottom: 2rem;">
                <!-- 1 san pham -->
                @if(count($products) === 0 )
                <div  class="card">
                    <a href="{{route('productDetail',$product->id)}}" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                     <b>Sản phẩm của bạn không tìm thấy</b>
                    </a>
                </div>
                @endif
                @foreach($products as $product)
                <div  class="card">
                    <a href="{{route('productDetail',$product->id)}}" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                        <img style="width:200px; height:200px;" class="card-img-top anh" src="{{asset('front-end/images/'.$product->image)}}" alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                        <div class="card-body noidungsp mt-3">
                            <h3 class="card-title ten">{{$product->name}}</h3>
                            <small class="tacgia text-muted">{{$product->author_id}}</small>
                            <div class="gia d-flex align-items-baseline">
                                <div class="giamoi">{{number_format(($product->price-($product->price / 100 * $product->discount_price )))." ₫"}}</div>
                            </div>
                            <div class="danhgia">
                                <ul class="d-flex" style="list-style: none;">
                                </ul>
                                <ul class="d-flex" style="list-style: none;">
                                </ul>
                            </div> 
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection