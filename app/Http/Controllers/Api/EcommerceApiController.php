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
         // Get all categories
         $categories = Category::all(['id', 'name','slug']);
        $firstCategoryId = 1;  // Assuming the first category ID is always 1

        $products = Product::where('category_id', $firstCategoryId)
            ->where('status', 'active')
            ->limit($limit)
            ->offset($offset)
            ->get(['product_name','slug', 'rating_count', 'rating_number', 'price', 'sale_price', 'images']);

        // Format the product images and data
        $products = $products->map(function ($product) {
            return [
                'name' => $product->product_name,
                'slug' => $product->slug,
                'rating_count' => $product->rating_count,
                'rating_number' => $product->rating_number,
                'price' => $product->price,
                'sale_price' => $product->sale_price,
                'image' => $this->baseUrl . '/ecommerce/products/' . $product->images[0],
            ];
        });

       

        return response()->json([
            'products' => $products,
            'categories' => $categories,
        ]);
    }

     /**
     * Get all products by category slug with pagination.
     */
    public function getAllProductsByCategorySlug(Request $request, $slug)
    {
        $limit = $request->input('limit', 20);
        $offset = $request->input('offset', 0);

        // Find the category by slug
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Retrieve products for the found category
        $products = Product::where('category_id', $category->id)
            ->where('status', 'active')
            ->limit($limit)
            ->offset($offset)
            ->get(['product_name', 'slug','rating_count', 'rating_number', 'price', 'sale_price', 'images']);

        // Format the product images and data
        $products = $products->map(function ($product) {
            $images = $product->images;
            $imagePath = is_array($images) && !empty($images) ? $this->baseUrl . '/ecommerce/products/' . $images[0] : null;

            return [
                'name' => $product->product_name,
                'slug' => $product->slug,
                'rating_count' => $product->rating_count,
                'rating_number' => $product->rating_number,
                'price' => $product->price,
                'sale_price' => $product->sale_price,
                'image' => $imagePath,
            ];
        });

        return response()->json(['products' => $products]);
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
        }, $product->images);

        // Get the reviews for the product
        $reviews = Review::where('product_id', $product->id)->with('user')->get();
        $reviews->each(function ($review) {
            $review->images = array_map(function ($image) {
                return $this->baseUrl . '/ecommerce/reviews/' . $image;
            }, $review->images);
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

     /**
     * Search products by name, slug, or category.
     */
    public function searchProducts(Request $request)
    {
        $query = $request->input('query', '');
        $limit = $request->input('limit', 20);
        $offset = $request->input('offset', 0);

        // Fetch products based on the search query
        $products = Product::where('status', 'active')
            ->where(function ($q) use ($query) {
                $q->where('product_name', 'LIKE', "%{$query}%")
                  ->orWhere('slug', 'LIKE', "%{$query}%")
                  ->orWhereHas('category', function ($queryBuilder) use ($query) {
                      $queryBuilder->where('product_name', 'LIKE', "%{$query}%");
                  });
            })
            ->limit($limit)
            ->offset($offset)
            ->get(['product_name','slug', 'rating_count', 'rating_number', 'price', 'sale_price', 'images']);

        // Format the product images and data
        $products = $products->map(function ($product) {
            $images = $product->images;
            $imagePath = is_array($images) && !empty($images) ? $this->baseUrl . '/ecommerce/products/' . $images[0] : null;

            return [
                'name' => $product->product_name,
                'slug' => $product->slug,
                'rating_count' => $product->rating_count,
                'rating_number' => $product->rating_number,
                'price' => $product->price,
                'sale_price' => $product->sale_price,
                'image' => $imagePath,
            ];
        });

        return response()->json(['products' => $products]);
    }

    /**
     * Get related products based on tags, name similarity, or category.
     */
    public function getRelatedProducts($productId)
    {
        $product = Product::find($productId);
        
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Find related products using tags, category, or name similarity
        $relatedProducts = Product::where('id', '!=', $productId)
            ->where('status', 'active')
            ->where(function ($query) use ($product) {
                $query->where('category_id', $product->category_id)
                      ->orWhere('tags', 'LIKE', "%{$product->tags}%")
                      ->orWhere('product_name', 'LIKE', "%{$product->name}%");
            })
            ->limit(5) // Limit to 5 related products
            ->get(['product_name','slug', 'rating_count', 'rating_number', 'price', 'sale_price', 'images']);

        // Format the product images and data
        $relatedProducts = $relatedProducts->map(function ($relatedProduct) {
            $images = $relatedProduct->images;
            $imagePath = is_array($images) && !empty($images) ? $this->baseUrl . '/ecommerce/products/' . $images[0] : null;

            return [
                'name' => $relatedProduct->product_name,
                'slug' => $relatedProduct->slug,
                'rating_count' => $relatedProduct->rating_count,
                'rating_number' => $relatedProduct->rating_number,
                'price' => $relatedProduct->price,
                'sale_price' => $relatedProduct->sale_price,
                'image' => $imagePath,
            ];
        });

        return response()->json(['related_products' => $relatedProducts]);
    }

     /**
     * Add product to cart.
     */
    public function productAddToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        if (Auth::check()) {
            // User is logged in, store in the database
            $userId = Auth::id();

            // Check if the product already exists in the cart
            $cartItem = CartItem::where('user_id', $userId)->where('product_id', $productId)->first();

            if ($cartItem) {
                // Update quantity if already in cart
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                // Add new cart item
                CartItem::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ]);
            }

            return response()->json(['message' => 'Product added to cart']);
        } else {
            // Store in session for non-logged-in users
            $cart = Session::get('cart', []);
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $quantity;
            } else {
                $product = Product::find($productId);
                if (!$product) {
                    return response()->json(['error' => 'Product not found'], 404);
                }
                $cart[$productId] = [
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $this->baseUrl . '/ecommerce/products/' . json_decode($product->images)[0]
                ];
            }
            Session::put('cart', $cart);

            return response()->json(['message' => 'Product added to cart']);
        }
    }

    /**
     * Remove product from cart.
     */
    public function productRemoveFromCart(Request $request)
    {
        $productId = $request->input('product_id');

        if (Auth::check()) {
            // User is logged in, remove from database
            $userId = Auth::id();
            CartItem::where('user_id', $userId)->where('product_id', $productId)->delete();

            return response()->json(['message' => 'Product removed from cart']);
        } else {
            // Remove from session for non-logged-in users
            $cart = Session::get('cart', []);
            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                Session::put('cart', $cart);
            }

            return response()->json(['message' => 'Product removed from cart']);
        }
    }

    /**
     * Get the user's cart.
     */
    public function getUserCart()
    {
        if (Auth::check()) {
            // User is logged in, fetch from the database
            $userId = Auth::id();
            $cartItems = CartItem::where('user_id', $userId)->with('product')->get();

            $cart = $cartItems->map(function ($cartItem) {
                return [
                    'product_id' => $cartItem->product_id,
                    'name' => $cartItem->product->name,
                    'price' => $cartItem->product->price,
                    'quantity' => $cartItem->quantity,
                    'image' => $this->baseUrl . '/ecommerce/products/' . json_decode($cartItem->product->images)[0]
                ];
            });

            return response()->json(['cart' => $cart]);
        } else {
            // Fetch from session for non-logged-in users
            $cart = Session::get('cart', []);

            return response()->json(['cart' => $cart]);
        }
    }

    /**
     * Clear the user's cart.
     */
    public function clearCart()
    {
        if (Auth::check()) {
            // Clear the cart for logged-in users in the database
            $userId = Auth::id();
            CartItem::where('user_id', $userId)->delete();

            return response()->json(['message' => 'Cart cleared']);
        } else {
            // Clear the session for non-logged-in users
            Session::forget('cart');

            return response()->json(['message' => 'Cart cleared']);
        }
    }
}
