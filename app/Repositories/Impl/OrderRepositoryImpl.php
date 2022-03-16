<?php 
namespace App\Repositories\Impl;


use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\OrderRepository;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderRepositoryImpl extends EloquentRepository  implements OrderRepository
{
     /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Order::class;
        return $model;
    }
    public function create($data)
    {
        $oders              = new Order();
        $oders->total       = $data['total'];
        $oders->status      = "Đang xử lý";
        $oders->customer_id = $data['customer_id'];
        $oders->save();
        return $oders;
    }
    public function paginate()
    {
        // $orders = DB::table("orders")
        //     ->join('customers','customers.id' ,'orders.customer_id')
        //     ->select("name","phone","email","orders.*")
        //     ->paginate(5);
        $orders = $this->model->paginate();
        return $orders;
    }
}