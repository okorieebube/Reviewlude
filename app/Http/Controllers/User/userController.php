<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\User;
use App\Models\Review;
use App\Mail\resetPassword;
use App\Traits\appFunction;
use Illuminate\Http\Request;
use App\Models\business_settings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\loginController;

class userController extends Controller
{
    use appFunction;
    //
    public function __construct(User $user_model, loginController $Login, Review $review, business_settings $business_settings)
    {
        $this->middleware('auth',  ['except' => [
            'clear_cache',
            'showToken',
            'view_user_profile',
            'forgot_password',
            'reset_password_page',
            'reset_password'
        ]]);
        $this->Login = $Login;
        $this->user_model = $user_model;
        $this->review = $review;
        $this->business_settings = $business_settings;
        // business_settings
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

    public function reset_password_page()
    {
        // print_r(bcrypt('okorieebube1'));
        // die();
        if ($_GET['ip'] !== '01ea33b6f1515958a014aa66178') {
            return redirect('/');
        }
        return view('en.reset-password');
    }

    public function view_users_page()
    {
        $user = auth()->user();


        $condition = [
            ['user_type', '!=', 'admin'],
            ['deleted_at', null]
        ];
        $users = $this->user_model->getAll($condition);

        $view = [
            'all_users' => $users,
        ];
        return view('user.users', $view);
    }

    public function view_user_profile($id)
    {
        $condition = [
            ['unique_id', $id]
        ];
        $user_profile = $this->user_model->getSingle($condition);
        $review_condition = [
            ['user_id', $id],
            ['repy_main_id', null],
        ];
        $product_review = $this->review->getAll($review_condition);
        $view = [
            'user_profile' => $user_profile,
            'reviews' => $product_review,
        ];
        return view('en.user_profile', $view);
    }

    public function business_profile($id)
    {

        $condition = [
            ['unique_id', $id]
        ];
        $user_profile = $this->user_model->getSingle($condition);
        $condition = [
            ['unique_id', $id]
        ];

        $company_info = $this->business_settings->getSingle($condition);
        $view = [
            'profile' => $user_profile,
            'info' => $company_info,
        ];
        return view('en.company', $view);
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

            if (Hash::check($request->input('password'),$user->password)) {
                $user->fill([
                    'password' => Hash::make($request->password)
                ])->save();
                $error = 'Company Password Updated!';
                return response()->json(["message" => $error, 'status' => true]);
            } else {
                $message = 'Error! The old password entered, is incorrect';
                throw new Exception($message);
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
            } else {
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
            } else {
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
            } else {
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
    public function forgot_password(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'string', 'email'],
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }
            $condition = [
                ['email', $request->input('email')]
            ];
            $user = $this->user_model->getSingle($condition);

            if (!$user) {
                return $this->errorMsgs(11);
            }

            Mail::to($user->email)->send(new resetPassword($user));
            if (count(Mail::failures()) > 0) {
                throw new Exception($this->errorMsgs(15)['msg']);
            } else {
                $message = 'Mail sent successfully. Check ' . $user->email . ' for Password Reset Link!';
                return response()->json(["message" => $message, 'status' => true]);
            }
        } catch (Exception $e) {

            $error = $e->getMessage();
            $error = [
                'errors' => [$error],
            ];
            return response()->json(["errors" => $error, 'status' => false]);
        }
    }

    public function reset_password(Request $request)
    {
        try {
            $condition = [
                ['email', $request->input('email')]
            ];
            $user = $this->user_model->getSingle($condition);
            $validator = Validator::make($request->all(), [
                'password' => ['required', 'string', 'confirmed'], //'min:8'
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            $error = 'Password Reset Successfully. Proceed to login!';
            return response()->json(["message" => $error, 'status' => true]);
        } catch (Exception $e) {

            $error = $e->getMessage();
            $error = [
                'errors' => [$error],
            ];
            return response()->json(["errors" => $error, 'status' => false]);
        }
    }
}
