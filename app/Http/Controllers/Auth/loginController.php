<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{

    public function __construct(User $user) {
        $this->user = $user;
    }

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

    protected function authenticated(Request $request)
    {
        return redirect('/user/overview'); //put your redirect url here
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

            // if user exists
            $condition = [
                ['email', $email],
            ];
            $User = $this->user->getSingle($condition);

            if(!$User){
                throw new Exception("User account does not exist!");

            }else{
                if($User->is_email_validated == 0){
                    throw new Exception('Email address has\'nt been confirmed!');
                }
            }

            if (!$token = Auth::attempt(['email' => $email, 'password' => $password])) {
                throw new Exception('Authentication Failed!');
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
