<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Noblex\Category;

class FrontController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    var $breadcrumbs = [];

    public function __construct(){
        $menu_raiz = Category::where('root_id', 0)->with('childs')->first();
        \View::share(['menu_raiz' => $menu_raiz]);
    }
}
