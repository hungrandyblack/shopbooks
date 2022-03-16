@extends("Frontend.Layout.Product_detail")
@section('content')
<section class="product-page mb-4">
    <div class="container">
        <!-- chi tiết 1 sản phẩm -->
        <div class="product-detail bg-white p-4">
            <div class="row">
                <!-- ảnh  -->
                <div class="col-md-5 khoianh">
                    <div class="anhto mb-4">
                        <a class="active" href="" data-fancybox="thumb-img">
                            <img class="product-image" src="{{asset('front-end/images/'. $product_details->image )}}" alt="ma-bun-luu-manh-mt" style="width: 400px;height:400px">
                        </a>
                    </div>
                    <div class="list-anhchitiet d-flex mb-4" style="margin-left: 2rem;">
                        <img class="thumb-img thumb1 mr-3" src="{{asset('front-end/images/'. $product_details->image )}}" class="img-fluid" alt="ma-bun-luu-manh-mt">
                    </div>
                </div>
                <!-- thông tin sản phẩm: tên, giá bìa giá bán tiết kiệm, các khuyến mãi, nút chọn mua.... -->
                <div class="col-md-7 khoithongtin">
                    <div class="row">
                        <div class="col-md-12 header">
                            <h4 class="ten">{{$product_details->name}}</h4>
                            <div class="rate">
                            </div>
                            <hr>
                        </div>
                        <div class="col-md-7">
                            <div class="gia">
                                <div class="giaban">
                                    <span>Giá bán tại DealBooks:</span>
                                    <span class="giamoi font-weight-bold" style="margin-top:-20px">{{number_format(($product_details->price-($product_details->price / 100 * $product_details->discount_price )))." ₫"}} </span>
                                </div>
                            </div>
                            <div class="soluong d-flex">
                                <form action="{{route('addToCart',$product_details->id)}}" method="post">
                                    @csrf
                                    <label class="font-weight-bold">Số lượng: </label>
                                    <div class="input-number input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text btn-spin btn-dec">-</span>
                                        </div>
                                        <input type="text" value="1" class="soluongsp  text-center" name="quantity">
                                        <div class="input-group-append">
                                            <span class="input-group-text btn-spin btn-inc">+</span>
                                        </div>
                                    </div>
                            </div>
                            <button class="nutmua btn w-100 text-uppercase">Chọn mua</button>
                            </form>
                            <a class="huongdanmuahang text-decoration-none" href="#">(Vui lòng xem hướng dẫn mua
                                hàng)</a>
                            <small class="share"> </small>
                            <div class="fb-like" data-href="https://www.facebook.com/DealBook-110745443947730/" data-width="300px" data-layout="button" data-action="like" data-size="small" data-share="true"></div>
                        </div>
                    </div>
                </div>
                <!-- decripstion của 1 sản phẩm: giới thiệu , đánh giá độc giả  -->
                <div class="product-description col-md-9">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active text-uppercase" id="nav-gioithieu-tab" data-toggle="tab" href="#nav-gioithieu" role="tab" aria-controls="nav-gioithieu" aria-selected="true">Giới thiệu</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active ml-3" id="nav-gioithieu" role="tabpanel" aria-labelledby="nav-gioithieu-tab">
                            <h6 class="tieude font-weight-bold">{{$product_details->name}}</h6>
                            <p>
                                <span>{{$product_details->description}}</span>
                            </p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- khối sản phẩm tương tự -->
<section class="_1khoi sachmoi">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="row">
                <!--header-->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light pt-4">
                    <h5 class="header text-uppercase" style="font-weight: 400;">Sản Phẩm Liên Quan </h5>
                    <a href="{{route('categories',$product_details->category_id)}}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                </div>
            </div>
            <div class="khoisanpham" style="padding-bottom: 2rem;">
                <!-- 1 sp -->
                @foreach($related_products as $related_product)
                <div class="card">
                    <a href="{{route('productDetail',$related_product->id)}}" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                        <img style='width:236px;height:226px' class="card-img-top anh" src="{{asset('front-end/images/'. $related_product->image)}}" alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                        <div class="card-body noidungsp mt-3">
                            <h6 class="card-title ten">{{$related_product->name}}</h6>
                            <small class="tacgia text-muted">{{$related_product->author_id}}</small>
                            <div class="gia d-flex align-items-baseline">
                                <div class="giamoi">{{number_format($related_product->price)." ₫"}}</div>
                            </div>
                            <div class="danhgia">
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    @endsection