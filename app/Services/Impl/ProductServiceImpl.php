<?php
namespace App\Services\Impl;

use App\Repositories\ProductRepository;
use App\Services\ProductService;

class ProductServiceImpl implements ProductService
{
    protected $productRepository;


    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        $products = $this->productRepository->getAll();

        return $products;
    }

    public function findById($id)
    {
        $product = $this->productRepository->findById($id);

        return $product;
    }

    public function create($request)
    {
        $product = $this->productRepository->create($request);

        return $product;
    }

    public function update($request, $id)
    {
        $oldProduct = $this->productRepository->update($request,$id);

      
        return $oldProduct;
    }

    public function destroy($id)
    {
        $product = $this->productRepository->destroy($id);

        
        return $product;
    }
    
    public function categories($id)
    {
        $categories = $this->productRepository->categories($id);

        return $categories;
    }
    public function product_detail($id)
    {
        $product_detail = $this->productRepository->product_detail($id);

        return $product_detail;
    }
    public function related_products($id)
    {
        $related_products = $this->productRepository->related_products($id);

        return $related_products;

    }
    public function filterProduct($oderBy){
        $filterProduct = $this->productRepository->filterProduct($oderBy);

        return $filterProduct;
    }
   
    public function paginate()
    {   $products = $this->productRepository->paginate();

        return $products;

    }
    public function discountPrice($discountPrice)
    {
       $products = $this->productRepository->discountPrice($discountPrice);
       return $products;
        
    }

}