<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use \App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\CartService;
use App\Services\CategoriesService;
use App\Services\ProductService;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class ProductController extends Controller
{

    protected $productService;
    protected $cartService;
    protected $categoriesService;

    public function __construct(ProductService $productService, CartService $cartService,CategoriesService  $categoriesService)
    {
        $this->productService       = $productService;
        $this->cartService          = $cartService;
        $this->categoriesService    = $categoriesService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->paginate();
        $params   = ['products'=>$products];
        return view('Backend.Admin.Products.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoriesService ->getAll();
        $params     = ["categories"=>$categories];

      return view("Backend.Admin.Products.create",$params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
      $store =$this->productService->create($request);
      return redirect()->route("products.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          
        $product      = $this->productService->findById($id);
        $categories   = $this->categoriesService ->getAll();
        $params       = [
                            'product'    =>  $product,
                            'categories' => $categories,
                        ];
        return view("Backend.Admin.Products.show",$params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $product      = $this->productService->findById($id);
        $categories   = $this->categoriesService ->getAll();
        $params       = [
                            'product'    =>  $product,
                            'categories' => $categories,
                        ];
        return view("Backend.Admin.Products.edit",$params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request,$id)
    {
        $update = $this->productService->update($request,$id);
        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->productService->destroy($id);
        FacadesSession::flash("success","Xóa sách thành công");

        return redirect()->route("products.index");

    }
}
