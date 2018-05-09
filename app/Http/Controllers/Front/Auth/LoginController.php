<?php

namespace Noblex\Http\Controllers\Front\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Noblex\Category;
use Noblex\Http\Controllers\Front\FrontController;

class LoginController extends FrontController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest:customer')->except('logout');
    }

    public function showLoginForm()
    {
        $page_id = 'login';
        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        $breadcrumbs[] = ['caption' => 'Login'];

        return view('front.auth.login', compact("page_id", "breadcrumbs"));
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->route('home');
        }

        // if unsuccessful, then redirect back to the login with the form data
        return $this->sendFailedLoginResponse($request);
    }

    public function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }
}
