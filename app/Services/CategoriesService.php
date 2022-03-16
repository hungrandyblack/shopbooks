<?php
namespace App\Services;

interface CategoriesService
{
    public function getAll();
    public function findById($id);
    public function create($request);
    public function update($request, $id);
    public function destroy($id);
    public function paginate();
    public function getParentCategories();
    public function fillterCategories($category_id,$oderBy);
}