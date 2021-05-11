<?php

namespace App\Http\Controllers\Category;

use Exception;
use App\Models\category;
use App\Traits\appFunction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use appFunction;
    //
    public function __construct(category $category)
    {
        $this->middleware('auth',  ['except' => []]);
        $this->category = $category;
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

            $category = category::create([
                'unique_id' => $unique_id,
                'name' => $request->input('name'),
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
