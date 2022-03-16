@extends("Frontend.Layout.Home")
@section("content")
<section class="_1khoi sachmoi bg-white">
    <div class="container">
        <div class="noidung" style=" width: 100%;">
            <div class="row">
                <!--header-->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                    <h1 class="header text-uppercase" style="font-weight: 400;">SÁCH MỚI TUYỂN CHỌN</h1>
                    <div class="dropdown d-flex justify-content-end">
                        <button class="btn btn-danger dropdown-toggle btn-sm text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Lọc sản phẩm
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" style="background-color:#FFE5B4 ;color:black" href="{{route('filtersProduct','ASC')}}">Thấp đến cao</a>
                            <a class="dropdown-item" style="background-color:#FFE5B4 ;color:black" href="{{route('filtersProduct','DESC')}}">Cao đến thấp</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="khoisanpham" style="padding-bottom: 2rem;">
                <!-- 1 san pham -->
                @foreach($products as $product)
                <div class="card">
                    <a href="{{route('productDetail',$product->id)}}" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                        <img style="width:200px; height:200px;" class="card-img-top anh" src="{{asset('front-end/images/'.$product->image)}}" alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                        <div class="card-body noidungsp mt-3">
                            <h3 class="card-title ten">{{$product->name}}</h3>
                            <small class="tacgia text-muted">{{$product->author_id}}</small>
                            <div class="gia d-flex align-items-baseline">
                                <div class="giamoi">{{number_format(($product->price-($product->price / 100 * $product->discount_price )) )." ₫"}}</div>
                                <div class="giacu text-muted">{{number_format(($product->price))}} ₫</div>
                                    <div class="sale">{{$product->discount_price ."%"}}</div>   
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

<!-- khoi sach combo hot  -->
<section class="_1khoi combohot mt-4">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="row">
                <!--header -->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                    <h2 class="header text-uppercase" style="font-weight: 400;">COMBO SÁCH HOT</h2>
                </div>
            </div>
            <div class="khoisanpham">
                @foreach($products as $product)
                <div class="card">
                    <a href="{{route('productDetail',$product->id)}}" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                        <img style="width:200px; height:200px;" class="card-img-top anh" src="{{asset('front-end/images/'.$product->image)}}" alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                        <div class="card-body noidungsp mt-3">
                            <h3 class="card-title ten">{{$product->name}}</h3>
                            <small class="tacgia text-muted">{{$product->author_id}}</small>
                            <div class="gia d-flex align-items-baseline">
                                <div class="giamoi">{{number_format(($product->price-($product->price / 100 * $product->discount_price )))." ₫"}}</div>
                                <div class="giacu text-muted">{{number_format(($product->price))}} ₫</div>
                                    <div class="sale">{{$product->discount_price ."%"}}</div>   
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

<!-- khoi sach sap phathanh  -->
<section class="_1khoi sapphathanh mt-4">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="row">
                <!--header-->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                    <h2 class="header text-uppercase" style="font-weight: 400;">SÁCH SẮP PHÁT HÀNH</h2>
                </div>
            </div>
            <div class="khoisanpham">
                <!-- 1 san pham -->
                @foreach($products as $product)
                <div class="card">
                    <a href="{{route('productDetail',$product->id)}}" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                        <img style="width:200px; height:200px;" class="card-img-top anh" src="{{asset('front-end/images/'.$product->image)}}" alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                        <div class="card-body noidungsp mt-3">
                            <h3 class="card-title ten">{{$product->name}}</h3>
                            <small class="tacgia text-muted">{{$product->author_id}}</small>
                            <div class="gia d-flex align-items-baseline">
                                <div class="giamoi">{{number_format(($product->price-($product->price / 100 * $product->discount_price )))}}₫</div>
                                <div class="giacu text-muted">{{number_format(($product->price))}} ₫</div>
                                    <div class="sale">{{$product->discount_price ."%"}}</div>    
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