<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VclassController;
use App\Http\Controllers\Admin\EventController;
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
});
// End Swapin