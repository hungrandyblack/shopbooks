<?php
namespace App\Services\Impl;

use App\Repositories\CategoriesRepository;
use App\Services\CategoriesService;

class CategoriesServiceImpl implements CategoriesService
{
    protected $categoriesRepository;


    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function getAll()
    {
        $products = $this->categoriesRepository->getAll();
        return $products;
    }

    public function findById($id)
    {
        $product = $this->categoriesRepository->findById($id);
        return $product;
    }

    public function create($request)
    {
        $product = $this->categoriesRepository->create($request);
        return $product;
    }

    public function update($request, $id)
    {
        $oldProduct = $this->categoriesRepository->update($request,$id);
        return $oldProduct;
    }

    public function destroy($id)
    {
        $product = $this->categoriesRepository->destroy($id);
        return $product;
    }
    public function paginate()
    {
        $categories = $this->categoriesRepository->paginate();
        return $categories;
    }
    public function getParentCategories()
    {
        $getParentCategories = $this->categoriesRepository->getParentCategories();
        return $getParentCategories;
    }
    public function fillterCategories($category_id,$oderBy){
        $fillterCategories = $this->categoriesRepository->fillterCategories($category_id,$oderBy);
        return $fillterCategories;
    }

}