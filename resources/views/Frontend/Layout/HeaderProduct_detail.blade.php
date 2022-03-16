
<!DOCTYPE html>
<html lang="li">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('front-end/css/product-item.css')}}" />
    <script type="text/javascript" src="{{asset('front-end/js/main.js')}}"></script>
    <link rel="stylesheet" href="{{asset('front-end/fontawesome_free_5.13.0/css/all.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('front-end/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/slick/slick-theme.css')}}" />
    <script type="text/javascript" src="{{asset('front-end/slick/slick.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('front-end/jquery.fancybox.min.css')}}" />
    <script src="{{asset('front-end/jquery.fancybox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front-end/jquery.validate.min.js')}}"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('front-end/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front-end/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front-end/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('front-end/site.webmanifest')}}">
</head>

<body>
    <!-- code cho nut like share facebook  -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

    <!-- header -->
    <nav class="navbar navbar-expand-md bg-white navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}" style="color: #CF111A;"><b>DealBook</b></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
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
    <!-- thanh "danh muc sach" đã được ẩn bên trong + hotline + ho tro truc tuyen -->
    <section class="duoinavbar">
        <div class="container text-white">
            <div class="row justify">
                <div class="col-lg-3 col-md-5">
                    <div class="categoryheader">
                        <div class="noidungheader text-white">
                            <i class="fa fa-bars"></i>
                            <span class="text-uppercase font-weight-bold ml-1">Danh mục sách</span>
                        </div>
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
                </div>
                <div class="col-md-5 ml-auto contact d-none d-md-block">
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
