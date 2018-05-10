<?php

namespace Noblex\Http\Controllers\Front\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Noblex\Http\Controllers\Front\FrontController;

class ResetPasswordController extends FrontController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

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

    public function showResetForm(Request $request, $token = null)
    {
        $page_id = 'recuperar_clave';
        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        $breadcrumbs[] = ['caption' => 'Cambiar Clave'];

        return view('front.auth.passwords.reset', compact("page_id", "breadcrumbs"))->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function broker()
    {
        return Password::broker('customers');
    }

    //returns authentication guard of seller
    protected function guard()
    {
        return Auth::guard('customer');
    }
}
