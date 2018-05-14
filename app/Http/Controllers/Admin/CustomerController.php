<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Customer;
use Noblex\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}


    public function index()
    {
        $customers = Customer::all();

        return view('admin.pages.customers.index', compact("customers"));
    }
}
