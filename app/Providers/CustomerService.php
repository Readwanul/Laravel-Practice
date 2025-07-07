<?php

namespace App\Providers;


use App\Models\Customer;

class CustomerService 
{

    public function createCustomer($data)
    {
        return Customer::create($data);
    }
    public function deleteCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return $customer;
    }
    public function getAllCustomers()
    {
        return Customer::all();
    }

}
