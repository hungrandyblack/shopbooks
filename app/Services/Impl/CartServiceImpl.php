<?php
namespace App\Services\Impl;

use App\Repositories\CartRepository;
use App\Services\CartService;

class CartServiceImpl implements CartService
{
    protected $cartRepository;


    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getAll()
    {
        $carts = $this->cartRepository->getAll();

        return $carts;
    }

    public function findById($id)
    {
        $cart = $this->cartRepository->findById($id);
        return $cart;
    }

    public function create($request)
    {
        $cart = $this->cartRepository->create($request);
       
        $statusCode = 201;
        if (!$cart)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'carts' => $cart
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldCart = $this->cartRepository->update($request,$id);
        return $oldCart;
    }

    public function destroy($id)
    {
        $cart = $this->cartRepository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($cart) {
            $this->cartRepository->destroy($cart);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
    public function cartCode($id)
    {
        $cartCode = $this->cartRepository->cartCode($id);

        return $cartCode;
    }
    public function total($id)
    {
        $total = $this->cartRepository->total($id);

        return $total;
    }
    public function delete($id){
        $cart = $this->cartRepository->delete($id);

        return $cart;
    }
  
}