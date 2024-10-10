<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Fetch all categories
        $categories = Category::all();
        return view('admin.ecommerce.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.ecommerce.categories.create');
    }

    public function store(Request $request)
    {
        // Validate and store the brand
        $request->validate([
            'name' => 'required|string|max:255',
            // Other validation rules
        ]);
        
        Category::create($request->all());
        return redirect()->route('admin.ecommerce.categories.index');
    }

    public function show($id)
    {
        $brand = Category::findOrFail($id);
        return view('admin.ecommerce.categories.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = Category::findOrFail($id);
        return view('admin.ecommerce.categories.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the brand
        $request->validate([
            'name' => 'required|string|max:255',
            // Other validation rules
        ]);
        
        $brand = Category::findOrFail($id);
        $brand->update($request->all());
        return redirect()->route('admin.ecommerce.categories.index');
    }

    public function destroy($id)
    {
        $brand = Category::findOrFail($id);
        $brand->delete();
        return redirect()->route('admin.ecommerce.categories.index');
    }
}
