<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products
        $products = Product::all();
        return view('admin.ecommerce.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.ecommerce.products.create');
    }

    public function store(Request $request)
    {
        // Validate and store the brand
        $request->validate([
            'name' => 'required|string|max:255',
            // Other validation rules
        ]);
        
        Product::create($request->all());
        return redirect()->route('admin.ecommerce.products.index');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.ecommerce.products.show', compact('brand'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.ecommerce.products.edit', compact('brand'));
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
        return redirect()->route('admin.ecommerce.products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.ecommerce.products.index');
    }
}
