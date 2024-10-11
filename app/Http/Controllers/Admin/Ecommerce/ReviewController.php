<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    /**
     * Display a listing of the reviews.
     */
    public function index()
    {
        // Fetch all reviews
        $reviews = Review::with(['product', 'user'])->get();
        return view('admin.ecommerce.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new review.
     */
    public function create()
    {
        $products = Product::all();  // Get all products for selection
        return view('admin.ecommerce.reviews.create', compact('products'));
    }

    /**
     * Store a newly created review in the database.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'user_id' => 'required|integer|exists:users,id',  // Assume you have a users table
            'rating' => 'required|integer|between:0,5',  // Rating must be between 0 and 5
            'detail' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',  // Image validation
        ]);

        // Check if the user has already reviewed the product
        $existingReview = Review::where('product_id', $request->product_id)
            ->where('user_id', $request->user_id)
            ->first();

        if ($existingReview) {
            return redirect()->back()->withErrors(['error' => 'You have already reviewed this product.']);
        }

        // Handle image upload
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('ecommerce/reviews', 'public');
                $images[] = $path;  // Save each image path in an array
            }
        }

        // Create the review
        Review::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'detail' => $request->detail,
            'images' => json_encode($images),  // Store images as JSON
        ]);

        return redirect()->route('admin.ecommerce.reviews.index')->with('success', 'Review created successfully.');
    }

    /**
     * Display the specified review.
     */
    public function show($id)
    {
        $review = Review::with(['product', 'user'])->findOrFail($id);
        return view('admin.ecommerce.reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified review.
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $products = Product::all();  // Get all products for selection
        return view('admin.ecommerce.reviews.edit', compact('review', 'products'));
    }

    /**
     * Update the specified review in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'rating' => 'required|integer|between:0,5',
            'detail' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $review = Review::findOrFail($id);

        // Handle image upload
        $images = json_decode($review->images, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('ecommerce/reviews', 'public');
                $images[] = $path;  // Append new images to the array
            }
        }

        // Update the review
        $review->update([
            'rating' => $request->rating,
            'detail' => $request->detail,
            'images' => json_encode($images),  // Update images JSON
        ]);

        return redirect()->route('admin.ecommerce.reviews.index')->with('success', 'Review updated successfully.');
    }

    /**
     * Remove the specified review from the database.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Delete the images from storage
        $images = json_decode($review->images, true);
        if ($images) {
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);  // Delete each image file
            }
        }

        // Delete the review
        $review->delete();

        return redirect()->route('admin.ecommerce.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
