<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Http\Request;
use Noblex\Customer;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Http\Requests\PerfilUpdateRequest;
use Noblex\Repositories\EloquentCategory;
use Noblex\User;

class PerfilController extends FrontController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:customer');
    }


    public function edit(EloquentCategory $category, Customer $customer)
    {
        // Policies/PerfilPolicy
        $this->authorize('view', $customer);

        $page_id = 'mi_cuenta';
        $categories = $category->getAllDistinctRaiz();
        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        $breadcrumbs[] = ['caption' => 'Mi Cuenta'];

        return view('front.pages.perfil', compact("page_id", "customer", "categories", "breadcrumbs"));
    }

    
    public function update(PerfilUpdateRequest $request, Customer $customer)
    {
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
