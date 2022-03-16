<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order_detail;

use App\Http\Requests\CustomerRequest;
use App\Models\Cart;
use App\Services\CartService;
use App\Services\OrderDetailService;
use App\Services\OrderService;
use App\Services\CustomerService;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Services\CategoriesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    protected $cartService;
    protected $orderService;
    protected $categoriesService;
    protected $orderDetailService;

    public function __construct(
        CartService $cartService,
        OrderService $orderService,
        CategoriesService $categoriesService,
        OrderDetailService $orderDetailService
    ) {

        $this->cartService          = $cartService;
        $this->orderService         = $orderService;
        $this->categoriesService    = $categoriesService;
        $this->orderDetailService   = $orderDetailService;
    }
    public function checkout()
    {
        $value = (empty(session('cart_code'))) ? "" : session('cart_code');
        $carts = $this->cartService->cartCode($value);
        $total              = $this->cartService->total($value);
        $carts              = $this->cartService->cartCode($value);

        $params = [
            "carts" => $carts,
            "total" => $total,
        ];

        return view("Frontend.Home.Checkout", $params);
    }
    public function create(
        CustomerRequest  $request,
        CustomerService $customerService,
        OrderDetailService $orderDetailService
    ) {

        $value = (empty(session('cart_code'))) ? "" : session('cart_code');
        $total = $this->cartService->total($value);
        $carts = $this->cartService->cartCode($value);

        $customer_id = $this->checkUserExist($request->email,$request->phone);

        $data = $request->all();
        if ($customer_id  === 0) {
            $customer = $customerService->create($data);
            $customer_id = DB::getPdo()->lastInsertId();
        }

        session()->put('customer_id', $customer_id);
        $data["total"]       = $total->ToTal;
        $data["customer_id"] = $customer_id;

        //Thêm dữ liệu vào bảng Orders
        $order = $this->orderService->create($data);
        // lay id cua sau khi them 
        $order_id = DB::getPdo()->lastInsertId();
        $data["order_id"] = $order_id;
        //Lưu vào bảng chi tiết đơn hàng
        // session()->put('order_id',$order_id);
        //session()->flash('order_id', $order_id);
        session(['order_id' => $order_id]);

        Session::flash('success', 'cảm ơn bạn đã mua hàng');

        foreach ($carts as $key => $cart) {
            $cart->order_id = $order_id;
            $order_detail       = $orderDetailService->create($cart);
        }
        $deleteCart = Cart::where('code', $value);
        $deleteCart->delete();

        return redirect()->route("notification", [$order_id, $customer_id]);
    }

    public function checkUserExist($email,$phone)
    {
        $user = DB::table('customers')->where('email', '=', $email)->orWhere('phone',$phone)->first();
        if ($user) {
            return $user->id;
        } else {
            return 0;
        }
    }
   
}
