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
    public function __construct(loginController $Login, products_services $products_services, Review $review)
    {
        $this->middleware('auth',  ['except' => ['']]);
        $this->Login = $Login;
        $this->products_services = $products_services;
        $this->review = $review;
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
            'review' => ['required', 'string', 'max:500'],
        ];
        return Validator::make($data, $rules, $custom_messages);
    }


    protected function validator2(array $data)
    {
        return Validator::make($data, [
            'reply' => ['required', 'string'],
        ]);
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

    public function reply(Request $request)
    {
        try {
            $user = $this->Login->user_logged();
            $validator = $this->validator2($request->all());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }

            $condition = [
                ['unique_id', $request->input('review_id')],
            ];
            $main_review = $this->review->getSingle($condition);
            if ($main_review) {
                $create = Review::create([
                    'unique_id' => $this->rand_id(),
                    'user_id' => $user->unique_id,
                    'product_id' => $main_review->product_id,
                    'review' => $request->input('reply'),
                    'star_rating' => 0,
                    'repy_main_id' => $request->input('review_id'),
                    'is_blocked' => 0,
                ]);
            }

            if (!$create) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {

                $error = 'Review replied successfully!';
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


    public function soft_delete(Request $request, $id)
    {
        try {
            if (!$id) {
                throw new Exception($this->errorMsgs(15)['msg']);
            }

            $condition = [
                ['unique_id', $id],
            ];
            $condition2 = [
                ['repy_main_id', $id],
            ];
            //  = $this->review->getAll($condition);
            $reviews = Review::where($condition)->orWhere($condition2)->orderBy('id', 'desc')->get();
            // return response()->json($reviews);
            if ($reviews) {
                $deleted = $reviews->each->delete();
            }

            if (!$deleted) {
                throw new Exception($this->errorMsgs(14)['msg']);
            }

            $error = 'Review Deleted Successfully!';
            return response()->json(["message" => $error, 'status' => true]);
        } catch (Exception $e) {

            $error = $e->getMessage();
            $error = [
                'errors' => [$error],
            ];
            return response()->json(["errors" => $error, 'status' => false]);
        }
    }

    public function trust_score($product_id)
    {
        $condition = [
            ['product_id', $product_id],
            ['repy_main_id',null],
        ];
        $total = 0;
        $product_reviews = $this->review->getAll($condition);
        foreach ($product_reviews as $e) {
            $total += $e->star_rating;
        }
        // return $product_reviews;
        if(count($product_reviews) > 0){
            $trust_score = round($total / count($product_reviews),1);
        }else{
            $trust_score = 2;
        }
        return $trust_score;
    }
    public function score_performance($score)
    {
        switch ($score) {
            case ($score < 1):
                return 'bad';
                break;

            case ($score < 2 && $score > 1):
                return 'poor';
                break;

            case ($score < 3 && $score > 2):
                return 'average';
                break;

            case ($score < 4 && $score > 3):
                return 'great';
                break;

            case ($score < 5 && $score > 4):
                return 'excellent';
                break;

            default:
                return 'average';
                break;
        }
    }
}
