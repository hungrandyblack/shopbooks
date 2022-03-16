<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\ProductService;
use App\Services\CartService;
use App\Services\CategoriesService;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $productService;
    protected $cartService;
    protected $categoriesService;

    public function __construct(ProductService $productService, CartService $cartService,CategoriesService $categoriesService)
    {
        $this->productService     = $productService;
        $this->cartService        = $cartService;
        $this->categoriesService  = $categoriesService;
    }
    public function categories($id,CategoriesService $categoriesService)
    {
        $category   = Category::find($id);
        $categories = $this->productService->categories($id);
        $params     = [
        
            "category"   => $category,
            "categories" => $categories,
            "id"         => $id

        ];
        return view("Frontend.Home.Category", $params);
    }
    public function fillterCategories($category_id,$oderBy){
        $id = $category_id;
        $category   = Category::find($category_id);

        $categories = $this->categoriesService->fillterCategories($category_id,$oderBy);

        $params     = [
        
            "category"   => $category,
            "categories" => $categories,
            "id"         => $category_id

        ];
        return view("Frontend.Home.Category", $params);
    }
}
