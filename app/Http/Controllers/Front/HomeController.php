<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Widget;
class HomeController extends FrontController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( )
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        $widgets = Widget::getHome();
        return view('front.pages.home', compact('widgets', 'breadcrumbs'));
    }
}
