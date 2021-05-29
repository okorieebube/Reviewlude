<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\User\userController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Overview\overviewController;
use App\Http\Controllers\Settings\settingsController;
use App\Http\Controllers\ProductServices\ProductsServicesController;
use App\Http\Controllers\searchController;

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
Route::get('/user/test', function () {
    return view('user.test');
});

// AUTH REQUESTS
Route::get('/login', [loginController::class, 'login_page'])->name('login');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
Route::get('/register/business', [registerController::class, 'business_register_page'])->name('register_business');
Route::get('/register/reviewer', [registerController::class, 'reviewer_register_page'])->name('register_reviewer');
Route::get('/user/register', [registerController::class, 'admin_register_page'])->name('register_admin');

Route::post('/register_business', [registerController::class, 'create_business']);
Route::post('/register/business', [registerController::class, 'create_business']);
Route::post('/register_reviewer', [registerController::class, 'create_reviewer'])->name('create_reviewer');
Route::post('/register_admin', [registerController::class, 'create_admin'])->name('create_admin');
Route::post('/login_acct', [loginController::class, 'login']);
Route::post('/admin/block/{id}', [userController::class, 'block']);
Route::post('/admin/unblock/{id}', [userController::class, 'unblock']);
Route::post('/user/confirm/{id}', [registerController::class, 'admin_confirm_email']);
Route::post('/user/delete/{id}', [userController::class, 'delete']);


//EMAIL CONFIRMATION
Route::get('/email-confirmation/{id}', [registerController::class, 'email_confirmation'])->name('email_confirmation');


//




// DASHBOARD HOME PAGE
Route::get('/user/overview', [overviewController::class, 'overview_page'])->name('overview');


// SETTINGS
Route::get('/user/settings', [settingsController::class, 'settings_page'])->name('settings');
Route::post('/update_about_company', [settingsController::class, 'update_about_company']);
Route::post('/update_company_info', [settingsController::class, 'update_other_info']);
Route::post('/update_password', [userController::class, 'update_password']);


// CATEGORY
Route::get('/categories', [CategoryController::class, 'category_page'])->name('view_categories');
Route::get('/user/category', [CategoryController::class, 'admin_category_page'])->name('create_category');
Route::get('/user/category/{id}', [CategoryController::class, 'edit_category_page'])->name('edit_category');
Route::post('/create_category', [CategoryController::class, 'create']);
Route::post('/update_category', [CategoryController::class, 'update']);
Route::post('/delete_category/{id}', [CategoryController::class, 'soft_delete']);


// INVITE
Route::get('/user/reviewers/invite', [ProductsServicesController::class, 'create_invite_page'])->name('create_invite');



// PRODUCTS & SERVICES
Route::get('/user/products', [ProductsServicesController::class, 'create_product_page'])->name('products');
Route::get('/user/product/{id}', [ProductsServicesController::class, 'edit_product_page'])->name('edit_product');
Route::get('/product/{id}', [ProductsServicesController::class, 'view_product_page'])->name('view_product');
Route::get('/products/{id}', [ProductsServicesController::class, 'view_all_page'])->name('view_products');

Route::get('/user/services', [ProductsServicesController::class, 'create_service_page'])->name('services');
Route::get('/user/service/{id}', [ProductsServicesController::class, 'edit_service_page'])->name('edit_service');

Route::post('/create_product', [ProductsServicesController::class, 'create']);
Route::post('/create_service', [ProductsServicesController::class, 'create_service']);
Route::post('/confirm_product/{id}', [ProductsServicesController::class, 'confirm']);
Route::post('/delete_product/{id}', [ProductsServicesController::class, 'soft_delete']);
Route::post('/update_product_service', [ProductsServicesController::class, 'update']);

// REVIEW
Route::get('/review/{id}', [ReviewController::class, 'submit_review_page'])->name('review_page');
Route::post('/submit_review/{id}', [ReviewController::class, 'create']);



// Ticket
Route::get('/user/ticket', [TicketController::class, 'create_ticket'])->name('create_ticket');
Route::get('/user/ticket/reply/{id}', [TicketController::class, 'reply_ticket'])->name('reply_ticket');
Route::get('/user/ticket/all', [TicketController::class, 'view_all'])->name('view_tickets');

Route::post('/ticket/create', [TicketController::class, 'create']);
Route::post('/ticket/reply/{id}', [TicketController::class, 'reply']);


// SEARCH
Route::post('/search/{id}', [searchController::class, 'search']);




// USERS
Route::get('/user/all', [userController::class, 'view_users_page'])->name('all_users');
