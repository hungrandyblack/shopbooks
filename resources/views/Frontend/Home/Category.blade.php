@extends("Frontend.Layout.Category")
@section("content")
<section class="page-content my-3">
    <div class="container">
        <div>
            <h1 class="header text-uppercase">{{$category->name}}</h1>
        </div>
        <div class="the-loai-sach">
            <ul class="list-unstyled d-flex">
                @foreach($categories as $category)
                <li>
                    <a href="{{route('productDetail',$category->id)}}" class="danh-muc text-decoration-none">
                        <div class="img text-center">
                            <img src="{{asset('front-end/images/'. $category->image  )}}" style="width:100px;height:100px" alt="tls-kinh-te-chinh-tri">
                        </div>
                        <div class="ten">
                            {{$category->name}}
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

<!-- khối sản phẩm  -->
<section class="content my-4">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <!-- header của khối sản phẩm : tag(tác giả), bộ lọc và sắp xếp  -->
            <div class=" col-12 header-khoi-sp d-flex">
                <div class="tag col-10">
                </div>
                <div class="dropdown d-flex justify-content-end">
                    <button class="btn btn-danger dropdown-toggle btn-sm text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lọc sản phẩm
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" style="background-color:#FFE5B4 ;color:black" href="{{route('fillterCategories',[$id,'ASC'])}}">Thấp đến cao</a>
                        <a class="dropdown-item" style="background-color:#FFE5B4 ;color:black" href="{{route('fillterCategories',[$id,'DESC'])}}">Cao đến thấp</a>
                    </div>
                </div>
            </div>

            <!-- các sản phẩm  -->
            <div class="items">
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-lg-3 col-md-4 col-xs-6 item DeanGraziosi">
                        <div class="card ">
                            <a href="{{route('productDetail',$category->id)}}" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                                <img class="card-img-top anh" style="width:195px;height:195px" src="{{asset('front-end/images/'. $category->image  )}}" alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                                <div class="card-body noidungsp mt-3">
                                    <h6 class="card-title ten">{{$category->name}}</h6>
                                    <small class="tacgia text-muted">{{$category->author_id}}</small>
                                    <div class="gia d-flex align-items-baseline">
                                        <div class="giamoi">{{number_format($category->price).' ₫'}} </div>
                                      
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!--het khoi san pham-->
        </div>
        <!--het div noidung-->
    </div>
    <!--het container-->
</section>
<!--het _1khoi-->
@endsection