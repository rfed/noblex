<?php

namespace Noblex\Http\Controllers\Front\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Repositories\EloquentCategory;
use Noblex\User;

class RegisterController extends FrontController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest');
    }*/

    public function showRegistrationForm(EloquentCategory $category)
    {
        $page_id = 'registro';
        $categories = $category->getAllDistinctRaiz();

        return view('front.auth.register', compact("page_id", "categories"));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname'     => 'required|string|max:255',
            'lastname'      => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users,email',
            'password'      => 'required|string|min:6|confirmed',
            'gender'        => 'required|in:male,female',
            'day'           => 'required|date_format:d',
            'month'         => 'required|date_format:m',
            'year'          => 'required|date_format:Y',
            'category_id'   => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ], [
            'day.date_format'       => 'El Formato Día es incorrecto.',
            'month.date_format'     => 'El Formato Mes es incorrecto.',
            'year.date_format'      => 'El Formato Año es incorrecto.',
            'email.email'           => 'El campo Email debe ser válido.',
            'password.min'          => 'La contraseña debe contener mas de 6 caracteres',
            'password.confirmed'    => 'La contraseña no coincide.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Noblex\User
     */
    protected function create(array $data)
    {
        $name = $data['firstname'].' '.$data['lastname'];
        $birth = $data['year'].'-'.$data['month'].'-'.$data['day'];

        $user = User::create([
            'name'      => $name,
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'gender'    => $data['gender'],
            'birth'     => $birth
        ]);

        $user->categories()->attach($data['category_id']);

        return $user;
    }
}
