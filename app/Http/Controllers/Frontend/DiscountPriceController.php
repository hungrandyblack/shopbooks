<?php

namespace App\Http\Controllers\Frontend;

use App\Services\ProductService;
use Illuminate\Routing\Controller;

class DiscountPriceController extends Controller{

    protected $productService;
    
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function discountPrice($discountPrice)
    {
            $products   =   $this->productService->discountPrice($discountPrice);
            $params     = [
                "products"   => $products,
                
            ];
            return view("Frontend.Home.Index", $params);
    }
    public function createNews()
    {
        echo "fixx";
        
    }

}