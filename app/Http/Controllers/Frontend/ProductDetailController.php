<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Services\CartService;
use App\Services\CategoriesService;
use Illuminate\Http\Request;



class ProductDetailController extends Controller
{
    protected $productService;
    protected $cartService;
    

    public function __construct(ProductService $productService,CartService $cartService)
    {
        $this->productService   = $productService;
        $this->cartService      = $cartService;
       
    }
    public function product_detail($id,CategoriesService $categoriesService)
   {
    
       $value               = (empty(session('cart_code'))) ? "" : session('cart_code');
       $carts               = $this->cartService->cartCode($value);
       $product_details     = $this->productService->product_detail($id);
       $related_products    = $this->productService->related_products($product_details->category_id);
       $params              = [
                                'product_details'   => $product_details,
                                "related_products"  => $related_products,
                              ];
       return view("Frontend.Home.Product_detail",$params);
   }
}
