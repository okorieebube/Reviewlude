<?php

namespace App\Http\Controllers\Overview;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class overviewController extends Controller
{
    //

    public function overview_page()
    {
        return view('user.overview');
    }
}
