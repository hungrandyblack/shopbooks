<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Dealbook-Mua sách trực tuyến giá rẻ nhất</title>
    <meta name="description" content="Mua sách online hay, giá tốt nhất, combo sách hot bán chạy, giảm giá cực khủng cùng với những ưu đãi như miễn phí giao hàng, quà tặng miễn phí, đổi trả nhanh chóng. Đa dạng sản phẩm, đáp ứng mọi nhu cầu.">
    <meta name="keywords" content="nhà sách online, mua sách hay, sách hot, sách bán chạy, sách giảm giá nhiều">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('front-end/css/home.css')}}">
    <script type="text/javascript" src="{{asset('front-end/js/main.js')}}"></script>
    <link rel="stylesheet" href="{{asset('front-end/fontawesome_free_5.13.0/css/all.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('front-end/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/slick/slick-theme.css')}}" />
    <script type="text/javascript" src="{{asset('front-end/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    <link rel="canonical" href="http://dealbook.xyz/">
    <meta name="google-site-verification" content="urDZLDaX8wQZ_-x8ztGIyHqwUQh2KRHvH9FhfoGtiEw" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('front-end/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front-end/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front-end/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('front-end/favicon_io/site.webmanifest')}}">
    <style>
        img[alt="www.000webhost.com"] {
            display: none;
        }
    </style>
</head>

<body>
    <!-- code cho nut like share facebook  -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

    <!-- header -->
    <nav class="navbar navbar-expand-md bg-white navbar-light">
        <div class="container">
            <!-- logo  -->
            <a class="navbar-brand" href="{{route('home')}}" style="color: #CF111A;"><b>DealBook</b></a>

            <!-- navbar-toggler  -->
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <!-- form tìm kiếm  -->
                <form method="post" action="{{ route('search') }}" class="form-inline ml-auto my-2 my-lg-0 mr-3">
                    @csrf
                    <div class="input-group" style="width: 520px;">
                        <input type="text" class="form-control" name="search" aria-label="Small" placeholder="Nhập sách cần tìm kiếm...">
                        <div class="input-group-append">
                            <button type="submit" class="btn" style="background-color: #CF111A; color: white;">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- ô đăng nhập đăng ký giỏ hàng trên header  -->
                <ul class="navbar-nav mb-1 ml-auto">
                <li class="nav-item account" >
                            <a href="{{route('login')}}" class="btn btn-secondary rounded-circle">
                                <i class="fa fa-user"></i>
                            </a>
                            <a class="nav-link text-dark text-uppercase" href="{{route('login')}}" style="display:inline-block">Tài
                                khoản</a>
                        </li>
                    <li class="nav-item giohang">
                        <a href="{{route('cart')}}" class="btn btn-secondary rounded-circle">
                            <i class="fa fa-shopping-cart"></i>
                            <div class="cart-amount">{{$count}}</div>
                        </a>
                        <a class="nav-link text-dark giohang text-uppercase" href="{{route('cart')}}" style="display:inline-block">Giỏ
                            Hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- thanh tieu de "danh muc sach" + hotline + ho tro truc tuyen -->
    <section class="duoinavbar">
        <div class="container text-white">
            <div class="row justify">
                <div class="col-md-3">
                    <div class="categoryheader">
                        <div class="noidungheader text-white">
                            <i class="fa fa-bars"></i>
                            <span class="text-uppercase font-weight-bold ml-1">Danh mục sách</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="benphai float-right">
                        <div class="hotline">
                        <i class="fas fa-home"></i>
                            <a href="{{route('home')}}">TRANG CHỦ</a>
                        </div>
                        <div class="hotline">
                            <i class="fa fa-phone"></i>
                            <span>Hotline:<b>1900 1999</b> </span>
                        </div>
                        <i class="fas fa-comments-dollar"></i>
                        <a href="#">Hỗ trợ trực tuyến </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="header bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="margin-right: -15px;">
                    <!-- CATEGORIES -->
                    <div class="categorycontent">
                        <ul>
                            @foreach($categoriesCurrent as $category)
                            <li> <a href="{{route('categories',$category->id)}}">{{$category->name}}</a>
                            @if(count($category->chillCategories) > 0)
                            <ul>
                                    <li class="liheader"><a href="#" class="header text-uppercase">{{$category->name}}</a></li>
                                    <div class="content trai">
                                        @foreach($category->chillCategories as $chillCategory )
                                        <li><a href="#">{{$chillCategory->name}}</a></li>
                                       @endforeach
                                    </div>

                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- banner slider  -->
                <div class="col-md-9 px-0">
                    <div id="carouselId" class="carousel slide" data-ride="carousel">
                        <ol class="nutcarousel carousel-indicators rounded-circle">
                            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselId" data-slide-to="1"></li>
                            <li data-target="#carouselId" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">

                            @foreach($sliders as $key => $slider)
                            <div class="carousel-item <?= ($key === 0) ? ' active' : ''; ?>">
                                <a href="{{route('discountPrice',20)}}"><img src="{{asset('front-end/images/'.$slider->image)}}" class="img-fluid" style="height: 386px;" width="900px" alt="Second slide"></a>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselId" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselId" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>