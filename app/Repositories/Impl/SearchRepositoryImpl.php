<?php 
namespace App\Repositories\Impl;

use App\Models\Product;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\SearchRepository;

class SearchRepositoryImpl extends EloquentRepository  implements SearchRepository
{
    public function getModel()
    {
        $model = Product::class;
        return $model;
    }
}