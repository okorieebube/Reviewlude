<?php

namespace App\Http\Controllers\User;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{


    public function login_page()
    {
        return view('en.login');
    }
    public function business_register_page()
    {
        return view('en.business_register');
    }
    public function reviewer_register_page()
    {
        return view('en.reviewer_register');
    }

}
