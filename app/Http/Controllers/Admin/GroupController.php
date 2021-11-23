<?php

namespace Noblex\Http\Controllers\Admin;

use Noblex\Group;
use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\Interfaces\GroupInterface;

class GroupController extends Controller
{
    private $group;

    public function __construct(GroupInterface $group)
    {
        $this->middleware('auth');
        $this->group = $group;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = $this->group->getAll();

        return view('admin.pages.groups.index', compact("groups")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->group->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Noblex\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = $this->group->findById($id);

        return view('admin.pages.groups.edit', compact("group"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Noblex\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->group->update($request, $id);        

        return redirect('panel/groups')->with('success', 'Grupo editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Noblex\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->group->destroy($id);

        return redirect()->route('admin.groups.index')->with('danger', 'Grupo eliminado correctamente.');
    }
}
