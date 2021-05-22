<?php

namespace App\Http\Controllers\Category;

use Exception;
use App\Models\category;
use App\Traits\appFunction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use appFunction;
    //
    public function __construct(category $category, Controller $Controller)
    {
        $this->middleware('auth',  ['except' => ['category_page']]);
        $this->category = $category;
        $this->Controller = $Controller;
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

    /**
     * Get a validator for an incoming registration request.
     *
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
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
}
