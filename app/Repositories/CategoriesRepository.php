<?php
namespace App\Repositories;

interface CategoriesRepository extends Repository
{
    public function paginate();
    public function getParentCategories();
    public function fillterCategories($category_id,$oderBy);
}