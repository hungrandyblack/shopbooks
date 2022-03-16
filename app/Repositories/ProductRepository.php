<?php
namespace App\Repositories;

interface ProductRepository extends Repository
{
    public function categories($id);
    public function product_detail($id);  
    public function paginate();
    public function related_products($id);  
    public function filterProduct($oderBy);
    public function discountPrice($discountPrice);
}