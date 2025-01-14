<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\Address;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
use Session;
use Carbon\Carbon;

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
        $all = $request->input('all', 0);
         // Get all categories
         $categories = Category::all(['id', 'name','slug']);
        $firstCategoryId = 1;  // Assuming the first category ID is always 1

        if($all){
            $products = Product::where('status', 'active')
                ->limit($limit)
                ->offset($offset)
                ->get(['id','product_name','slug', 'rating_count', 'rating_number', 'price', 'sale_price', 'images']);
        }else{
            $products = Product::where('category_id', $firstCategoryId)
                ->where('status', 'active')
                ->limit($limit)
                ->offset($offset)
                ->get(['id','product_name','slug', 'rating_count', 'rating_number', 'price', 'sale_price', 'images']);
        }
        // Format the product images and data
        $products = $products->map(function ($product) {
            return [
                'id' => $product->id,
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
            ->get(['id','product_name', 'slug','rating_count', 'rating_number', 'price', 'sale_price', 'images']);

        // Format the product images and data
        $products = $products->map(function ($product) {
            $images = $product->images;
            $imagePath = is_array($images) && !empty($images) ? $this->baseUrl . '/ecommerce/products/' . $images[0] : null;

            return [
                'id' =>  $product->id,
                'name' =>  Str::limit($product->product_name, 45, '...'),
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
        $categories = Category::all(['id', 'name','slug']);
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
            ->get(['id','product_name','slug', 'rating_count', 'rating_number', 'price', 'sale_price', 'images']);

        // Format the product images and data
        $products = $products->map(function ($product) {
            $images = $product->images;
            $imagePath = is_array($images) && !empty($images) ? $this->baseUrl . '/ecommerce/products/' . $images[0] : null;

            return [
                'id' => $product->id,
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
            ->get(['id','product_name','slug', 'rating_count', 'rating_number', 'price', 'sale_price', 'images']);

        // Format the product images and data
        $relatedProducts = $relatedProducts->map(function ($relatedProduct) {
            $images = $relatedProduct->images;
            $imagePath = is_array($images) && !empty($images) ? $this->baseUrl . '/ecommerce/products/' . $images[0] : null;

            return [
                'id' => $relatedProduct->id,
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
            $cartItems = CartItem::where('user_id', $userId)->count();
            return response()->json(['message' => 'Product added to cart', 'count' => $cartItems]);
        } else {
            // Store in session for non-logged-in users
            $cart = Session::get('cart', []);

            if (isset($cart[$productId])) {
                // Update quantity if already in cart
                $cart[$productId]['quantity'] += $quantity;
            } else {
                // Add new product to cart
                $product = Product::find($productId);
                if (!$product) {
                    return response()->json(['error' => 'Product not found'], 404);
                }

                $cart[$productId] = [
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => url('/ecommerce/products/' . ($product->images[0] ?? 'default.jpg'))
                ];
            }

            Session::put('cart', $cart);

            return response()->json(['message' => 'Product added to cart', 'count' => count($cart)]);
        }
    }


    /**
     * Remove product from cart.
     */
    public function productRemoveFromCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantityToRemove = $request->input('quantity', 1); // Default to removing 1 if not specified

        if (Auth::check()) {
            // User is logged in, remove from database
            $userId = Auth::id();
            $cartItem = CartItem::where('user_id', $userId)->where('product_id', $productId)->first();

            if ($cartItem) {
                // Reduce the quantity
                $cartItem->quantity -= $quantityToRemove;
                
                // If quantity is zero or less, remove the item
                if ($cartItem->quantity <= 0) {
                    $cartItem->delete();
                } else {
                    $cartItem->save();
                }
            }
            $cartItems = CartItem::where('user_id', $userId)->count();
            return response()->json(['message' => 'Product quantity updated','count'=> $cartItems]);
        } else {
            // Remove from session for non-logged-in users
            $cart = Session::get('cart', []);

            if (isset($cart[$productId])) {
                // Reduce the quantity
                $cart[$productId]['quantity'] -= $quantityToRemove;

                // If quantity is zero or less, remove the item
                if ($cart[$productId]['quantity'] <= 0) {
                    unset($cart[$productId]);
                }

                Session::put('cart', $cart);
            }

            return response()->json(['message' => 'Product quantity updated', 'count' => count($cart)]);
        }
    }


    /**
     * Get the user's cart.
     */
    public function getUserCart()
{
    $totalAmount = 0;
    $shippingCost = 10; // Example flat shipping cost, adjust as needed
    $cart = [];

    if (Auth::check()) {
        // User is logged in, fetch from the database
        $userId = Auth::id();
        $cartItems = CartItem::where('user_id', $userId)->with('product')->get();

        $cart = $cartItems->map(function ($cartItem) use (&$totalAmount) {
            $itemTotal = $cartItem->product->price * $cartItem->quantity;
            $totalAmount += $itemTotal;
            return [
                'product_id' => $cartItem->product_id,
                'name' => $cartItem->product->product_name,
                'price' => $cartItem->product->price,
                'quantity' => $cartItem->quantity,
                'image' => $this->baseUrl . '/ecommerce/products/' . $cartItem->product->images[0],
                'total' => $itemTotal
            ];
        })->toArray();

    } else {
        // Fetch from session for non-logged-in users
        $sessionCart = Session::get('cart', []);
        
        foreach ($sessionCart as $productId => $details) {
            // Assuming details contain product name, price, quantity, and image URL
            $itemTotal = $details['price'] * $details['quantity'];
            $totalAmount += $itemTotal;
            $cart[] = [
                'product_id' => $productId,
                'name' => $details['name'],
                'price' => $details['price'],
                'quantity' => $details['quantity'],
                'image' => $details['image'],
                'total' => $itemTotal
            ];
        }
    }

    // Calculate grand total
    $grandTotal = $totalAmount + ($totalAmount > 0 ? $shippingCost : 0);

    return response()->json([
        'cart' => $cart,
        'total_amount' => number_format($totalAmount, 2),
        'shipping_cost' => number_format($shippingCost, 2),
        'grand_total' => number_format($grandTotal, 2),
    ]);
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

    public function createOrder(Request $request)
    {
       
        // Validate the incoming request
        $validated = $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'required|integer|exists:products,id',
            'products.*.qty' => 'required|integer|min:1',
            'address_id' => 'required|integer'
        ]);
        
        $userId = auth()->id(); // Get authenticated user ID
        // Check if the address belongs to the authenticated user
        $addressId = $validated['address_id'];
      
        $address = Address::where('id', $addressId)
            ->where('user_id', $userId)
            ->first();

        if (!$address) {
            return response()->json([
                'error' => 'The selected address does not belong to the authenticated user.'
            ], 403); // HTTP 403 Forbidden
        }
        
        // Check if an order was created within the last 15 minutes
        $fifteenMinutesAgo = Carbon::now()->subMinutes(15);
        $existingOrder = Order::where('user_id', $userId)
            ->where('address_id', $addressId)
            ->where('created_at', '>=', $fifteenMinutesAgo)
            ->first();
    
        if ($existingOrder) {
            return response()->json([
                'error' => 'Order already exists within the last 15 minutes.',
                'order_id' => $existingOrder->id
            ], 409); // HTTP 409 Conflict
        }
    
        // Initialize variables for calculations
        $grandTotalPrice = 0;
        $grandTotalTax = 0;
        $grandSalePrice = 0;
        $grandSaleTax = 0;
    
        // Create a new order
        $order = Order::create([
            'user_id' => $userId,
            'total_price' => 0, // Will be updated later
            'total_tax' => 0,   // Will be updated later
            'sale_price' => 0,  // Will be updated later
            'sale_tax' => 0,    // Will be updated later
            'order_amount' => 0,
            'order_status' => 0, // Created status
            'address_id' => $addressId
        ]);
    
        $responseProducts = [];
    
        foreach ($validated['products'] as $productData) {
            $product = Product::find($productData['id']);
            
            // Calculate prices and taxes
            $totalPrice = $product->price * $productData['qty'];
            $totalPriceTax = $totalPrice * ($product->additional_tax / 100);
            
            $totalSalePrice = ($product->sale_price ?? $product->price) * $productData['qty'];
            $salePriceTax = $totalSalePrice * ($product->additional_tax / 100);
    
            // Update grand totals
            $grandTotalPrice += $totalPrice;
            $grandTotalTax += $totalPriceTax;
            $grandSalePrice += $totalSalePrice;
            $grandSaleTax += $salePriceTax;
    
            // Create an order item
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'qty' => $productData['qty'],
                'tax' => $product->additional_tax,
                'total_price' => $totalPrice,
                'sale_price' => ($product->sale_price ?? $product->price),
                'delivery_status' => 1 // Default to delivered (adjust as per your logic)
            ]);
    
            // Add product details to response array
            $responseProducts[] = [
                "id" => $product->id,
                "qty" => $productData['qty'],
                "price" => (float)$product->price,
                "sale_price" => (float)($product->sale_price ?? $product->price),
                "tax_per" => (float)$product->additional_tax,
                "total_price" => (float)$totalPrice,
                "total_price_tax" => (float)$totalPriceTax,
                "total_sale_price" => (float)$totalSalePrice,
                "sale_price_tax" => (float)$salePriceTax
            ];
        }
    
        // Update order totals
        $orderAmount = $grandTotalPrice + $grandTotalTax + ($grandSalePrice + $grandSaleTax);
        $order->update([
            'total_price' => (float)$grandTotalPrice,
            'total_tax' => (float)$grandTotalTax,
            'sale_price' => (float)$grandSalePrice,
            'sale_tax' => (float)$grandSaleTax,
            'order_amount' => (float)$orderAmount
        ]);
    
        // Return the response as JSON
        return response()->json([
            "products" => $responseProducts,
            "grand_total_price" => (float)$grandTotalPrice,
            "grand_total_tax" => (float)$grandTotalTax,
            "grand_sale_price" => (float)$grandSalePrice,
            "grand_sale_tax" => (float)$grandSaleTax,
            "order_amount" => (float)$orderAmount,
            "order_id" => $order->id
        ]);
    }
}
