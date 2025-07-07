<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; // Ensure you import the Customer model
use App\Providers\CustomerService;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function create(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:customers,email',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $customer=$this->customerService->createCustomer($validation);


        return response()->json([
            'message' => 'Customer created successfully',
            'customer' => $customer
        ], 201);
    }
    public function delete(Request $request, $id)
    {
        $customer = \App\Models\Customer::findOrFail($id);
        $customer->delete();

        return response()->json([
            'message' => 'Customer deleted successfully'
        ], 200);
    }

    public function showall()
    {
        $customers = $this->customerService->getAllCustomers();
        return response()->json($customers, 200);
    }
}
