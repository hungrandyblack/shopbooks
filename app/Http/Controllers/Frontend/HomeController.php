<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CategoriesService;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\CartService;
use App\Services\SliderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $productService;
    protected $cartService;
    protected $sliderService;

    public function __construct(ProductService $productService, CartService $cartService,SliderService $sliderService)
    {
        $this->productService = $productService;
        $this->cartService    = $cartService;
        $this->sliderService  = $sliderService;
    }

    public function home(CategoriesService $categoriesService)
    {
        $products = $this->productService->getAll();
        $params   = [
            "products"   => $products,
            
        ];
        return view("Frontend.Home.Index", $params);
    }

    public function search(Request $request, CategoriesService $categoriesService)
    {
        $value      = (empty(session('cart_code'))) ? "" : session('cart_code');
        $carts      = $this->cartService->cartCode($value);
        $products   = $this->productService->getAll();
        $search     = $request->search;
        $products   = DB::table('products')->where('name', 'like', '%' . $search . '%')->get();
        // dd($products);
        $params = [
            "products"   => $products,
        ];
        return view("Frontend.Home.Search", $params);
    }

    public function filtersProduct($orderBy, CategoriesService $categoriesService)
    {
        $products  = $this->productService->filterProduct($orderBy);
       
       
        $params = [
            "products"   => $products,
        ];
        return view("Frontend.Home.Index", $params);
    }
}
