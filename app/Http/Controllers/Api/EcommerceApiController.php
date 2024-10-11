<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class EcommerceApiController extends Controller
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('app.url');  // Fetch APP_URL from .env
    }

    /**
     * Get all products of the first category with pagination.
     */
    public function getAllProducts(Request $request)
    {
        $limit = $request->input('limit', 20);
        $offset = $request->input('offset', 0);
        $firstCategoryId = 1;  // Assuming the first category ID is always 1

        $products = Product::where('category_id', $firstCategoryId)
            ->where('status', 'active')
            ->limit($limit)
            ->offset($offset)
            ->get(['name', 'rating_count', 'rating_number', 'price', 'sale_price', 'images']);

        // Format the product images and data
        $products = $products->map(function ($product) {
            return [
                'name' => $product->name,
                'rating_count' => $product->rating_count,
                'rating_number' => $product->rating_number,
                'price' => $product->price,
                'sale_price' => $product->sale_price,
                'image' => $this->baseUrl . '/ecommerce/products/' . json_decode($product->images)[0],
            ];
        });

        // Get all categories
        $categories = Category::all(['id', 'name']);

        return response()->json([
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Get all categories.
     */
    public function getAllCategories()
    {
        $categories = Category::all(['id', 'name']);
        return response()->json($categories);
    }

    /**
     * Get product details by slug.
     */
    public function getProductBySlug($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // Format the images
        $product->images = array_map(function ($image) {
            return $this->baseUrl . '/ecommerce/products/' . $image;
        }, json_decode($product->images));

        // Get the reviews for the product
        $reviews = Review::where('product_id', $product->id)->with('user')->get();
        $reviews->each(function ($review) {
            $review->images = array_map(function ($image) {
                return $this->baseUrl . '/ecommerce/reviews/' . $image;
            }, json_decode($review->images));
        });

        return response()->json([
            'product' => $product,
            'reviews' => $reviews,
        ]);
    }

    /**
     * Create a new rating for a product.
     */
    public function createNewRating(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'user_id' => 'required|integer|exists:users,id',
            'rating' => 'required|integer|between:0,5',
        ]);

        // Check if the user has purchased this product
        $hasPurchased = OrderItem::where('user_id', $request->user_id)
            ->where('product_id', $request->product_id)
            ->exists();

        if (!$hasPurchased) {
            return response()->json(['error' => 'User has not purchased this product.'], 403);
        }

        // Check if the user has already rated this product
        $existingReview = Review::where('product_id', $request->product_id)
            ->where('user_id', $request->user_id)
            ->first();

        if ($existingReview) {
            return response()->json(['error' => 'You can only rate a product once.'], 403);
        }

        // Create the review
        $review = Review::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'detail' => $request->input('detail', ''),
            'images' => json_encode($request->input('images', [])),
        ]);

        return response()->json($review, 201);
    }

    /**
     * Update a rating for a product.
     */
    public function updateRating(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|between:0,5',
            'detail' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $review = Review::findOrFail($id);

        // Ensure the review belongs to the user
        if ($review->user_id !== $request->user_id) {
            return response()->json(['error' => 'Unauthorized action.'], 403);
        }

        // Update the review details
        $review->rating = $request->rating;
        $review->detail = $request->input('detail', $review->detail);
        
        // Handle image upload
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $path = $file->store('ecommerce/reviews', 'public');
                $images[] = $path;
            }
            $review->images = json_encode($images);
        }

        $review->save();

        return response()->json($review);
    }

    /**
     * Delete a rating.
     */
    public function deleteRating($id)
    {
        $review = Review::findOrFail($id);

        // Ensure the review belongs to the user
        if ($review->user_id !== request()->user_id) {
            return response()->json(['error' => 'Unauthorized action.'], 403);
        }

        $review->delete();

        return response()->json(['message' => 'Rating deleted successfully.']);
    }
}
