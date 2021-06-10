<?php
use Illuminate\Support\Facades\Route;

// AUTH CONTROLLER
use App\Http\Controllers\AuthController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\AdminChildcategoriesController;
use App\Http\Controllers\Admin\AdminVendorsController;
use App\Http\Controllers\Admin\AdminStoresController;
use App\Http\Controllers\Admin\AdminAttributesController;
use App\Http\Controllers\Admin\AdminBrandsController;
use App\Http\Controllers\Admin\AdminVarientsController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminLocationsController;
use App\Http\Controllers\Admin\AdminFaqsController;
use App\Http\Controllers\Admin\AdminWorkersController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminInvoicesController;

use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminMenusController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminBlogController;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => []], function () {

    Route::get('/', [AuthController::class, 'loginView']);
    Route::post('/login', [AuthController::class, 'login']);
    // Route::get('/register', [AuthController::class, 'registerView']);
    // Route::post('/register', [AuthController::class, 'register']);

});
Route::get('/logout', [AuthController::class, 'logout']);



/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin/', 'middleware' => []],
    function () {

    // DASHBOARD
    Route::get('dashboard', [AdminDashboardController::class, 'index']);

    // MODULES
    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('faqs', AdminFaqsController::class);
    Route::resource('childcategories', AdminChildcategoriesController::class);
    Route::resource('vendors', AdminVendorsController::class);
    Route::resource('stores', AdminStoresController::class);
    Route::resource('attributes', AdminAttributesController::class);
    Route::resource('brands', AdminBrandsController::class);
    Route::resource('varients', AdminVarientsController::class);
    Route::resource('products', AdminProductsController::class);
    Route::resource('orders', AdminOrdersController::class);
    Route::resource('workers', AdminWorkersController::class);
    Route::resource('invoices', AdminInvoicesController::class);
    Route::resource('locations', AdminLocationsController::class);
    Route::resource('menus', AdminMenusController::class);
    Route::resource('blogs', AdminBlogController::class);

    });

    // SETTINGS
    Route::get('settings/edit', [AdminSettingsController::class, 'edit']);
    Route::post('settings/update', [AdminSettingsController::class, 'update']);

    // PROFILE
    Route::get('profile/edit', [AdminProfileController::class, 'edit']);
    Route::post('profile/update', [AdminProfileController::class, 'update']);


/*
|--------------------------------------------------------------------------
| AJAX ROUTES
|--------------------------------------------------------------------------
*/
Route::get('admin/ajax/services', [AdminAjaxRequestsController::class, 'servicesAjax']);
Route::get('admin/ajax/packages', [AdminAjaxRequestsController::class, 'packagesAjax']);
Route::post('admin/ajax/timeslots', [AdminAjaxRequestsController::class,'timeslotsAjax']);
