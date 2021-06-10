<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Traits\appFunction;
use Illuminate\Http\Request;
use App\Mail\accountConfirmation;
use App\Models\business_settings;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class registerController extends Controller
{
    use appFunction;

    function __construct(User $User, Controller $controller)
    {
        // $this->middleware('auth',  ['except' => ['activateCoursesStatus', 'deleteCourses']]);
        $this->User = $User;
        $this->controller = $controller;
    }


    public function business_register_page()
    {
        return view('en.business_register');
    }
    public function reviewer_register_page()
    {
        return view('en.reviewer_register');
    }
    public function admin_register_page()
    {
        $condition = [
            ['user_type', 'admin']
        ];
        $users = $this->User->getAll($condition);
        $view = [
            'users' => $users,
        ];
        return view('user.administrator', $view);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company_name' => ['required', 'string', 'max:255'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'], //'min:8'
        ]);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validate_reviewer(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'], //'min:8'
        ]);
    }
    protected function validate_admin(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'], //'min:8'
        ]);
    }

    public function create_business(Request $request)
    {
        try {
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }

            if ($request->input('terms') !== 'on') {
                throw new Exception($this->errorMsgs(31)['msg']);
            }
            $email = $request->input('email');
            $company_name = $request->input('company_name');
            $validate_email = $this->controller->validate_company_email($email,$company_name);
            // return response()->json($validate_email);
            if(!$validate_email){
                throw new Exception($this->errorMsgs(32)['msg']);
            }

            $full_name = explode(' ', $request->input('full_name'));
            $first_name = $full_name[0];
            $last_name = $full_name[1];
            $unique_id = $this->rand_id();

            $user = User::create([
                'unique_id' => $unique_id,
                'user_type' => 'business',
                'email' => $email,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'password' => Hash::make($request->input('password')),
                'company_name' => $company_name,
            ]);

            if (!$user->unique_id) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {
                // create settings row for business
                $settings = business_settings::create([
                    'unique_id' => $unique_id,
                    'logo' => 'avatar.png',
                ]);
                Mail::to($user->email)->send(new accountConfirmation($user));

                $error = 'Proceed to your Email, for confirmation!';
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


    public function create_reviewer(Request $request)
    {
        try {
            $validator = $this->validate_reviewer($request->all());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }
            if ($request->input('terms') !== 'on') {
                throw new Exception($this->errorMsgs(31)['msg']);
            }
            // Mail::to($user->email)->send(new accountConfirmation($user));

            $unique_id = $this->rand_id();

            $user = User::create([
                'unique_id' => $unique_id,
                'user_type' => 'reviewer',
                'email' => $request->input('email'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'password' => Hash::make($request->input('password')),
            ]);

            if (!$user->unique_id) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {
                // create settings row for business
                $settings = business_settings::create([
                    'unique_id' => $unique_id,
                    'logo' => 'avatar.png',
                ]);
                $em = Mail::to($user->email)->send(new accountConfirmation($user));
                // return response()->json($em);

                $error = 'Proceed to your Email, for confirmation!';
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

    public function create_admin(Request $request)
    {
        try {
            $validator = $this->validate_admin($request->all());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }

            $unique_id = $this->rand_id();

            $user = User::create([
                'unique_id' => $unique_id,
                'user_type' => 'admin',
                'email' => $request->input('email'),
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'is_email_validated' => '1',
                'password' => Hash::make($request->input('password')),
                'company_name' => 'Admin',
            ]);

            if (!$user->unique_id) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {
                // create settings row for business
                $settings = business_settings::create([
                    'unique_id' => $unique_id,
                    'logo' => 'avatar.png',
                ]);
                // Mail::to($user->email)->send(new accountConfirmation($user));

                $message = 'Administrator created successfully!';
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

    public function email_confirmation($user_id)
    {
        try {

            $conditions = [
                ['unique_id', $user_id]
            ];

            $User = $this->User->getSingle($conditions);

            if (!$User) {
                throw new Exception("error");
            }

            $User->is_email_validated = 1;
            if ($User->save()) {
                $view = [
                    'user' => $User,
                ];
                return view('en.email-confirmation', $view);
            } else {
                throw new Exception('error');
            }
        } catch (Exception $e) {

            return redirect('/');
        }
    }


    public function admin_confirm_email($user_id)
    {
        try {

            $conditions = [
                ['unique_id', $user_id]
            ];

            $User = $this->User->getSingle($conditions);

            if (!$User) {
                throw new Exception("error");
            }

            $User->is_email_validated = 1;
            if ($User->save()) {
                $message = 'User account confirmed successfully!';
                return response()->json(["message" => $message, 'status' => true]);
            } else {
                throw new Exception($this->errorMsgs(14)['msg']);
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
