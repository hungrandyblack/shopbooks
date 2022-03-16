@extends("Frontend.Layout.Cart")
@section("content")

<!-- giao diện giỏ hàng  -->
<section class="content my-3">
    <div class="container">
        <div class="cart-page bg-white">
            <div class="row">
                <!-- giao diện giỏ hàng khi không có item  -->
                @if(count($carts) === 0)
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
                <div class="col-md-12 cart d-block">
                    <h6 class="header-gio-hang">GIỎ HÀNG CỦA BẠN <span>{{'Có '. $count .' Sản Phẩm'}}</span></h6>
                    @foreach($carts as $cart)
                    @csrf
                    <div class="cart-list-items">
                        <div class="cart-item d-flex">
                            <a href="product-item.html" class="img">
                                <img src="{{asset('front-end/images/'.$cart->image)}}" style="width:100px;height:100px" class="img-fluid" alt="anhsp1">
                            </a>
                            <div class="item-caption d-flex w-100">
                                <div class="item-info ml-3">
                                    <a href="product-item.html" class="ten">{{ $cart->name }}</a>
                                    <div class="soluong d-flex">
                                        <div class="input-number input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text btn-spin btn-dec">-</span>
                                            </div>
                                            <form action="{{route('editcart')}}" method="POST" style="display:flex">
                                                @csrf
                                                <input type="hidden" name="product_id[]" value="{{$cart->product_id}}">
                                                <input type="text" name="quantity[]" value="{{$cart->quantity}}" class="soluongsp  text-center">
                                                <div class="input-group-append">
                                                    <span class="input-group-text btn-spin btn-inc">+</span>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-price ml-auto d-flex flex-column align-items-end">
                                    <div class="giamoi">{{number_format($cart->total)}} ₫</div>
                                    <a class = "btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')"  href="{{Route('delete',$cart->id)}}">
                                            <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <a  class="btn btn-warning mt-2" href="{{route('buyNow',$cart->id)}}" >Mua ngay</a>
                                    
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-danger">Cập nhật</button>
                            <a href="{{route('home')}}" class="btn btn-danger">Mua thêm</a>
                            @if(count($carts) === 0)
                            <a onclick="return confirm('bạn chưa thêm sản phẩm vào giỏ hàng')" style="color:white" class="btn btn-danger">Thanh toán</a>
                            @else
                            <a href="{{route('checkout')}}"  class="btn btn-danger" style="color:white">Thanh toán</a>
                            @endif
                        </div>
                        </form>
                        <div class="col-md-6 offset-md-6">
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
</section>

@endsection