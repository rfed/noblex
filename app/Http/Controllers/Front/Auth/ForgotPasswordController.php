<?php

namespace Noblex\Http\Controllers\Front\Auth;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Noblex\Http\Controllers\Controller;
use Noblex\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends FrontController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest:customer');
    }

    public function showLinkRequestForm()
    {
        $page_id = 'recuperar_clave';
        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        $breadcrumbs[] = ['caption' => 'Recuperar Clave'];

        return view('front.auth.passwords.email', compact("page_id", "breadcrumbs"));
    }

    // customers -> config/auth.php passwords.
    public function broker() {
        return Password::broker('customers');
    }
}
