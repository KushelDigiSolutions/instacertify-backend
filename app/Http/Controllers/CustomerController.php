<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'group' => 'nullable',
            'phone' => 'required',
            'gender' => 'nullable|in:Male,Female,Other',
            'status' => 'required|boolean',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')
                         ->with('success', 'Customer created successfully.');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'group' => 'nullable',
            'phone' => 'nullable',
            'gender' => 'nullable|in:Male,Female,Other',
            'status' => 'required|boolean',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')
                         ->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
                         ->with('success', 'Customer deleted successfully.');
    }
    
    // public function export()
    // {
    //     return Excel::download(new CustomersExport, 'customers.xlsx');
    // }

}
