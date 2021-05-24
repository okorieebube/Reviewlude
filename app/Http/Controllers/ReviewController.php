<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\products_services;
use App\Traits\appFunction;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\loginController;

class ReviewController extends Controller
{
    use appFunction;
    //
    public function __construct(loginController $Login, products_services $products_services)
    {
        $this->middleware('auth',  ['except' => ['submit_review_page']]);
        $this->Login = $Login;
        $this->products_services = $products_services;
    }

    public function submit_review_page($id)
    {
        $condition = [
            ['slug', $id]
        ];
        $product = $this->products_services->getSingle($condition);
        $view = [
            'product' => $product,
        ];
        return view('en.review_product', $view);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */



    protected function validator(array $data)
    {
        $custom_messages = [
            'star_rating.numeric' => 'You have to give a star rating',
        ];

        $rules = [
            'star_rating' => ['required', 'numeric'],
            'review' => ['required', 'string','max:500'],
        ];
        return Validator::make($data, $rules, $custom_messages);
    }

    public function create(Request $request, $id)
    {
        try {
            $user = $this->Login->user_logged();
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }
            $product_id = $id;
            $create = Review::create([
                'unique_id' => $this->rand_id(),
                'user_id' => $user->unique_id,
                'product_id' => $product_id,
                'review' => $request->input('review'),
                'star_rating' => $request->input('star_rating'),
                'reply_main_id' => null,
                'is_blocked' => 0,
            ]);

            if (!$create) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {

                $error = 'Review submitted successfully!';
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
