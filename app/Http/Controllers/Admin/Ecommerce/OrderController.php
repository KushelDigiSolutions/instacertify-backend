<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'address', 'orderItems.product'])
        ->orderBy('id',"DESC")
        // ->latest('id') 
        ->get();
    
        return view('admin.ecommerce.orders.index', compact('orders'));
    }
    


    public function create()
    {
        return view('admin.ecommerce.orders.create');
    }

    public function store(Request $request)
    {
        // Validate and store the brand
        $request->validate([
            'name' => 'required|string|max:255',
            // Other validation rules
        ]);
        
        Product::create($request->all())
        ->orderBy('id', 'desc');
        return redirect()->route('admin.ecommerce.orders.index');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.ecommerce.orders.show', compact('brand'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.ecommerce.orders.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the brand
        $request->validate([
            'name' => 'required|string|max:255',
            // Other validation rules
        ]);
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('admin.ecommerce.orders.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.ecommerce.orders.index');
    }
}
