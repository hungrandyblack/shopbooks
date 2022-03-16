<?php
namespace App\Services\Impl;

use App\Repositories\OrderDetailRepository;
use App\Services\OrderDetailService;

class OrderDetailServiceImpl implements OrderDetailService
{
    protected $orderDetailRepository;


    public function __construct(OrderDetailRepository $orderDetailRepository)
    {
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function getAll()
    {
        $products = $this->orderDetailRepository->getAll();

        return $products;
    }

    public function findById($id)
    {
        $product = $this->orderDetailRepository->findById($id);
        return $product;
    }

    public function create($request)
    {
        $product = $this->orderDetailRepository->create($request);
        return $product;
    }

    public function update($request, $id)
    {
        $oldProduct = $this->orderDetailRepository->update($request,$id);

        return $oldProduct;
    }

    public function destroy($id)
    {
        $product = $this->orderDetailRepository->destroy($id);

        return $product;
    }
    
    public function order_detail_order_id($order_id){
        $order_details = $this->orderDetailRepository->order_detail_order_id($order_id);
        return $order_details;

    }
    public function total($order_id){
        $total = $this->orderDetailRepository->total($order_id);
        return $total;
    }
    public function order_detail($id){
        $order_details = $this->orderDetailRepository->order_detail($id);
        return $order_details;
    }

}