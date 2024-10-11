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

     // Store a newly created category
     public function store(Request $request)
     {
         // Validate the incoming request data
         $request->validate([
             'name' => 'required|string|max:255|unique:categories,name',
             'slug' => 'required|string|max:255|unique:categories,slug',
             'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
             'is_active' => 'required|boolean',
         ]);
 
         // Create the category
         $category = new Category();
         $category->name = $request->name;
         $category->slug = Str::slug($request->slug);
         $category->is_active = $request->is_active;
 
         // Handle image upload
         if ($request->hasFile('image')) {
             $category->icon = $request->file('image')->store('ecommerce/categories', 'public');
         }
 
         $category->save();
 
         return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
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

    // Update the specified category
    public function update(Request $request, Category $category)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'is_active' => 'required|boolean',
        ]);

        // Update the category
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->is_active = $request->is_active;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($category->icon) {
                Storage::disk('public')->delete($category->icon);
            }
            $category->icon = $request->file('image')->store('ecommerce/categories', 'public');
        }

        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $brand = Category::findOrFail($id);
        $brand->delete();
        return redirect()->route('admin.categories.index');
    }
}
