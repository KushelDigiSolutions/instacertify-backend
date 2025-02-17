<?php

use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\QcoController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\VclassController;
use App\Http\Controllers\Admin\LodgingRentalController;
use App\Http\Controllers\Admin\EquipmentRentalController;
use App\Http\Controllers\Admin\EventNewController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\NavigationController;
use App\Http\Controllers\Admin\EventCategoryController;
use App\Http\Controllers\Admin\QcoCategoryController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\VclassCategoryController;
use App\Http\Controllers\Admin\LodgingRentalCategoryController;
use App\Http\Controllers\Admin\LodgingRentalAminitiesController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\EquipmentRentalCategoryController;
use App\Http\Controllers\Admin\Ecommerce\{
    ProductController,
    CategoryController,
    OrderController,
    CustomerController,
    BrandController,
    ReportController
};


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


/**
 * Login
 */
Route::post('upload.php', [UploadController::class, 'uplodd'])->name('admin.upload');
Route::post('save.php/{id?}', [UploadController::class, 'savee'])->name('admin.save');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [LoginController::class, 'login'])->name('admin.login.submit');

Route::group(['middleware'=>'auth:admin','as'=>'admin.'],function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //User
    // Route::get('users-index',[UserController::class,'index'])->name('users.index');
    // Route::get('users-create',[UserController::class,'create'])->name('users.create');
    // Route::post('users-store',[UserController::class,'store'])->name('users.store');
    // // Route::get('user-show/{id}',[UserController::class,'show'])->name('users.show');
    // Route::get('users-edit/{id}',[UserController::class,'edit'])->name('users.edit');
    // Route::post('users-update',[UserController::class,'update'])->name('users.update');
    // Route::delete('user-delete/{id}',[UserController::class,'destroy'])->name('users.destroy');
    // Route::get('users-status/{id}/{stauts}',[UserController::class,'status'])->name('users.status');
    // Route::post('change-user-password/{id}',[UserController::class,'changePassword'])->name('change.user.password');
    Route::resource('users', UserController::class);
    Route::get('user-status/{id}/{stauts}',[UserController::class,'status'])->name('users.status');


    //Manage Event

        //Category
        Route::post('validate-event',[EventController::class,'checkProductName'])->name('event.check');
        Route::resource('event-categories',EventCategoryController::class);

        Route::post('validate-qco',[QcoController::class,'checkProductName'])->name('qco.check');
        Route::resource('qco-categories',QcoCategoryController::class);

        Route::resource('news-categories',NewsCategoryController::class);

        //Event
        Route::resource('events',EventController::class);
        Route::resource('qcos',QcoController::class);
        Route::resource('news',NewsController::class);
       // Route::resource('eventnew',EventNewController::class);
	
		 //Classes
        Route::resource('vclasses',VclassController::class);
		Route::resource('vclasses-categories',VclassCategoryController::class);
	
		 //Lodging
        Route::resource('lodging',LodgingRentalController::class);
		Route::resource('lodging-categories',LodgingRentalCategoryController::class);
		Route::resource('amenities',LodgingRentalAminitiesController::class);
		Route::resource('states',StateController::class);
		Route::resource('features',FeatureController::class);
	
		//Equipment
        Route::resource('equipment',EquipmentRentalController::class);
		Route::resource('equipment-categories',EquipmentRentalCategoryController::class);

        //Role
        Route::resource('roles', RoleController::class);
	

        //Staff
        Route::resource('staff', StaffController::class);
        Route::get('staff-status/{id}/{stauts}',[StaffController::class,'status'])->name('staff.status');
        //Content Management

        //Headers
        Route::resource('headers',HeaderController::class);
        Route::get('header-preview/{id}',[HeaderController::class,'preview'])->name('header.preview');

        //Footer
        Route::resource('footers',FooterController::class);
        Route::get('footer-preview/{id}',[FooterController::class,'preview'])->name('footer.preview');

        //Navigation
        Route::resource('navigations',NavigationController::class);
        //Route::get('footer-preview/{id}',[FooterController::class,'preview'])->name('footer.preview');

         //Pages

         Route::view('page-1','admin.content_management.page.page_one')->name('page.one');
         Route::view('page-2','admin.content_management.page.page_two')->name('page.two');
         Route::view('page-3','admin.content_management.page.page_three')->name('page.three');
         Route::view('page-4','admin.content_management.page.page_four')->name('page.four');
         Route::view('page-5','admin.content_management.page.page_five')->name('page.five');
         Route::view('page-6','admin.content_management.page.page_six')->name('page.six');	
         Route::view('setting','admin.content_management.page.setting')->name('page.setting');
         Route::view('cmscontent','admin.content_management.page.cms_content')->name('page.content');
         Route::view('cmsimage','admin.content_management.page.cms_image')->name('page.image');
         // Route::view('cmsimageUpload','admin.content_management.page.cms_imageupload')->name('page.imageupload');


          //Pages
        Route::resource('pages',PageController::class);
        Route::get('pages-edit/{id}',[PageController::class,'edit'])->name('page.edit');
        Route::get('pagerender/{id}', [PageController::class, 'pageBuild'])->name('pages.page-build');
        Route::get('pagebuilder',[PageController::class, 'pageBuilder'])->name('pages.pagebuilder');
        Route::post('pagebuilder',[PageController::class, 'pageBuilderSubmit'])->name('pages.pagebuilder.submit');
        Route::get('page-status/{id}/{stauts}',[PageController::class,'status'])->name('page.status');
        Route::get('page-home/{id}/{stauts}',[PageController::class,'statusHome'])->name('pages.status.home');
        Route::post('page-duplicate',[PageController::class, 'pageDuplicate'])->name('pages.page.duplicate');

        Route::post('logout/', [LoginController::class, 'logout'])->name('logout');

         // Products
        Route::resource('products', ProductController::class); // Using resource for standard REST routes

        // Categories
        Route::resource('categories', CategoryController::class); // Using resource for standard REST routes

        // Brands
        Route::resource('brands', BrandController::class); // Using resource for standard REST routes

        // Orders
        Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::post('orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

        // Reports
        Route::get('reports', [ReportController::class, 'index'])->name('reports.index');

});

// Added facades route by swapin
use Illuminate\Support\Facades\Route;
// End edit by swapin