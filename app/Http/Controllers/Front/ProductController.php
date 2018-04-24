<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Front\FrontController;

class ProductController extends FrontController
{
	public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
    	return view('front.pages.productos');
    }
}
