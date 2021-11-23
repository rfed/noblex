<?php

namespace Noblex\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Noblex\Customer;
use Noblex\User;

class PerfilPolicy
{
    use HandlesAuthorization;


    // Providers/AuthServiceProvider enlanzar modelos.
    public function view($user = null, Customer $customer)
    {
        return Auth::guard('customer')->user()->id == $customer->id;
    }


    public function update($user = null, Customer $customer)
    {
        return Auth::guard('customer')->user()->id == $customer->id;
    }

}
