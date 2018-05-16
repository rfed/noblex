<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Noblex\Category;
use Noblex\Page;

class FrontController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    var $breadcrumbs = [];

    public function __construct(){
        $menu_raiz = Category::where('root_id', 0)->with('childs')->first();

        $pages = Page::where('visible', 1)->where('footer', 1)->orderBy('position', 'ASC')->get();

        if (session_status() == PHP_SESSION_NONE) {
        	session_start();
        }
        $comparador = isset($_SESSION['comparador']) ? $_SESSION['comparador'] : [];

        \View::share(['menu_raiz' => $menu_raiz, 'pages' => $pages, 'comparador' => $comparador]);
    }
}
