<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrder_detailRequest;
use App\Http\Requests\UpdateOrder_detailRequest;
use App\Models\Order_detail;
use App\Services\CustomerService;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\OrderDetailService;

class OrderDetailController extends Controller
{
    protected $orderService;
    protected $customerService;
    protected $productService;
    protected $orderDetailService;

    public function __construct(
        OrderService $orderService,
        CustomerService $customerService,
        ProductService $productService,
        OrderDetailService $orderDetailService
    ) {
      
        $this->orderService         = $orderService;
        $this->customerService      = $customerService;
        $this->productService       = $productService;
        $this->orderDetailService   = $orderDetailService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrder_detailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder_detailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order          = $this->orderService->findById($id);
        $order_details  = $this->orderDetailService->order_detail($id);
        $params         = [
            'order'         => $order,
            "order_details" => $order_details
        ];
        // $order_details= $this->orderService->findById($id);
        return view('Backend.Admin.Order-Details.index', $params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_detail $order_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrder_detailRequest  $request
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder_detailRequest $request, Order_detail $order_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_detail $order_detail)
    {
        //
    }
}
