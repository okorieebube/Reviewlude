<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\User;
use App\Traits\appFunction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\loginController;

class userController extends Controller
{
    use appFunction;
    //
    public function __construct(User $user_model, loginController $Login)
    {
        $this->middleware('auth',  ['except' => [
            'clear_cache',
            'showToken'
        ]]);
        $this->Login = $Login;
        $this->user_model = $user_model;
    }


    /**
     * Clear application cache
     *
     * @return void
     */
    public function clear_cache()
    {
        $exitCode = Artisan::call('config:cache');
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('view:clear');
        $exitCode = Artisan::call('route:cache');
    }

    public function showToken()
    {
        return csrf_token();
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

            if (!$update_user) {
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
