<?php

namespace Noblex\Http\Controllers;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Http\Requests\NewsletterStoreRequest;
use Noblex\Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::all();

        return view('admin.pages.newsletter.index', compact("newsletters"));
    }


    public function store(NewsletterStoreRequest $request)
    {
        $data = $request->validated();

        /*if(isset($request->validator) && $request->validator->fails()) 
        {
            return $request->validator->messages();
        }*/

        Newsletter::create($data);

        return redirect('#newsletter')->with('success', 'Te has inscripto correctamente!');
    }

}
