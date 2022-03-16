<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Deal Book - Website Bán Sách</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/morris/morris.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="" class="logo">
        <span class="logo-mini"><b>D</b>B</span>
        <span class="logo-lg"><b>Deal</b>Book</span>
      </a>
      <nav class="navbar navbar-static-top">
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown tasks-menu">
              <a style="font-size:medium" href="{{route('logout')}}">
                <i class="fas fa-sign-out-alt"></i> <span>Đăng Xuất</span>
              </a>
            </li>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <ul class="sidebar-menu">
          <li>
            <a style="font-size:medium" href="{{route('users.index')}}">
              <i class="fas fa-user-friends"></i> <span>Nhân Viên</span>
            </a>

            <a style="font-size:medium" href="{{route('products.index')}}">
              <i class="fas fa-book-open"></i> <span>Sản Phẩm</span>
            </a>

            <a style="font-size:medium" href="{{route('categories.index')}}">
              <i class="fas fa-book"></i> <span>Danh Mục</span>
            </a>

            <a style="font-size:medium" href="{{route('customers.index')}}">
              <i class="fas fa-walking"></i> <span>Khách Hàng</span>
            </a>

            <a style="font-size:medium" href="{{route('sliders.index')}}">
              <i class="fas fa-table"></i> <span>Slider</span>
            </a>

            <a style="font-size:medium" href="{{route('orders.index')}}">
              <i class="fas fa-shopping-cart"></i> <span>Đơn Hàng</span>
            </a>
            
            <ul class="treeview-menu"> </ul>
      </section>
    </aside>
    <div class="content-wrapper">