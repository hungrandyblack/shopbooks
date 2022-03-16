<?php

namespace App\Repositories\Impl;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class CustomerRepositoryImpl extends EloquentRepository  implements CustomerRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Customer::class;
        return $model;
    }
    public function create($request)
    {
        $customer           = new Customer();
        $customer->phone    = $request["phone"];
        $customer->name     = $request["name"];
        $customer->email    = $request['email'];
        $customer->gender   = $request['gender'];
        $customer->address  = $request['address'];
        $customer->save();
        return $customer;
    }
    public function findById($id)
    {
        $customer = $this->model::find($id);

        // dd($customer);
        return $customer;
    }
    public function update($request, $id)
    {
        $customer = Customer::find($id)->update($request->only('name', 'email', 'phone', 'gender', 'address'));
        return $customer;
    }
    public function destroy($id)
    {
        $customer = Customer::find($id)->delete();
        return $customer;
    }
}
