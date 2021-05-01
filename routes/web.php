<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\User\userController;
use App\Http\Controllers\Auth\registerController;

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
    return view('en.index');
});


Route::get('/login', [userController::class, 'login_page'])->name('login');
Route::get('/register/business', [userController::class, 'business_register_page'])->name('register_business');
Route::get('/register/reviewer', [userController::class, 'reviewer_register_page'])->name('register_reviewer');

Route::post('/register_business', [registerController::class, 'create_business'])->name('create_business');
Route::post('/register/business', [registerController::class, 'create_business'])->name('register_business');
Route::post('/login_acct', [loginController::class, 'login']);
