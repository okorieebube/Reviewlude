<?php

namespace App\Http\Controllers\Settings;

use Exception;
use App\Models\User;
use App\Traits\appFunction;
use Illuminate\Http\Request;
use App\Models\business_settings;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\loginController;

class settingsController extends Controller
{
    use appFunction;
    //
    public function __construct(loginController $user, User $user_model, business_settings $business_settings)
    {
        $this->middleware('auth',  ['except' => []]);
        $this->user = $user;
        $this->user_model = $user_model;
        $this->business_settings = $business_settings;
        // business_settings
    }


    public function settings_page()
    {
        $user = auth()->user();
        $condition = [
            ['unique_id', $user['unique_id']]
        ];

        $company_info = $this->business_settings->getSingle($condition);
        $view = [
            'user' => $user,
            'info' => $company_info,
        ];
        return view('user.settings', $view);
    }

    public function update_about_company(Request $request)
    {
        try {
            $user = $this->user->user_logged();
            $settings = business_settings::find($user->unique_id);

            $validator = Validator::make($request->all(), [
                'company_name' => 'string|nullable',
                'website' => 'string|max:100|nullable',
                'phone' => 'string|nullable',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }
            $request->request->add(['id' => $user['unique_id']]);


            // update cover image if it was changed
            if ($request->file('logo_img')) {
                $validator = Validator::make($request->all(), [
                    'logo_img' => 'file|image|mimes:jpeg,png,gif|max:4048',
                ]);
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors(), 'status' => false]);
                }
                $photo = $request->file('logo_img');
                $img_name = $this->gen_file_name($user, $user['company_name'], $photo);

                // return response()->json($settings);
                $upload = $photo->storeAs(
                    'public/uploads/logo',
                    $img_name
                );

                $prev_file_name = $settings->logo;
                //delete existing file
                if (file_exists(storage_path('public/uploads/logo/' . $prev_file_name))) {

                    if ($prev_file_name !== 'avatar.png') {
                        // unlink(storage_path('public/uploads/logo/' . $prev_file_name));
                        Storage::delete('public/uploads/logo/' . $prev_file_name);
                    }
                }

                // add logo to request object
                $request->request->add(['logo' => $img_name]);
            }
            // return $request;
            $update_user = $this->user_model->updateUser($request);

            if (!$update_user) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {
                $error = 'Company Details Updated!';
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

    public function update_other_info(Request $request)
    {
        try {
            $user = $this->user->user_logged();

            $validator = Validator::make($request->all(), [
                'description' => 'string|min:50|nullable',
                'street_address' => 'string|nullable',
                'zip_code' => 'string|nullable',
                'city' => 'string|nullable',
                'country' => 'string|nullable',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }
            $request->request->add(['id' => $user['unique_id']]);
            // return response()->json($request);
            $business_settings = $this->business_settings->updateBusinessSettings($request);

            if (!$business_settings) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {
                $error = 'Company Information Updated!';
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
