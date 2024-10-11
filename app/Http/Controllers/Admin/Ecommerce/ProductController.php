<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
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
        return view('admin.ecommerce.products.create');
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',  // Image validation
            'shipment_time' => 'required|integer',
            'sku_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'additional_tax' => 'nullable|numeric',
            'return_days' => 'required|integer',
            'status' => 'required|boolean',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        // Handle image upload
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('ecommerce/products', 'public');
                $images[] = $path;  // Save each image path in an array
            }
        }

        // Create the product
        Product::create([
            'product_name' => $request->product_name,
            'slug' => $request->slug,
            'images' => json_encode($images),  // Store images as JSON
            'shipment_time' => $request->shipment_time,
            'sku_name' => $request->sku_name,
            'quantity' => $request->quantity,
            'rating_count' => 0,  // Initialize rating count and number
            'rating_number' => 0,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'additional_tax' => $request->additional_tax,
            'return_days' => $request->return_days,
            'product_detail' => $request->product_detail,
            'product_specification' => $request->product_specification ? json_encode($request->product_specification) : null,
            'tags' => $request->tags ? json_encode($request->tags) : null,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.ecommerce.products.index')->with('success', 'Product created successfully');
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
        return view('admin.ecommerce.products.edit', compact('product'));
    }

    /**
     * Update the specified product in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'product_name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug,' . $id,
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',  // Image validation
            'shipment_time' => 'required|integer',
            'sku_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'additional_tax' => 'nullable|numeric',
            'return_days' => 'required|integer',
            'status' => 'required|boolean',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);

        // Handle image upload
        $images = json_decode($product->images, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('ecommerce/products', 'public');
                $images[] = $path;  // Append new images to the array
            }
        }

        // Update the product
        $product->update([
            'product_name' => $request->product_name,
            'slug' => $request->slug,
            'images' => json_encode($images),  // Update images JSON
            'shipment_time' => $request->shipment_time,
            'sku_name' => $request->sku_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'additional_tax' => $request->additional_tax,
            'return_days' => $request->return_days,
            'product_detail' => $request->product_detail,
            'product_specification' => $request->product_specification ? json_encode($request->product_specification) : $product->product_specification,
            'tags' => $request->tags ? json_encode($request->tags) : $product->tags,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.ecommerce.products.index')->with('success', 'Product updated successfully');
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

        return redirect()->route('admin.ecommerce.products.index')->with('success', 'Product deleted successfully');
    }
}
