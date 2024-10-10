<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        // Fetch all brands
        $brands = Brand::all();
        return view('admin.ecommerce.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.ecommerce.brands.create');
    }

    public function store(Request $request)
    {
        // Validate and store the brand
        $request->validate([
            'name' => 'required|string|max:255',
            // Other validation rules
        ]);
        
        Brand::create($request->all());
        return redirect()->route('admin.ecommerce.brands.index');
    }

    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.ecommerce.brands.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.ecommerce.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the brand
        $request->validate([
            'name' => 'required|string|max:255',
            // Other validation rules
        ]);
        
        $brand = Brand::findOrFail($id);
        $brand->update($request->all());
        return redirect()->route('admin.ecommerce.brands.index');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('admin.ecommerce.brands.index');
    }
}
