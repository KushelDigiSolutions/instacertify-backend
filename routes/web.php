<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\VclassController;
use Webkul\Shop\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\LodgingRentalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return redirect()->route('admin.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Swapin
Route::middleware(['cors'])->group(function () {
Route::post('/admin/vclass/toggle-active/{id}', [VclassController::class, 'toggleActive'])->name('admin.vclass.toggleActive');
Route::get('/duplicate-vclass/{id}', [VclassController::class, 'duplicateVclass'])->name('duplicateVclass');
Route::get('/admin/vclass/makeDel/{id}', [VclassController::class, 'makeDel'])->name('admin.vclass.makeDel');

Route::post('/admin/event/toggle-active/{id}', [EventController::class, 'toggleActive'])->name('admin.event.toggleActive');
Route::post('/admin/lodging/toggle-active/{id}', [LodgingRentalController::class, 'toggleActive'])->name('admin.lodging.toggleActive');
//Route::get('/duplicate-event/{id}', [EventController::class, 'duplicateEvent'])->name('duplicateEvent');
Route::get('/admin/event/makeDel/{id}', [EventController::class, 'makeDel'])->name('admin.event.makeDel');

Route::resource('/admin/customers', CustomerController::class);

/* Route::controller(ProductController::class)->group(function(){
    Route::get('/admin/products','index')->name('products.index');
    Route::get('/products/create','create')->name('products.create');
    Route::post('/products','store')->name('products.store');
    Route::get('/products/{product}/edit','edit')->name('products.edit');
    Route::put('/products/{product}','update')->name('products.update');
    Route::delete('admin/products/{product}','destroy')->name('products.destroy');    
}); */
});
/* Route::resource('/admin/categories', CategoryController::class); */
// End Swapin
// Route::resource('/admin/customers', CustomerController::class);

// Route::controller(ProductController::class)->group(function(){
//     Route::get('/admin/products','index')->name('products.index');
//     Route::get('/products/create','create')->name('products.create');
//     Route::post('/products','store')->name('products.store');
//     Route::get('/products/{product}/edit','edit')->name('products.edit');
//     Route::put('/products/{product}','update')->name('products.update');
//     Route::delete('admin/products/{product}','destroy')->name('products.destroy');    
// });

Route::get('reviews', [CustomerController::class, 'reviews'])->defaults('_config', [
    'view' => 'shop::customers.account.reviews.index',
])->name('customer.reviews.index');

Route::delete('reviews/delete/{id}', [ReviewController::class, 'destroy'])->defaults('_config', [
    'redirect' => 'customer.reviews.index',
])->name('customer.review.delete');

Route::delete('reviews/all-delete', [ReviewController::class, 'deleteAll'])->defaults('_config', [
    'redirect' => 'customer.reviews.index',
])->name('customer.review.deleteall');

