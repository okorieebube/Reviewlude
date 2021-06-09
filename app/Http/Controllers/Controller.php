<?php

namespace App\Http\Controllers;

use App\Models\categories_to_product_services_tb;
use App\Models\Review;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(categories_to_product_services_tb $category_pivot, Review $review)
    {
        $this->category_pivot = $category_pivot;
        $this->review = $review;
    }


    public function calc_products_under_category($category_id)
    {
        $no_of_products = 0;
        if ($category_id) {
            $condition = [
                ['category_id', $category_id],
                ['deleted_at', null],
            ];
            $category_pivot = $this->category_pivot->getAll($condition);
            $no_of_products = count($category_pivot);
            return $no_of_products;
        }

        return $no_of_products;
    }

    public function calc_reviews_under_products($product_id)
    {
        $no_of_reviews = 0;
        if ($product_id) {
            $condition = [
                ['product_id', $product_id],
                ['repy_main_id', null],
                ['deleted_at', null],
            ];
            $reviews = $this->review->getAll($condition);
            $no_of_reviews = count($reviews);
            return $no_of_reviews;
        }

        return $no_of_reviews;
    }

    public function validate_company_email($email, $company_name)
    {
        $split_by_at = explode('@', $email);
        $split_by_dot = explode('.', $split_by_at[1]);
        if (strpos($company_name,' ')) {
            $name_array = explode(' ', $company_name);
            $name = implode($name_array);
        } else {
            $name = $company_name;
        }
        // return $name;
        return (strtolower($split_by_dot[0]) == strtolower($name)) ? true : false;
    }
}
