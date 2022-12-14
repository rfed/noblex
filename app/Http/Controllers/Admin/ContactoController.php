<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Contact;

class ContactoController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


    public function index()
    {
        $contactos = Contact::with('subject')->get();

        return view('admin.pages.contactos.index', compact("contactos"));
    }
}
