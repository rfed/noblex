<?php

namespace Noblex\Http\Controllers\Front\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Noblex\Customer;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Repositories\EloquentCategory;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest:customer');
    }

    public function showRegistrationForm(EloquentCategory $category)
    {
        $page_id = 'registro';
        $categories = $category->getAllDistinctRaiz();
        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        $breadcrumbs[] = ['caption' => 'Registro'];

        return view('front.auth.register', compact("page_id", "categories", "breadcrumbs"));
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
            'firstname'     => 'required|string|max:100',
            'lastname'      => 'required|string|max:100',
            'email'         => 'required|string|email|max:191|unique:customers,email',
            'password'      => 'required|string|min:6|confirmed',
            'gender'        => 'required|in:M,F',
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
        $birth = $data['year'].'-'.$data['month'].'-'.$data['day'];

        $customer = Customer::create([
            'firstname' => $data['firstname'],
            'lastname'  => $data['lastname'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'gender'    => $data['gender'],
            'birth'     => $birth
        ]);

        $customer->categories()->attach($data['category_id']);

        return $customer;
    }

    // Sobreescribo este metodo para redireccionar al usuario una vez registrado al login, ya que el metodo create debe retornar el usuario.
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return redirect()->route('login')->with('success', 'Gracias por registrarte');
    }
}
