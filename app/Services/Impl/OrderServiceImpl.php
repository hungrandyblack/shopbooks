<?php 
namespace App\Services\Impl;

use App\Repositories\OrderRepository;
use App\Services\OrderService;

class OrderServiceImpl implements OrderService
{
    protected $orderRepository;


    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAll()
    {
        $orders = $this->orderRepository->getAll();

        return $orders;
    }

    public function findById($id)
    {
        $orders = $this->orderRepository->findById($id);

        return $orders;
    }

    public function create($request)
    {
        $orders = $this->orderRepository->create($request);


        return $orders;
    }

    public function update($request, $id)
    {
        $oldOrders = $this->orderRepository->update($request, $id);

        return $oldOrders;
    }

    public function destroy($id)
    {
        $orders = $this->orderRepository->destroy($id);
        return $orders;
    }
    
    public function paginate()
    {
        $orders = $this->orderRepository->paginate();
        return $orders;
    }
    

}
