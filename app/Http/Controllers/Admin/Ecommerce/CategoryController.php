<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
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
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name', // Ensure the name is unique in the brands table
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validate image
        ]);
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Create a unique image name
            $imagePath = public_path('ecommerce/categories'); // Define the image path
    
            $image->move($imagePath, $imageName); // Move the image to the desired directory
        }
    
        // Create slug from the brand name
        $slug = Str::slug($request->name); // Generate slug from the name
    
        // Ensure the slug is unique in the brands table
        $counter = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->name) . '-' . $counter; // Append counter if slug exists
            $counter++;
        }
    
        // Create the brand
        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'icon' => $imageName, // Store the image name in the database
        ]);
    
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.ecommerce.categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.ecommerce.categories.edit', compact('category'));
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
