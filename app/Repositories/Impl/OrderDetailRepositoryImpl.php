<?php

namespace App\Repositories\Impl;

use App\Models\Order;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\OrderDetailRepository;
use App\Models\Order_detail;
use Illuminate\Support\Facades\DB;

class OrderDetailRepositoryImpl extends EloquentRepository  implements OrderDetailRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Order_detail::class;
        return $model;
    }
    public function create($data)
    {

        $ordertail              = new Order_detail();
        $ordertail->order_id    = $data->order_id;
        $ordertail->product_id  = $data->product_id;
        $ordertail->price       = $data->price;
        $ordertail->quantity    = $data->quantity;

        $ordertail->save();
        return $ordertail;
    }
    public function order_detail_order_id($order_id)
    {
        $order_details = DB::table('order_details')
            ->join("products", "order_details.product_id", "products.id")
            ->select(
                "order_details.*",
                "products.name",
                "products.image",
                DB::raw("(order_details.price * order_details.quantity) as total")
            )
            ->where("order_id", "=", $order_id)->get();
        return $order_details;
    }
    public function total($order_id)
    {
        $total = DB::table('order_details')
            ->select(DB::raw("sum(order_details.price * order_details.quantity) as ToTal"))
            ->where("order_id", $order_id)->first();
        return $total;
    }

    public function order_detail($id)
    { 
        // $order_details = DB::table('order_details')
        // ->join('orders','orders.id' , 'order_details.order_id')
        // ->join('customers', 'customers.id','orders.customer_id')
        // ->join('products','products.id' ,'order_details.product_id')
        // ->select('customers.name as customer_name','customers.email','customers.phone','customers.address','customers.gender','orders.total','products.name','products.image','order_details.*')
        // ->where('order_id',$id)->get();
       
        $order_details = $this->model->where('order_id',$id)->get();
        return $order_details;
    }
  
}
