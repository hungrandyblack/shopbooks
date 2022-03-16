<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\CartService;
use App\Services\CategoriesService;
use App\Services\CustomerService;
use App\Services\OrderDetailService;
use App\Services\OrderService;

class NotificationController extends Controller{
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
    public function notification(CustomerService $customerService, CategoriesService $categoriesService, $order_id, $customer_id)
    {


        $value = (empty(session('cart_code'))) ? "" : session('cart_code');
        $carts = $this->cartService->cartCode($value);

        $total = $this->orderDetailService->total($order_id);
        $order = Order::find($order_id);

        $customer       = $customerService->findById($customer_id);

        $order_details  = $this->orderDetailService->order_detail_order_id($order_id);
        if (count($order_details) === 0) {
            $count = 0;
        } else {
            $count = count($order_details);
        }
        $params = [
            "customer"          => $customer,
            "order_details"     => $order_details,
            "count"             => $count,
            "total"             => $total,
            "order"             => $order,
        ];
        return view("Frontend.Home.Notification", $params);
    }

}