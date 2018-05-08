<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Widget;
use Noblex\Repositories\Interfaces\WidgetInterface;

class HomeController extends FrontController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WidgetInterface $widgets)
    {
        parent::__construct();
        $this->widgets = $widgets;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = $this->widgets->slider();
        $promoboxes = $this->widgets->promoboxes();
        $widgets = $this->widgets->home();
        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        
        return view('front.pages.home', compact('slider', 'widgets', 'breadcrumbs', 'promoboxes'));
    }
}
