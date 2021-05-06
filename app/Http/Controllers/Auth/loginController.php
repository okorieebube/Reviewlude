<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{

    protected $redirectTo = '/user/overview';



    protected function guard()
    {
        return Auth::guard('user');
    }

    public function user_logged()
    {
        return auth()->user();
    }

    public function login_page()
    {
        return view('en.login');
    }


    public function login(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:0',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }

            $email = $request->input('email');
            $password = $request->input('password');

            if (!$token = Auth::attempt(['email' => $email, 'password' => $password])) {
                return $token;
            } else {
                $first_name = ucwords($this->user_logged()['full_name']);

                $error = 'User Authorization Successfull!';
                return response()->json(["message" => $error, 'status' => true]);
            }
        } catch (Exception $e) {

            $error = $e->getMessage();
            $error = [
                'errors' => [$error],
            ];
            return response()->json(["errors" => $error, 'status' => false]);
        }
    }
}
