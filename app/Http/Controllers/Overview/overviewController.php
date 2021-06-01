<?php

namespace App\Http\Controllers\Overview;

use App\Http\Controllers\Controller as Controller;
use App\Http\Controllers\ReviewController;
use App\Models\category;
use App\Models\products_services;
use App\Models\ticket;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;

class overviewController extends Controller
{
    //
    public function __construct(products_services $products_services, Controller $Controller, ReviewController $reviewController, User $User,ticket $ticket, category $category)
    {
        $this->middleware('auth',  ['except' => []]);
        $this->products_services = $products_services;
        $this->Controller = $Controller;
        $this->User = $User;
        $this->reviewController = $reviewController;
        $this->ticket = $ticket;
        $this->category = $category;
    }

    public function overview_page()
    {
        $user = auth()->user();
        $condition = [
            ['user_id', $user->unique_id]
        ];
        $product_service = $this->products_services->getAll($condition);
        $condition = [
            ['user_id', $user->unique_id],
            ['status', 'confirmed']
        ];
        $confirmed_product_service = $this->products_services->getAll($condition);

        $condition = [
            ['type', 'product'],
            ['user_id', $user->unique_id]
        ];
        $products = $this->products_services->getAll($condition);
        $condition = [
            ['type', 'service'],
            ['user_id', $user->unique_id]
        ];
        $services = $this->products_services->getAll($condition);
        foreach ($product_service as $e) {
            $e->no_of_reviews = $this->Controller->calc_reviews_under_products($e->unique_id);
            $e->trust_score = $this->reviewController->trust_score($e->unique_id);
        }
        $total_reviews = 0;
        $total_score = 0;

        foreach ($product_service as $e) {
            $total_reviews += $e->no_of_reviews;
            $total_score += $e->trust_score;
        }
        $total_score = $retVal = (count($product_service) > 0) ? $total_score / count($product_service) : $total_score ;

        $view = [
            'user' => $user,
            'total_products' => count($products),
            'total_services' => count($services),
            'total_reviews' => $total_reviews,
            'confirmed_product_service' => count($confirmed_product_service),
            'total_score' => $total_score,
        ];
        return view('user.overview', $view);
    }

    public function admin_overview_page()
    {
        $user = $this->User->getAll([]);
        $product_service = $this->products_services->getAll([]);
        $condition = [
            ['status', 'confirmed']
        ];
        $confirmed_product_service = $this->products_services->getAll($condition);

        $condition = [
            ['type', 'product'],
        ];
        $products = $this->products_services->getAll($condition);
        $condition = [
            ['type', 'product'],
            ['status', 'confirmed'],
        ];
        $confirmed_products = $this->products_services->getAll($condition);
        $condition = [
            ['type', 'service'],
            ['status', 'confirmed'],
        ];
        $confirmed_services = $this->products_services->getAll($condition);
        $condition = [
            ['main', '1'],
        ];
        $tickets = $this->ticket->get_all($condition);
        $condition = [
            ['type', 'service'],
        ];
        $services = $this->products_services->getAll($condition);
        $categories = $this->category->getAll('id',[]);
        foreach ($product_service as $e) {
            $e->no_of_reviews = $this->Controller->calc_reviews_under_products($e->unique_id);
            $e->trust_score = $this->reviewController->trust_score($e->unique_id);
        }
        $total_reviews = 0;
        $total_score = 0;

        foreach ($product_service as $e) {
            $total_reviews += $e->no_of_reviews;
            $total_score += $e->trust_score;
        }
        $total_score = $retVal = (count($product_service) > 0) ? $total_score / count($product_service) : $total_score ;

        $view = [
            'users' => count($user),
            'total_products' => count($products),
            'total_services' => count($services),
            'total_reviews' => $total_reviews,
            'confirmed_product_service' => count($confirmed_product_service),
            'total_score' => $total_score,
            'confirmed_products' => count($confirmed_products),
            'confirmed_services' => count($confirmed_services),
            'tickets' => count($tickets),
            'categories' => count($categories),
        ];
        return view('user.admin_overview', $view);
    }
}
