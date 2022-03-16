<?php
namespace App\Services;

interface ProductService
{
    public function getAll();
    public function findById($id);
    public function create($request);
    public function update($request, $id);
    public function destroy($id);
    public function categories($id);
    public function product_detail($id);
    public function related_products($id);
    public function filterProduct($oderBy);
    public function paginate();
    public function discountPrice($discountPrice);
}