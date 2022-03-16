<?php
namespace App\Services\Impl;

use App\Repositories\CustomerRepository;
use App\Repositories\CRepository;
use App\Services\CustomerService;

class CustomerServiceImpl implements CustomerService
{
    protected $customerRepository;


    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll()
    {
        $customers = $this->customerRepository->getAll();

        return $customers;
    }

    public function findById($id)
    {
        $customer = $this->customerRepository->findById($id);
        return $customer;
    }

    public function create($request)
    {
        $customer = $this->customerRepository->create($request);

        return $customer;
       
    }

    public function update($request, $id)
    {
        $oldProduct = $this->customerRepository->update($request,$id);

       
        return $oldProduct;
    }

    public function destroy($id)
    {
       
        $customer = $this->customerRepository->destroy($id);

       
        return $customer;
    }
    
   

}