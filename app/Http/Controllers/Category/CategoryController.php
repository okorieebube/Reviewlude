<?php

namespace App\Http\Controllers\Category;

use Exception;
use App\Models\category;
use App\Traits\appFunction;
use Illuminate\Http\Request;
use App\Models\products_services;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\categories_to_product_services_tb;

class CategoryController extends Controller
{
    use appFunction;
    //
    public function __construct(category $category, Controller $Controller, products_services $products_services, categories_to_product_services_tb $category_to_product_services)
    {
        $this->middleware('auth',  ['except' => ['category_page']]);
        $this->category = $category;
        $this->Controller = $Controller;
        $this->products_services = $products_services;
        $this->products_pivot = $category_to_product_services;
    }

    public function category_page()
    {
        $categories = $this->category->getAll();
        foreach ($categories as $e ) {
            $e->no_of_products = $this->Controller->calc_products_under_category($e->unique_id);
        }
        $view = [
            'categories' => $categories,
        ];
        return view('en.view_categories', $view);
    }
    public function admin_category_page()
    {
        $categories = $this->category->getAll();
        foreach ($categories as $e ) {
            $e->no_of_products = $this->Controller->calc_products_under_category($e->unique_id);
        }
        $view = [
            'categories' => $categories,
        ];
        return view('user.category', $view);
    }
    public function edit_category_page($id)
    {
        $condition = [
            ['unique_id', $id]
        ];
        $category = $this->category->getSingle($condition);
        $categories = $this->category->getAll();
        foreach ($categories as $e ) {
            $e->no_of_products = $this->Controller->calc_products_under_category($e->unique_id);
        }
        $view = [
            'category' => $category,
            'categories' => $categories,
        ];
        return view('user.edit_category', $view);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            // 'description' => ['nullable', 'string'],
        ]);
    }

    public function create(Request $request)
    {
        try{
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }
            $unique_id = $this->rand_id();
            $slug = $this->slugify($request->input('name'));

            // check if slug exists already
            $condition = [
                ['slug',$slug],
            ];
            $slug_exists = $this->category->getSingle($condition);
            if($slug_exists){
                throw new Exception($this->errorMsgs(16)['msg']);
            }

            $category = category::create([
                'unique_id' => $unique_id,
                'name' => $request->input('name'),
                'slug' => $slug,
                'description' => $request->input('description'),
            ]);

            if (!$category->unique_id) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {

                $error = 'Category Created Successfully!';
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
            $category = category::find($request->input('id'));
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'status' => false]);
            }
            $slug = $this->slugify($request->input('name'));

            // check if slug exists already
            $condition = [
                ['slug',$slug],
            ];
            $slug_exists = $this->category->getSingle($condition);
            if($slug_exists){
                throw new Exception($this->errorMsgs(16)['msg']);
            }
            $request->request->add(['slug' => $slug]);
            // update the product_services_tb
            $update = $this->category->updateSingle($request);

            if (!$update) {
                throw new Exception($this->errorMsgs(14)['msg']);
            } else {
                $error = 'Category Updated Successfully!';
                return response()->json(["message" => $error, 'status' => true]);
            }
        }  catch (Exception $e) {

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
                ['category', $id]
            ];
            $products = $this->products_services->getAll($condition);
            if($products){
                $products->each->delete();
            }

            $condition = [
                ['category_id', $id]
            ];
            $products_pivot = $this->products_pivot->getAll($condition);
            if($products_pivot){
                $products_pivot->each->delete();
            }
            $deleted = category::find($id)->delete();

            if (!$deleted) {
                throw new Exception($this->errorMsgs(14)['msg']);
            }

            $error = 'Category Deleted Successfully!';
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
