<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.pages.home');
    }
}
