<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\CategoriesService;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $categoriesService;


    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoriesService->paginate();
        $params = [
            "categories"=>$categories,
        ];
      
        return view("Backend.Admin.Categories.index",$params);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = $this->categoriesService ->getParentCategories();
        return view("Backend.Admin.Categories.create",["parentCategories"=>$parentCategories]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
      $store = $this->categoriesService->create($request);
      
      return redirect()->route("categories.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category         = $this->categoriesService->findById($id);
        $parentCategories = $this->categoriesService ->getParentCategories();
        $params = [ 'category'          => $category,
                    "parentCategories"  => $parentCategories,
    ];
        return view("Backend.Admin.Categories.edit", $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $update = $this->categoriesService->update($request,$id);  
        Session::flash("success","thay đổi Danh Mục thành công");
        

        return redirect()->route("categories.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $update = $this->categoriesService->destroy($id);  
        Session::flash("success","Xóa Danh Mục thành công");

        return redirect()->route("categories.index");
        
    }
}
