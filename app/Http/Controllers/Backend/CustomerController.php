<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Routing\Controller;
use App\Services\CustomerService;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $customerServive;
    public function __construct(CustomerService $customerServive)
    {
        $this->customerServive = $customerServive;
    }
    public function index()
    {
        $customers  = $this->customerServive->getAll();
        $params     = [
            'customers'     => $customers,
        ];
        return view('Backend.Admin.Customers.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('Backend.Admin.Customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = $this->customerServive->create($request);
        return redirect()->route('customers.index')->with('success', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $params   = [
        'customer'        => $customer,
    ];
    return view('Backend.Admin.Customers.edit',$params);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request,$id)
    {
        $customer = $this->customerServive->update($request,$id);
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->customerServive->destroy($id);
        return redirect()->route('customers.index')->with('success','Xoá thành công !'); 
    }
}
