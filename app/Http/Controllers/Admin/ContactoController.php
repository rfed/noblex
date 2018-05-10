<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Contact;

class ContactoController extends Controller
{
    public function index()
    {
        $contactos = Contact::all();

        return view('admin.pages.contactos.index', compact("contactos"));
    }
}
