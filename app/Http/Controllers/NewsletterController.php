<?php

namespace Noblex\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Noblex\Http\Controllers\Controller;
use Noblex\Http\Requests\NewsletterStoreRequest;
use Noblex\Newsletter;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    public function index()
    {
        $newsletters = Newsletter::all();

        return view('admin.pages.newsletter.index', compact("newsletters"));
    }


    public function store(NewsletterStoreRequest $request)
    {
        if(request()->ajax())
        {
            $data = $request->validated();

            if(isset($request->validator) && $request->validator->fails()) 
            {
                return response()->json([
                    'error' => $request->validator->messages()
                ]);
            }

            $newsletter = Newsletter::create($data);            

            return $newsletter;
        }
    }

}
