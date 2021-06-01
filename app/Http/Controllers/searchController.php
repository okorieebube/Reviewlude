<?php

namespace App\Http\Controllers;

use App\Models\products_services;
use Illuminate\Http\Request;

class searchController extends Controller
{

    public function __construct(products_services $products_services,Controller $Controller)
    {
        $this->products_services = $products_services;
        $this->Controller = $Controller;
    }


    public function search()
    {
        // return view('en.index');
        // print_r($_GET);die();
        // Get the search value from the request
        // $search = $request->input('search');
        $search = $_GET['search'];
        // Search in the title and body columns from the posts table
        $products = products_services::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('slug', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('tags', 'LIKE', "%{$search}%")
            ->get();

        if ($products) {

            foreach ($products as $e) {
                $e->no_of_reviews = $this->Controller->calc_reviews_under_products($e->unique_id);
            }
        }

        $view = [
            'products' => $products,
            'keyword' => $search,
        ];
        return view('en.search', $view);
    }
}
