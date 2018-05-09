<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Support\Facades\Mail;
use Noblex\Contact;
use Noblex\EmailSubject;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Http\Requests\ContactoStoreRequest;
use Noblex\Subject;

class ContactoController extends FrontController
{

    public function index()
    {
        $page_id = 'contacto';
        $subjects = Subject::all();
        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        $breadcrumbs[] = ['caption' => 'Contacto', 'link' => ''];

        return view('front.pages.contacto', compact("page_id", "subjects", "breadcrumbs"));
    }


    public function store(ContactoStoreRequest $request)
    {
        $data = $request->validated();

        $contact = Contact::create($data);

        $arr_emails = [];
        $arr_emails = EmailSubject::where('subject_id', $request->subject_id)->get();

        foreach($arr_emails as $address) 
        {
            Mail::to($address->email)->send(new \Noblex\Mail\ContactUser($contact));
        }

        return redirect()->route('contacto')->with('success', 'Tu mensaje se envió correctamente.');
    }

}
