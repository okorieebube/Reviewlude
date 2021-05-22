<?php

namespace App\Http\Controllers;

use App\Models\categories_to_product_services_tb;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(categories_to_product_services_tb $category_pivot) {
        $this->category_pivot = $category_pivot;
    }


    public function calc_products_under_category($category_id){
        $no_of_products = 0;
        if($category_id){
            $condition = [
                ['category_id',$category_id],
                ['deleted_at',null],
            ];
            $category_pivot = $this->category_pivot->getAll($condition);
            $no_of_products = count($category_pivot);
            return $no_of_products;

        }

        return $no_of_products;
    }
}
