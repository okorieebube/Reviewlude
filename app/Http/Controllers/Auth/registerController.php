<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Traits\appFunction;
use Illuminate\Http\Request;
use App\Mail\accountConfirmation;
use App\Models\business_settings;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class registerController extends Controller
{
    use appFunction;

    function __construct(User $User)
    {
        // $this->middleware('auth',  ['except' => ['activateCoursesStatus', 'deleteCourses']]);
        $this->User = $User;
    }


    public function business_register_page()
    {
        return view('en.business_register');
    }
    public function reviewer_register_page()
    {
        return view('en.reviewer_register');
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

    public function create_business(Request $request)
    {
        try {
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }

            $full_name = explode(' ', $request->input('full_name'));
            $first_name = $full_name[0];
            $last_name = $full_name[1];
            $unique_id = $this->rand_id();

            $user = User::create([
                'unique_id' => $unique_id,
                'user_type' => 'business',
                'email' => $request->input('email'),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'password' => Hash::make($request->input('password')),
                'company_name' => $request->input('company_name'),
            ]);

            if (!$user->unique_id) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {
                // create settings row for business
                $settings = business_settings::create([
                    'unique_id' => $unique_id,
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
}
