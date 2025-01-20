<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\EventCategoryController;
use App\Http\Controllers\Api\NewsCategoryController;
use App\Http\Controllers\Api\VclassController;
use App\Http\Controllers\Api\LodgingRentalController;
use App\Http\Controllers\Api\EquipmentRentalController;
use App\Http\Controllers\Api\EcommerceApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/order', [OrderController::class, 'orderCreate']);
Route::middleware(['auth:api'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/profile-update', [LoginController::class, 'profileUpdate']);
    Route::get('/user-profile', [LoginController::class, 'userProfile']);
    Route::get('get-event-app',[EventController::class,'getEventApp']);
    Route::get('/qr-code', [OrderController::class, 'qrCode']);
	Route::post('/order/create', [EcommerceApiController::class, 'createOrder']);

	Route::post('/createaddress', [EcommerceApiController::class, 'createaddress']);       // Create an address
    Route::put('/updateaddress/{id}', [EcommerceApiController::class, 'updateaddress']);   // Update an address
    Route::delete('/deleteaddress/{id}', [EcommerceApiController::class, 'deleteaddress']); // Delete an address
    Route::get('/listalladdress', [EcommerceApiController::class, 'listalladdress']); 

	Route::get('/orders', [EcommerceApiController::class, 'listOrders']); // List all orders
		Route::get('/orders/{id}', [EcommerceApiController::class, 'getOrderDetails']); // Get order details by ID
		Route::post('/ecommerce/transactions', [EcommerceApiController::class, 'storeTransaction']);
	
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/reset-password', [LoginController::class, 'resetPassword']);
Route::post('/forgot-password', [LoginController::class, 'forgotPassword']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/registration', [RegisterController::class, 'register']);


Route::middleware(['cors'])->group(function () {
    Route::get('get-event-category',[EventCategoryController::class,'getEventCategory']);
	Route::get('get-event',[EventController::class,'getEvent']);
	Route::get('get-event-by-category/{slug}',[EventController::class,'getEventByCategory'])->name('event-category');
	Route::get('get-event-details/{slug}',[EventController::class,'getEventBySlug'])->name('event-details');

	Route::get('get-news-category',[NewsCategoryController::class,'getNewsCategory']);
	Route::get('get-news',[NewsController::class,'getNews']);
	Route::get('get-news-by-category/{slug}',[NewsController::class,'getNewsByCategory'])->name('news-category');
	Route::get('get-news-details/{slug}',[NewsController::class,'getNewsBySlug'])->name('news-details');
	
	Route::get('get-vclasses-category',[VclassController::class,'getVclassCategory']);
	
	Route::get('get-vclasses',[VclassController::class,'getVclass']);
	Route::get('get-vclasses/{slug}',[VclassController::class,'getVclass'])->name('vclass-category');
	Route::get('get-vclasses-by-category/{slug}',[VclassController::class,'getVclassByCategory'])->name('vclass-by-category');
	Route::get('get-vclasses-details/{slug}',[VclassController::class,'getVclassBySlug'])->name('vclass-details');
	
	Route::get('get-banners/{slug}',[VclassController::class,'getBanners'])->name('get-banners');
	
	Route::get('get-lodging-home',[LodgingRentalController::class,'getLodgingHome']);
	Route::get('search-lodging-home',[LodgingRentalController::class,'searchLodgingHome'])->name('search-lodging-home');
	Route::get('search-lodging-destination',[LodgingRentalController::class,'searchLodgingDestination'])->name('search-lodging-destination');
	Route::get('get-lodging-category',[LodgingRentalController::class,'getLodgingCategory']);
	Route::get('get-lodging-aminity',[LodgingRentalController::class,'getLodgingAminity']);
	Route::get('get-lodging',[LodgingRentalController::class,'getLodging']);
	Route::get('get-lodging/{slug}',[LodgingRentalController::class,'getLodging'])->name('lodging-category');
	Route::get('get-lodging-by-category/{slug}',[LodgingRentalController::class,'getLodgingByCategory'])->name('lodging-by-category');
	Route::get('get-lodging-details/{slug}',[LodgingRentalController::class,'getLodgingBySlug'])->name('lodging-details');
	Route::post('calculate-lodging',[LodgingRentalController::class,'calculateLodging']);
	Route::post('create-lodging-booking',[LodgingRentalController::class,'createLodgingBooking']);
	
	
	Route::get('get-equipment-home',[EquipmentRentalController::class,'getEquipmentHome']);
	Route::get('search-equipment',[EquipmentRentalController::class,'searchEquipment'])->name('search-equipment');
	Route::get('get-equipment-category',[EquipmentRentalController::class,'getEquipmentCategory']);
	Route::get('get-equipment',[EquipmentRentalController::class,'getEquipment']);
	Route::get('get-equipment/{slug}',[EquipmentRentalController::class,'getEquipment'])->name('equipment-category');
	Route::get('get-equipment-by-category/{slug}',[EquipmentRentalController::class,'getEquipment'])->name('equipment-by-category');
	Route::get('get-equipment-details/{slug}',[EquipmentRentalController::class,'getEquipmentBySlug'])->name('equipment-details');
	Route::get('check-equipment-availability',[EquipmentRentalController::class,'checkEquipmentAvailibility']);
	Route::post('update-equipment-booking',[EquipmentRentalController::class,'updateEquipmentBooking']);
	Route::post('calculate-equipment',[LodgingRentalController::class,'calculateLodging']);
	Route::post('create-equipment-booking',[LodgingRentalController::class,'createLodgingBooking']);

	Route::get('products', [EcommerceApiController::class, 'getAllProducts']);
	Route::get('products/category/{slug}', [EcommerceApiController::class, 'getAllProductsByCategorySlug']);
	Route::get('categories', [EcommerceApiController::class, 'getAllCategories']);
	Route::get('products/{slug}', [EcommerceApiController::class, 'getProductBySlug']);
	Route::post('ratings', [EcommerceApiController::class, 'createNewRating']);
	Route::put('ratings/{id}', [EcommerceApiController::class, 'updateRating']);
	Route::delete('ratings/{id}', [EcommerceApiController::class, 'deleteRating']);
	Route::get('/products/{id}/related', [EcommerceApiController::class, 'getRelatedProducts']);

	Route::post('/cart/add', [EcommerceApiController::class, 'productAddToCart']);
	Route::post('/cart/remove', [EcommerceApiController::class, 'productRemoveFromCart']);
	Route::get('/cart', [EcommerceApiController::class, 'getUserCart']);
	Route::post('/cart/clear', [EcommerceApiController::class, 'clearCart']);

});

Route::get('pages',[EventController::class,'getPageBySlug']);
Route::get('homepage',[EventController::class,'getPageHome']);
