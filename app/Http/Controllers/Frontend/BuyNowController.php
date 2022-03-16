<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\CustomerRequest;
use App\Services\CartService;
use App\Services\CategoriesService;
use App\Services\CustomerService;
use App\Services\OrderDetailService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyNowController {
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
    public function buyNow($id)
    {
        $value = (empty(session('cart_code'))) ? "" : session('cart_code');
        $cart = $this->cartService->findById($id);
        // echo $id;
        // echo "<pre>";
        // print_r($cart);
        $params = [
            "cart"=> $cart,
            "id" => $id
        ];
        return view('Frontend.Home.BuyNow',$params);
    }
    public function payBuyNow(CustomerRequest  $request,CustomerService $customerService,$id,
    OrderDetailService $orderDetailService
    )
    {
        $value = (empty(session('cart_code'))) ? "" : session('cart_code');
        $cart = $this->cartService->findById($id);
        $customer_id = $this->checkUserExist($request->email,$request->phone);
        echo $customer_id;

        $data = $request->all();

        if ($customer_id  === 0) {
            $customer = $customerService->create($data);
            $customer_id = DB::getPdo()->lastInsertId();
        }
        $data["total"]       = $cart->total;
        $data["customer_id"] = $customer_id;
        $order = $this->orderService->create($data);
        $order_id = DB::getPdo()->lastInsertId();
        $cart->order_id = $order_id;
        $order_detail       = $orderDetailService->create($cart);
        $delete = $this->cartService->delete($id);
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
