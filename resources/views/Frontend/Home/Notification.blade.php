@extends("Frontend.Layout.Cart")
@section("content")

<section  class="content my-3">
<div style="display:flex" class="col-12">
 <div class="col-4"></div>
 <div class="col-4">
            <p  style="color:red">{{"CẢM ƠN  ". $customer->name. " ĐÃ GHÉ SHOP 🌸";}}</p>
            <p >{{"✯ ĐỊA CHỈ GIAO HÀNG : ". $customer->address;}}</p>
            <p >{{"✯ SỐ ĐIỆN THOẠI : ". $customer->phone;}}</p>
            <p >{{"✯ TÌNH TRẠNG ĐƠN HÀNG : ".  $order->status;}}</p>
            <p >{{"✯ HÌNH THỨC THANH TOÁN : Vui lòng thanh toán khi nhận hàng";}}</p>
            </div>
            </div>
    <div class="container">
        <div class="cart-page bg-white">
            <div class="row">
                <!-- giao diện giỏ hàng khi không có item  -->
                @if(count($order_details) === 0)
                <div class="col-12 cart-empty ">
                    <div class="py- pl-3">
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
                <div class="col-md-10 cart d-block">
                    <hr>
                    @foreach($order_details as $cart)
                    @csrf
                    <div class="cart-list-items">
                        <div class="cart-item d-flex">
                            <a href="product-item.html" class="img">
                                <img src="{{asset('front-end/images/'.$cart->image)}}" class="img-fluid" alt="anhsp1">
                            </a>
                            <div class="item-caption d-flex w-100">
                                <div class="item-info ml-3">
                                    <a href="product-item.html" class="ten">{{ $cart->name }}</a>
                                    <p>
                                    <div>
                                        <label class="soluong">Số lượng: </label>
                                        <label class="soluong">{{ $cart->quantity }}</label>
                                    </div>
                                    </p>
                                    <div class="soluong d-flex">
                                        <div class="input-number input-group mb-12">
                                            <form action="{{route('editcart')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id[]" value="{{$cart->product_id}}">

                                        </div>
                                    </div>
                                </div>
                                <div class="item-price ml-auto d-flex flex-column align-items-end">
                                    <div class="giamoi">{{number_format($cart->total)}} ₫</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('home')}}" class="btn btn-danger">Mua thêm</a>
                        </div>
                        </form>
                        <div class="col-md-5 offset-md-6">
                            <div class="tonggiatien">
                                <div class="group d-flex justify-content-between">
                                    <p class="label">Tạm tính:</p>
                                    <p class="tamtinh">{{ number_format($total->ToTal). ' ₫' }}</p>
                                </div>
                                <div class="group d-flex justify-content-between align-items-center">
                                    <strong class="text-uppercase">Tổng cộng:</strong>
                                    <p class="tongcong">{{ number_format($total->ToTal). ' ₫' }}</p>
                                </div>
                                <small class="note d-flex justify-content-end text-muted">
                                    (Giá đã bao gồm VAT)
                                </small>
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
    </div>
</section>

@endsection