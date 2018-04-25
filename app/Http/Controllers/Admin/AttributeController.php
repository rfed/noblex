<?php

namespace Noblex\Http\Controllers\Admin;

use Noblex\Attribute;
use Noblex\Group;
use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\Interfaces\AttributeInterface;

class AttributeController extends Controller
{
    private $attribute;

    public function __construct(AttributeInterface $attribute)
    {
        $this->middleware('auth');
        $this->attribute = $attribute;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = $this->attribute->getAll();

        return view('admin.pages.attributes.index', compact("attributes")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::orderBy('name')->get();
        
        return view('admin.pages.attributes.create', compact("groups"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $err = $this->attribute->store($request);
        if($err){
            return redirect('panel/attributes/create')->withErrors($err);
        }
        return redirect()->route('admin.attributes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Noblex\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = $this->attribute->findById($id);
        $groups = Group::orderBy('name')->get();

        return view('admin.pages.attributes.edit', compact("attribute", "groups"));
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
        $this->attribute->update($request, $id);        

        return redirect('panel/attributes')->with('success', 'Grupo editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Noblex\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->attribute->destroy($id);

        return redirect()->route('admin.attributes.index')->with('danger', 'Grupo eliminado correctamente.');
    }
}
