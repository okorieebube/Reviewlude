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


    public function view_users_page()
    {
        $user = auth()->user();


            $condition = [
                ['user_type', '!=' ,'admin'],
                ['deleted_at', null]
            ];
            $users = $this->user_model->getAll($condition);

        $view = [
            'all_users' => $users,
        ];
        return view('user.users', $view);
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
    public function block(Request $request, $id)
    {
        try {
            if (!$id) {
                throw new Exception($this->errorMsgs(15)['msg']);
            }
            $condition = [
                ['unique_id', $id]
            ];
            $user = $this->user_model->getSingle($condition);
            $user->is_blocked = '1';

            if (!$user->save()) {
                throw new Exception($this->errorMsgs(14)['msg']);
            }else {
                $error = 'User account is blocked!';
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
    public function unblock(Request $request, $id)
    {
        try {
            if (!$id) {
                throw new Exception($this->errorMsgs(15)['msg']);
            }
            $condition = [
                ['unique_id', $id]
            ];
            $user = $this->user_model->getSingle($condition);
            $user->is_blocked = '0';

            if (!$user->save()) {
                throw new Exception($this->errorMsgs(14)['msg']);
            }else {
                $error = 'Account is unlocked!';
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

    public function delete(Request $request, $id)
    {
        try {
            if (!$id) {
                throw new Exception($this->errorMsgs(15)['msg']);
            }
            $condition = [
                ['unique_id', $id]
            ];
            $user = $this->user_model->getSingle($condition)->delete();

            if (!$user) {
                throw new Exception($this->errorMsgs(14)['msg']);
            }else {
                $error = 'User account is deleted!';
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
