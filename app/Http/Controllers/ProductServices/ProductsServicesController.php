<?php

namespace App\Http\Controllers\ProductServices;

use Exception;
use App\Models\User;
use App\Traits\appFunction;
use Illuminate\Http\Request;
use App\Models\products_services;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\loginController;
use App\Models\categories_to_product_services_tb;
use App\Models\category;

class ProductsServicesController extends Controller
{
    use appFunction;
    //
    public function __construct(User $user_model, loginController $Login, category $categories, products_services $products_services)
    {
        $this->middleware('auth',  ['except' => []]);
        $this->Login = $Login;
        $this->user_model = $user_model;
        $this->categories = $categories;
        $this->products_services = $products_services;
        // products_services
    }


    public function create_page()
    {
        $user = auth()->user();

        if ($user->user_type === 'admin') {

            $condition = [
                ['deleted_at', null]
            ];
            $products = $this->products_services->getAll($condition);
        } else {

            $condition = [
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
            $product->save();

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
                $error = 'Product Deleted Successfully!';
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
