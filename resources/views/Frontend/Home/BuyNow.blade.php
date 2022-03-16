@extends("Frontend.Layout.Cart")
@section("content")

<!-- giao diện giỏ hàng  -->
<section class="content my-3">
    <div class="container">
        <div class="cart-page bg-white">
            <div class="row">
                <!-- giao diện giỏ hàng khi không có item  -->
                @if(!$cart)
                <div class="col-12 cart-empty ">
                    <div class="py-3 pl-3">
                        <h6 class="header-gio-hang">GIỎ HÀNG CỦA BẠN <span>(0 sản phẩm)</span></h6>
                        <div class="cart-empty-content w-100 text-center justify-content-center">
                            <img src="{{asset('front-end/images/shopping-cart-not-product.png')}}" alt="shopping-cart-not-product">
                            <p>Chưa có sản phẩm nào trong giở hàng của bạn</p>
                            <a href="{{Route('home')}}" class="btn nutmuathem mb-`3">Mua thêm</a>
                        </div>
                    </div>
                </div>
                @endif
                <!-- giao diện giỏ hàng khi có hàng (phần comment màu xanh bên dưới là phần 2 sản phẩm trong giỏ hàng nhưng giờ đã demo bằng jquery) -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tên Sản Phẩm</th>
                                                <th>Hình Ảnh</th>
                                                <th>Số Lượng</th>
                                                <th>Giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $cart->name }}</td>
                                                <td><img width="100" src="{{asset('front-end/images/'.$cart->image)}}" class="img-fluid" alt="anhsp1"></td>
                                                <td>{{$cart->quantity}}</td>
                                                <td>{{number_format($cart->total )}} ₫</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{route('payBuyNow',$id)}}" method="post">
                                        @csrf
                                        <label>Họ & Tên</label>
                                        <div class="form-label-group">
                                            <input type="text" id="inputName" class="form-control" placeholder="Nhập họ và tên" name="name"  autocomplete="off">
                                        </div>
                                        @if ($errors)
                                        <div class="text-danger">{{$errors->first('name')}}</div>
                                        @endif
                                        <label>Số Điện Thoại</label>
                                        <div class="form-label-group">
                                            <input type="text" id="inputPhone" class="form-control" placeholder="Nhập số điện thoại" name="phone" autocomplete="off">
                                        </div>
                                        @if ($errors)
                                        <div class="text-danger">{{$errors->first('phone')}}</div>
                                        @endif
                                        <label>Email</label>
                                        <div class="form-label-group">
                                            <input type="email" id="inputEmail" class="form-control" placeholder="Nhập địa chỉ email" name="email" autocomplete="off">
                                        </div>
                                        @if ($errors)
                                        <div class="text-danger">{{$errors->first('email')}}</div>
                                        @endif
                                        <label>Địa Chỉ</label>
                                        <div class="form-label-group">
                                            <input type="text" id="inputAddress" class="form-control" placeholder="Nhập Địa chỉ giao hàng" name="address" autocomplete="off">
                                        </div>
                                        @if ($errors)
                                        <div class="text-danger">{{$errors->first('address')}}</div>
                                        @endif
                                        <label>Giới Tính</label>
                                        <div class="form-label-group">
                                            <select name="gender" class="form-control">
                                                <option value="">Giới Tính</option>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select>
                                        </div>
                                        @if ($errors)
                                        <div class="text-danger">{{$errors->first('gender')}}</div>
                                        @endif
                                        <a href=""></a>
                                        <button class="btn btn-success form-control" style="background: #F5A623">Đặt mua</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

@endsection