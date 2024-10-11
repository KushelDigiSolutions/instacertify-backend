<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;


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
    // Validate the incoming request
    $request->validate([
        'name' => 'required|string|max:255|unique:brands,name', // Ensure the name is unique in the brands table
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validate image
    ]);

    // Handle the image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension(); // Create a unique image name
        $imagePath = public_path('ecommerce/brands'); // Define the image path

        $image->move($imagePath, $imageName); // Move the image to the desired directory
    }

    // Create slug from the brand name
    $slug = Str::slug($request->name); // Generate slug from the name

    // Ensure the slug is unique in the brands table
    $counter = 1;
    while (Brand::where('slug', $slug)->exists()) {
        $slug = Str::slug($request->name) . '-' . $counter; // Append counter if slug exists
        $counter++;
    }

    // Create the brand
    Brand::create([
        'name' => $request->name,
        'slug' => $slug,
        'icon' => $imageName, // Store the image name in the database
    ]);

    return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
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
            'slug' => 'required|string|max:255|unique:brands,slug,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validate image
            // Other validation rules can be added here
        ]);
    
        $brand = Brand::findOrFail($id);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($brand->icon) {
                $oldImagePath = public_path('ecommerce/brands/' . $brand->icon);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
    
            // Store the new image
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName(); // Unique name
            $request->file('image')->move(public_path('ecommerce/brands'), $imageName); // Move to the destination
            $brand->icon = $imageName; // Update the icon field with the new image name
        } elseif ($request->input('image_remove')) {
            // If the remove checkbox is checked, delete the existing image
            if ($brand->icon) {
                $oldImagePath = public_path('ecommerce/brands/' . $brand->icon);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
                $brand->icon = null; // Set icon to null
            }
        }
    
        // Update the brand details
        $brand->name = $request->input('name');
        $brand->slug = $request->input('slug');
        $brand->is_active = $request->input('is_active', 0); // Default to inactive if not provided
        $brand->save(); // Save the brand
    
        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
    }
    
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('admin.brands.index');
    }
}
