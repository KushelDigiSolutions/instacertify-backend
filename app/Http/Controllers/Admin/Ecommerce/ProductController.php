<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        // Fetch all products
        $products = Product::all();
        return view('admin.ecommerce.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Category::all(); // Fetch categories from the database
        return view('admin.ecommerce.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'product_name' => 'required|string|max:255',
        'slug' => 'required|string|unique:products,slug|max:255',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'shipment_time' => 'nullable|integer|min:1',
        'sku_name' => 'required|string|max:255',
        'quantity' => 'nullable|integer|min:0',
        'price' => 'required|numeric',
        'sale_price' => 'nullable|numeric',
        'additional_tax' => 'nullable|numeric',
        'return_days' => 'nullable|integer|min:0',
        'product_detail' => 'nullable|string',
        'product_specification' => 'nullable|string',
        'tags' => 'nullable|string',
        'status' => 'required|in:active,inactive',
    ]);

    // Create the product
    $product = new Product();
    $product->category_id = $request->category_id;
    $product->product_name = $request->product_name;
    $product->slug = Str::slug($request->slug); // Ensure slug is formatted
    $product->shipment_time = $request->shipment_time;
    $product->sku_name = $request->sku_name;
    $product->quantity = $request->quantity;
    $product->price = $request->price;
    $product->sale_price = $request->sale_price;
    $product->additional_tax = $request->additional_tax;
    $product->return_days = $request->return_days;
    $product->product_detail = $request->product_detail;
    $product->product_specification = $request->product_specification;
    $product->tags = $request->tags;
    $product->status = $request->status;

    // Handle image upload
    if ($request->hasFile('images')) {
        $images = [];
        foreach ($request->file('images') as $image) {
            // Create a unique name for the image
            $imageName = time() . '-' . $image->getClientOriginalName();
            // Move the image to the public path 'ecommerce/products'
            $image->move(public_path('ecommerce/products'), $imageName);
            // Add the image name to the array
            $images[] = $imageName;
        }
        // Store the image names as an array in the database
        $product->images = $images;
    }

    $product->save(); // Save the product

    return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
}



    /**
     * Display the specified product.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.ecommerce.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Fetch categories from the database
        return view('admin.ecommerce.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified product in the database.
     */
    public function update(Request $request, $id)
{
    // Validate the incoming request
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'product_name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:products,slug,' . $id,
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'shipment_time' => 'nullable|integer|min:1',
        'sku_name' => 'required|string|max:255',
        'quantity' => 'nullable|integer|min:0',
        'price' => 'required|numeric',
        'sale_price' => 'nullable|numeric',
        'additional_tax' => 'nullable|numeric',
        'return_days' => 'nullable|integer|min:0',
        'product_detail' => 'nullable|string',
        'product_specification' => 'nullable|string',
        'tags' => 'nullable|string',
        'status' => 'required|in:active,inactive',
    ]);

    // Find the product by ID
    $product = Product::findOrFail($id);
    $product->category_id = $request->category_id;
    $product->product_name = $request->product_name;
    $product->slug = Str::slug($request->slug); // Ensure slug is formatted
    $product->shipment_time = $request->shipment_time;
    $product->sku_name = $request->sku_name;
    $product->quantity = $request->quantity;
    $product->price = $request->price;
    $product->sale_price = $request->sale_price;
    $product->additional_tax = $request->additional_tax;
    $product->return_days = $request->return_days;
    $product->product_detail = $request->product_detail;
    $product->product_specification = $request->product_specification;
    $product->tags = $request->tags;
    $product->status = $request->status;

    $imagesArr = $request->img;

    // Handle image upload
    if ($request->hasFile('images')) {
        // Retrieve existing images
        $existingImages = $product->images ?? [];

        // Upload new images and merge with existing ones
        foreach ($request->file('images') as $image) {
            // Create a unique name for the image
            $imageName = time() . '-' . $image->getClientOriginalName();
            // Move the image to the public path 'ecommerce/products'
            $image->move(public_path('ecommerce/products'), $imageName);
            // Add the image name to the existing array
            $existingImages[] = $imagesArr[] = $imageName;
        }
        // Update the product's images with the newly uploaded and existing ones
        $product->images = $existingImages;
    }
    $product->images = $imagesArr;
   
    $product->save(); // Save the updated product

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
}




    /**
     * Remove the specified product from the database.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the images from the storage
        $images = $product->images;
        if ($images) {
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);  // Delete each image file
            }
        }

        // Delete the product
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}
