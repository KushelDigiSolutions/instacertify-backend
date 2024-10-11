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
                // Store the image in the specified directory
                $path = $image->store('ecommerce/products', 'public'); 
                // Extract the image name and add it to the array
                $images[] = basename($path); 
            }
            $product->images = json_encode($images); // Store as JSON
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

        // Handle image upload
        if ($request->hasFile('images')) {
            // Decode existing images
            $existingImages = json_decode($product->images, true) ?? [];
            
            // Handle the new images
            foreach ($request->file('images') as $image) {
                // Store the new image in the specified directory
                $path = $image->store('ecommerce/products', 'public'); 
                // Extract the image name and add it to the existing images array
                $existingImages[] = basename($path);
            }

            // Store the updated image list
            $product->images = json_encode($existingImages);
        }

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
        $images = json_decode($product->images, true);
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
