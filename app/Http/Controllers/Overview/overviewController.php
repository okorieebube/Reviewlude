<?php

namespace App\Http\Controllers\Overview;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class overviewController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth',  ['except' => []]);
    }

    public function overview_page()
    {
        $user = auth()->user();
        $view = [
            'user' => $user,
        ];
        return view('user.overview');
    }
}
