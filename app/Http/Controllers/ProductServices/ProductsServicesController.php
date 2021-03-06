<?php

namespace App\Http\Controllers\ProductServices;

use Exception;
use App\Models\User;
use App\Models\category;
use App\Traits\appFunction;
use Illuminate\Http\Request;
use App\Models\products_services;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\loginController;
use App\Models\categories_to_product_services_tb;
use App\Models\Review;

class ProductsServicesController extends Controller
{
    use appFunction;
    //
    public function __construct(User $user_model, loginController $Login, category $categories, products_services $products_services, categories_to_product_services_tb $category_to_product_services, Controller $Controller, Review $review, ReviewController $reviewController)
    {
        $this->middleware('auth',  ['except' => ['view_product_page', 'view_all_page']]);
        $this->Login = $Login;
        $this->user_model = $user_model;
        $this->categories = $categories;
        $this->products_services = $products_services;
        $this->category_to_product_services = $category_to_product_services;
        $this->Controller = $Controller;
        $this->review = $review;
        $this->reviewController = $reviewController;
    }


    public function create_product_page()
    {
        $user = auth()->user();

        if ($user->user_type === 'admin') {

            $condition = [
                ['type', 'product'],
                ['deleted_at', null]
            ];
            $products = $this->products_services->getAll($condition);
        } else {

            $condition = [
                ['type', 'product'],
                ['user_id', $user->unique_id]
            ];
            $products = $this->products_services->getAll($condition);
        }

        foreach ($products as $e ) {
            $e->no_of_reviews = $this->Controller->calc_reviews_under_products($e->unique_id);
            $e->trust_score = $this->reviewController->trust_score($e->unique_id);
        }

        $categories = $this->categories->getAll();
        $view = [
            'categories' => $categories,
            'products' => $products,
        ];
        return view('user.products', $view);
    }

    public function edit_product_page($id)
    {
        $condition = [
            ['unique_id', $id]
        ];
        $product = $this->products_services->getSingle($condition);
        $categories = $this->categories->getAll();
        $view = [
            'categories' => $categories,
            'the_product' => $product,
        ];
        return view('user.edit_product', $view);
    }
    public function create_service_page()
    {
        $user = auth()->user();

        if ($user->user_type === 'admin') {

            $condition = [
                ['type', 'service'],
                ['deleted_at', null]
            ];
            $products = $this->products_services->getAll($condition);
        } else {

            $condition = [
                ['type', 'service'],
                ['user_id', $user->unique_id]
            ];
            $products = $this->products_services->getAll($condition);
        }
        foreach ($products as $e ) {
            $e->no_of_reviews = $this->Controller->calc_reviews_under_products($e->unique_id);
            $e->trust_score = $this->reviewController->trust_score($e->unique_id);
        }

        $categories = $this->categories->getAll();
        $view = [
            'categories' => $categories,
            'services' => $products,
        ];
        return view('user.services', $view);
    }
    public function create_invite_page()
    {
        $user = auth()->user();


            $condition = [
                ['user_id', $user->unique_id]
            ];
            $products = $this->products_services->getAll($condition);

        $categories = $this->categories->getAll();
        $view = [
            'categories' => $categories,
            'products' => $products,
        ];
        return view('user.create_invite', $view);
    }
    public function edit_service_page($id)
    {
        $condition = [
            ['unique_id', $id]
        ];
        $product = $this->products_services->getSingle($condition);
        $categories = $this->categories->getAll();
        $view = [
            'categories' => $categories,
            'the_product' => $product,
        ];
        return view('user.edit_service', $view);
    }
    public function view_product_page($id)
    {
        $condition = [
            ['slug', $id]
        ];
        $product = $this->products_services->getSingle($condition);
        $categories = $this->categories->getAll();
        $trust_score = $this->reviewController->trust_score($product->unique_id);
        $performance = $this->reviewController->score_performance($trust_score);
        $review_condition = [
            ['product_id', $product->unique_id],
            ['repy_main_id',null],
        ];
        $product_review = $this->review->getAll($review_condition);
        foreach ($categories as $e ) {
            $e->no_of_products = $this->Controller->calc_products_under_category($e->unique_id);
        }
        foreach ($product_review as $e ) {
            $reply_condition = [
                ['repy_main_id', $e->unique_id]
            ];
            $replies = $this->review->getAll($reply_condition);
            $e->replies = $replies;
        }
        $view = [
            'categories' => $categories,
            'product' => $product,
            'reviews' => $product_review,
            'trust_score' => $trust_score,
            'performance' => $performance,
        ];
        // print_r($product_review);
        return view('en.view_product_service', $view);
    }

    public function view_all_page($id)
    {
        $condition = [
            ['slug', $id]
        ];
        $category = $this->categories->getSingle($condition);
        $condition = [
            ['category', $category->unique_id],
            ['status', 'confirmed']
        ];
        $products = $this->products_services->getAll($condition);
        $categories = $this->categories->getAll();
        foreach ($categories as $e ) {
            $e->no_of_products = $this->Controller->calc_products_under_category($e->unique_id);
        }
        foreach ($products as $e ) {
            $e->no_of_reviews = $this->Controller->calc_reviews_under_products($e->unique_id);
        }
        $view = [
            'category' => $category,
            'categories' => $categories,
            'products' => $products,
        ];
        return view('en.view_products', $view);
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
            'name' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string'], //,'min:100'
            'category' => ['required', 'string'],
            'tags' => ['required', 'string', 'max:255'],
            'cover_img' => ['required', 'file', 'image', 'mimes:jpeg,png,gif', 'max:5048'],
        ]);
    }
    protected function validator2(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string'], //,'min:100'
            'category' => ['required', 'string'],
            'tags' => ['required', 'string', 'max:255'],
            // 'cover_img' => [ 'file', 'image', 'mimes:jpeg,png,gif', 'max:4048'],
        ]);
    }

    public function create(Request $request)
    {
        try {
            $user = $this->Login->user_logged();
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }
            $product_id = $this->rand_id();
            $product_services_id = $this->rand_id();
            $category_id = $request->input('category');
            $name = $request->input('name');
            $cover_img = $request->file('cover_img');
            $img_name = $this->gen_file_name($user, $name, $cover_img);
            $upload = $cover_img->storeAs(
                'public/uploads/products',
                $img_name
            );
            $slug = $this->slugify($request->input('name') . ' ' . $user->company_name);

            // check if slug exists already
            $condition = [
                ['slug', $slug],
            ];
            $slug_exists = $this->products_services->getSingle($condition);
            if ($slug_exists) {
                throw new Exception($this->errorMsgs(16)['msg']);
            }

            $create = products_services::create([
                'unique_id' => $product_id,
                'user_id' => $user->unique_id,
                'name' => $name,
                'slug' => $slug,
                'description' => $request->input('desc'),
                'category' => $category_id,
                'cover_photo' => $img_name,
                'status' => 'pending',
                'type' => 'product',    //product or service
                'total_reviews' => 0,
                'score' => 0,
                'tags' => $request->input('tags'),
                'performance' => null,
            ]);
            if (!$create) {
                throw new Exception($this->errorMsgs(14)['msg']);
            }else {

                $error = 'Product Created Successfully!';
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
    public function create_service(Request $request)
    {
        try {
            $user = $this->Login->user_logged();
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }
            $product_id = $this->rand_id();
            $product_services_id = $this->rand_id();
            $category_id = $request->input('category');
            $name = $request->input('name');
            $cover_img = $request->file('cover_img');
            $img_name = $this->gen_file_name($user, $name, $cover_img);
            $upload = $cover_img->storeAs(
                'public/uploads/products',
                $img_name
            );
            $slug = $this->slugify($request->input('name') . ' ' . $user->company_name);

            // check if slug exists already
            $condition = [
                ['slug', $slug],
            ];
            $slug_exists = $this->products_services->getSingle($condition);
            if ($slug_exists) {
                throw new Exception($this->errorMsgs(16)['msg']);
            }

            $create = products_services::create([
                'unique_id' => $product_id,
                'user_id' => $user->unique_id,
                'name' => $name,
                'slug' => $slug,
                'description' => $request->input('desc'),
                'category' => $category_id,
                'cover_photo' => $img_name,
                'status' => 'pending',
                'type' => 'service',    //product or service
                'total_reviews' => 0,
                'score' => 0,
                'tags' => $request->input('tags'),
                'performance' => null,
            ]);
            if (!$create) {
                throw new Exception($this->errorMsgs(14)['msg']);
            }else {

                $error = 'Service Created Successfully!';
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

    public function confirm(Request $request, $id)
    {
        try {
            if (!$id) {
                throw new Exception($this->errorMsgs(15)['msg']);
            }
            $condition = [
                ['unique_id', $id]
            ];
            $product = $this->products_services->getSingle($condition);
            $product->status = 'confirmed';

            if (!$product->save()) {
                throw new Exception($this->errorMsgs(14)['msg']);
            }
            $product_services_id = $this->rand_id();
            $create_category = categories_to_product_services_tb::create([
                'unique_id' => $product_services_id,
                'category_id' => $product->category,
                'product_services_id' => $product->unique_id,
            ]);


            if (!$create_category) {
                throw new Exception($this->errorMsgs(14)['msg']);
            }  else {
                $error = 'Confirmation Successfull!';
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

    public function update(Request $request)
    {
        try {
            $user = $this->Login->user_logged();
            $product = products_services::find($request->input('id'));
            $validator = $this->validator2($request->all());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }

            // update cover image if it was changed
            if ($request->file('cover_img')) {
                $validator = Validator::make($request->all(), [
                    'cover_img' => 'required|file|image|mimes:jpeg,png,gif|max:4048',
                ]);
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors(), 'status' => false]);
                }
                $cover_img = $request->file('cover_img');
                $img_name = $this->gen_file_name($user, $request->name, $cover_img);

                Storage::delete('public/uploads/products/' . $product->cover_photo);
                $upload = $cover_img->storeAs(
                    'public/uploads/products',
                    $img_name
                );

                // $request->merge([
                //     'cover_img' => $img_name,
                // ]);
                $request->request->add(['cover_photo' => $img_name]);
                // return response()->json(["message" => $request->input('cover_img'), 'status' => false]);
                // $request->cover_image = $img_name;
            }
            if ($product->name !== $request->input('name')) {

                $slug = $this->slugify($request->input('name') . ' ' . $user->company_name);

                // check if slug exists already
                $condition = [
                    ['slug', $slug],
                ];
                $slug_exists = $this->products_services->getSingle($condition);
                if ($slug_exists) {
                    throw new Exception($this->errorMsgs(16)['msg']);
                }
                $request->request->add(['slug' => $slug]);
            }

            // update category if it was changed
            if ($product->category !== $request->input('category')) {

                // get previous category attached to from relationsip table and delete
                $condition = [
                    ['deleted_at', null],
                    ['category_id', $product->category],
                    ['product_services_id', $request->input('id')]
                ];
                $prev_category_pivot = $this->category_to_product_services->getSingle($condition)->delete();

                // create relationship for new category
                $category_id = $this->rand_id();
                $create_category = categories_to_product_services_tb::create([
                    'unique_id' => $category_id,
                    'category_id' => $request->input('category'),
                    'product_services_id' => $request->input('id'),
                ]);

                if (!$create_category) {
                    throw new Exception($this->errorMsgs(14)['msg']);
                }
            }

            // update the product_services_tb
            $update = $this->products_services->updateProductServices($request);

            if (!$update) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {
                $error = 'Details Updated Successfully!';
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
            $product = products_services::find($id);
            // delete from relationship table
            $condition = [
                ['product_services_id', $id],
                ['category_id', $product->category]
            ];
            $products_pivot = $this->products_pivot->getAll($condition);
            if($products_pivot){
                $products_pivot->each->delete();
            }

            $deleted = $product->delete();

            if (!$deleted) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {
                $error = 'Deleted Successfully!';
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
