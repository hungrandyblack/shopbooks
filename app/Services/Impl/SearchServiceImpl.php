<?php
namespace App\Services\Impl;

use App\Repositories\SearchRepository;
use App\Services\SearchService;

class SearchServiceImpl implements SearchService
{
    protected $searchRepository;

    public function __construct(SearchRepository $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function getAll()
    {
        $products = $this->searchRepository->getAll();

        return $products;
    }

    public function findById($id)
    {
        $product = $this->searchRepository->findById($id);

        return $product;
    }

    public function create($request)
    {
        $product = $this->searchRepository->create($request);

        return $product;
    }

    public function update($request, $id)
    {
        $oldProduct = $this->searchRepository->update($request,$id);

        return $oldProduct;
    }

    public function destroy($id)
    {
        $product = $this->searchRepository->destroy($id);

        return $product;
    }
    public function search($request){
        
    }
}
