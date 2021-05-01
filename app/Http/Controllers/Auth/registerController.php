<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Traits\appFunction;
use Illuminate\Http\Request;
use App\Mail\accountConfirmation;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class registerController extends Controller
{
    use appFunction;

    // function __construct(
    //     Like $like, course_model $course_model, course_category_model $course_category_model, Review $review, live_stream_model $live_stream_model, SavedCourses $savedCourses, User $user, Subscribe $subscribe, courseEnrollment $courseEnrollment
    // ){
    //     $this->middleware('auth',  ['except' => ['activateCoursesStatus', 'deleteCourses']]);
    //     $this->like = $like;
    //     $this->course_model = $course_model;
    //     $this->course_category_model = $course_category_model;
    //     $this->review = $review;
    //     $this->live_stream_model = $live_stream_model;
    //     $this->savedCourses = $savedCourses;
    //     $this->user = $user;
    //     $this->subscribe = $subscribe;
    //     $this->courseEnrollment = $courseEnrollment;
    // }

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


            $user = User::create([
                'unique_id' => $this->rand_id(),
                'user_type' => 'business',
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'company_name' => $request->input('company_name'),
            ]);

            if (!$user->unique_id) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {
                Mail::to($user->email)->send(new accountConfirmation($user));

                $error = 'Business Registered Successfully!';
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
