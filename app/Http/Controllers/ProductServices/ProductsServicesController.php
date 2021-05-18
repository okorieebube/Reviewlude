<?php

namespace App\Http\Controllers\ProductServices;

use Exception;
use App\Models\User;
use App\Models\category;
use App\Traits\appFunction;
use Illuminate\Http\Request;
use App\Models\products_services;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\loginController;
use App\Models\categories_to_product_services_tb;

class ProductsServicesController extends Controller
{
    use appFunction;
    //
    public function __construct(User $user_model, loginController $Login, category $categories, products_services $products_services, categories_to_product_services_tb $category_to_product_services)
    {
        $this->middleware('auth',  ['except' => []]);
        $this->Login = $Login;
        $this->user_model = $user_model;
        $this->categories = $categories;
        $this->products_services = $products_services;
        $this->category_to_product_services = $category_to_product_services;
        // categories_to_product_services_tb
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

        $categories = $this->categories->getAll();
        $view = [
            'categories' => $categories,
            'services' => $products,
        ];
        return view('user.services', $view);
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
            'cover_img' => ['required', 'file', 'image', 'mimes:jpeg,png,gif', 'max:4048'],
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

            $create = products_services::create([
                'unique_id' => $product_id,
                'user_id' => $user->unique_id,
                'name' => $name,
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
            }
            $create_category = categories_to_product_services_tb::create([
                'unique_id' => $product_services_id,
                'category_id' => $category_id,
                'product_services_id' => $product_id,
            ]);


            if (!$create_category) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {

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
                'public/uploads/services',
                $img_name
            );

            $create = products_services::create([
                'unique_id' => $product_id,
                'user_id' => $user->unique_id,
                'name' => $name,
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
            }
            $create_category = categories_to_product_services_tb::create([
                'unique_id' => $product_services_id,
                'category_id' => $category_id,
                'product_services_id' => $product_id,
            ]);


            if (!$create_category) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {

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
            } else {
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
                if($product->type == 'product'){
                    Storage::delete('public/uploads/products/'.$product->cover_photo);
                    $upload = $cover_img->storeAs(
                        'public/uploads/products',
                        $img_name
                    );

                }elseif ($product->type == 'service') {
                    Storage::delete('public/uploads/services/'.$product->cover_photo);
                    $upload = $cover_img->storeAs(
                        'public/uploads/services',
                        $img_name
                    );
                }
                $request->cover_image = $img_name;
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
            $deleted = products_services::find($id)->delete();

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
