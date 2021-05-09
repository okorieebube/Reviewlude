<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Auth\loginController;
use Exception;
use App\Models\User;
use App\Traits\appFunction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    use appFunction;
    //
    public function __construct(User $user_model, loginController $Login)
    {
        $this->middleware('auth',  ['except' => []]);
        $this->Login = $Login;
        $this->user_model = $user_model;
    }



    public function update_password(Request $request)
    {
        try {
            $user = $this->Login->user_logged();

            $validator = Validator::make($request->all(), [
                'old_password' => ['required', 'string'],
                'password' => ['required', 'string', 'confirmed'], //'min:8'
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }
            $request->request->add(['id' => $user['unique_id']]);
            $update_user = $this->user_model->updateUser($request);

            if(!$update_user){
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {
                $error = 'Company Password Updated!';
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
