<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;
use App\Services\CategoriesService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class CartController extends Controller
{
    protected $cartService;
    protected $productService;

    public function __construct(ProductService $productService, CartService $cartService)
    {
        $this->productService = $productService;
        $this->cartService    = $cartService;
    }

    public function cart(CategoriesService $categoriesService)
    {
        $value  = (empty(session('cart_code'))) ? "" : session('cart_code');
        $total  = $this->cartService->total($value);
        $carts  = $this->cartService->cartCode($value);
        $params = [
            "carts" => $carts,
            "total" => $total,
            
        ];

        return view("Frontend.Home.Cart", $params);
    }

    public function addToCart(Request $request, $id)
    {
        $quantity = $request->quantity;
        if($quantity < 1 ){
         return redirect()->back();  
        }
       
        $request["product_id"] = $id;
        $data = $request->only('product_id', 'quantity');
        // lưu vào sesion 
        if ($request->session()->has('cart_code')) {
            $cart_code = $request->session()->get('cart_code');
        } else {
            $cart_code = time();
            $request->session()->put('cart_code', $cart_code);
        }
        

        $data['code']   = $cart_code;
        $product        = Product::find($id);
        $data["price"]  = $product->price;
        $data["discount_price"]  = $product->discount_price;

        $dataCart       = $this->cartService->create($data);
        return redirect()->route('cart');
    }

    public function edit_cart(Request $request)
    {
       
        $data   = $request->only("product_id", "quantity");
        foreach($data["quantity"]  as $quantity){
            if($quantity < 1 ){
                return redirect()->back();  
            }
        }
        $value  = (empty(session('cart_code'))) ? "" : session('cart_code');
        $dataCart = $this->cartService->update($data,$value);
        return redirect()->route('cart');  
    }
    
    public function delete($id){
        $cart = $this->cartService->delete($id);
        return redirect()->route('cart');  
    }
}
