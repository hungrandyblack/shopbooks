@extends("Backend.Layout.App")
@section("content")

<section class="content my-3">
  <!-- <div> -->
  <div class="container">
    <div class="cart-page bg-white">
      <div class="row">
        <div class="cart d-block">
          <div class="row">
            <div class="col-lg-6">
              <h3 style="text-align:center"> CHI TIẾT ĐƠN HÀNG</h3><br>
              <div style="padding-left:40px">
                <p style="color:red">{{"MÃ KHÁCH HÀNG :". $order->customer->id}}</p>
                <hr>
                <p>{{"TÊN KHÁCH HÀNG : ". $order->customer->name}}</p>
                <hr>
                <p>{{"EMAIL KHÁCH HÀNG : ". $order->customer->email;}}</p>
                <hr>
                <p>{{"SỐ ĐIỆN THOẠI : ". $order->customer->phone;}}</p>
                <hr>
                <p>{{"GIỚI TÍNH : ".  $order->customer->gender}}</p>
                <hr>
                <p>{{"ĐỊA CHỈ GIAO HÀNG : ".  $order->customer->address}}</p>
              </div>
            </div>
            <div class="col-lg-6">
              @foreach($order_details as $order_detail)
              <div class="cart-list-items">
                <div class="cart-item d-flex">
                  <a href="product-item.html" class="img">
                    <b> ẢNH:</b> <img src="{{asset('front-end/images/'.$order_detail->product->image)}}" class="img-fluid" alt="anhsp1" style="width:180px ;margin-left: 127px;">
                  </a>
                  <div class="item-caption d-flex ">
                    <div class="item-info ml-3">
                      <b> TÊN SÁCH :</b> <a href="product-item.html" class="ten">{{ $order_detail->product->name }}</a>
                      <p>
                      <div>
                        <label class="soluong">SỐ LƯỢNG: </label>
                        <label class="soluong">{{ $order_detail->quantity }}</label>
                      </div>
                      </p>
                      <div class="item-price ml-auto d-flex flex-column align-items-end">
                        <div class="giamoi"><strong>GIÁ SÁCH : </strong> {{number_format($order_detail->product->price).' đ'}}</div>
                      </div>
                    </div>
                  </div>
                  <hr>
                </div>
                @endforeach
              </div>
            </div>
            <!-- gia tien -->
            <div class="row">
              </form>
              <div class="col-md-5 offset-md-6">
                <div class="tonggiatien">
                  <div class="group d-flex justify-content-between align-items-center">
                    <strong class="text-uppercase">Tổng cộng : <span style="color:red">{{ number_format($order_detail->order->total).' đ' }}</span></strong>
                  </div>
                </div>
              </div>
            </div>
            <!-- end -->
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div style="margin-left: 20px;"><a class="btn btn-success" href="{{route('orders.index')}}"><i class="fas fa-backward"></i> Trở Về</a></div> 

  </div>
  </div>
  </div>

  </div>

</section>



@endsection