<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\User\userController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Overview\overviewController;
use App\Http\Controllers\ProductServices\ProductsServicesController;
use App\Http\Controllers\Settings\settingsController;

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

Route::get('/show-csrf', [userController::class,'showToken']);
Route::get('/clear-cache', [userController::class,'clear_cache']);

Route::get('/', function () {
    return view('en.index');
});

// AUTH REQUESTS
Route::get('/login', [loginController::class, 'login_page'])->name('login');
Route::get('/register/business', [registerController::class, 'business_register_page'])->name('register_business');
Route::get('/register/reviewer', [registerController::class, 'reviewer_register_page'])->name('register_reviewer');

Route::post('/register_business', [registerController::class, 'create_business'])->name('create_business');
Route::post('/register/business', [registerController::class, 'create_business'])->name('register_business');
Route::post('/login_acct', [loginController::class, 'login']);


//EMAIL CONFIRMATION
Route::get('/email-confirmation/{id}', [registerController::class, 'email_confirmation'])->name('email_confirmation');





Route::get('/user/overview', [overviewController::class, 'overview_page'])->name('overview');


// SETTINGS
Route::get('/user/settings', [settingsController::class, 'settings_page'])->name('settings');
Route::post('/update_about_company', [settingsController::class, 'update_about_company']);
Route::post('/update_company_info', [settingsController::class, 'update_other_info']);
Route::post('/update_password', [userController::class, 'update_password']);


// CATEGORY
Route::post('/create_category', [CategoryController::class, 'create']);

// PRODUCTS & SERVICES
Route::get('/user/products', [ProductsServicesController::class, 'create_page'])->name('products');

Route::post('/create_product', [ProductsServicesController::class, 'create']);

