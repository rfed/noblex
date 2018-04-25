<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\Interfaces\UserInterface;

class UserController extends Controller
{
    private $user;

    public function __construct(UserInterface $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }


    public function index()
    {
        $users = $this->user->getAll();

        return view('admin.pages.users.index', compact("users")); 
    }


    public function create()
    {
        return view('admin.pages.users.create');
    }


    public function store(Request $request)
    {
        $this->user->store($request);

        return redirect()->route('admin.users.index')->with('success', 'Usuario agregado correctamente.');
    }


    public function edit($id)
    {
        $user = $this->user->findById($id);

        return view('admin.pages.users.edit', compact("user"));
    }


    public function update(Request $request, $id)
    {
        $this->user->update($request, $id);

        return redirect()->route('admin.users.index')->with('info', 'Usuario editado correctamente.');
    }


    public function destroy($id)
    {
        $this->user->destroy($id);

        return redirect()->route('admin.users.index')->with('danger', 'Usuario eliminado correctamente.');
    }
}
