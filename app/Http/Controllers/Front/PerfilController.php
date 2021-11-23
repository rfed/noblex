<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Http\Request;
use Noblex\Customer;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Http\Requests\PerfilUpdateRequest;
use Noblex\Repositories\EloquentCategory;
use Noblex\Category;
use Noblex\User;

class PerfilController extends FrontController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:customer');
    }


    public function edit()
    {
        $customer = \Auth::guard('customer')->user();

        // Policies/PerfilPolicy
        $this->authorize('view', $customer);

        $page_id = 'mi_cuenta';
        $categories = Category::where('root_id', 1)->get();
        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        $breadcrumbs[] = ['caption' => 'Mi Cuenta'];

        return view('front.pages.perfil', compact("page_id", "customer", "categories", "breadcrumbs"));
    }

    
    public function update(PerfilUpdateRequest $request)
    {
        $customer = \Auth::guard('customer')->user();

        $this->authorize('update', $customer);

        $data = $request->validated();

        $data['birth'] = $data['year'].'-'.$data['month'].'-'.$data['day'];
        
        if($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }   

        $customer->fill(array_filter($data))->save();

        $customer->categories()->sync($data['category_id']);

        return back()->with('success', 'Se han guardado los cambios');
    }

}
