<?php

namespace App\Http\Controllers\ProductServices;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\products_services;
use App\Traits\appFunction;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Auth\loginController;

class ProductsServicesController extends Controller
{
    use appFunction;
    //
    public function __construct(User $user_model, loginController $Login)
    {
        $this->middleware('auth',  ['except' => []]);
        $this->Login = $Login;
        $this->user_model = $user_model;
    }


    public function create_page()
    {
        return view('user.products');
    }
}
