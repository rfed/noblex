<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\Interfaces\TagInterface;

class TagController extends Controller
{
    private $tag;

    public function __construct(TagInterface $tag)
    {
        $this->middleware('auth');
        $this->tag = $tag;
    }


    public function index()
    {
        $tags = $this->tag->getAll();

        return view('admin.pages.tags.index', compact("tags")); 
    }


    public function create()
    {
        return view('admin.pages.tags.create');
    }


    public function store(Request $request)
    {
        $this->tag->store($request);

        return redirect()->route('admin.tags.index')->with('success', 'Etiqueta agregada correctamente.');
    }


    public function edit($id)
    {
        $tag = $this->tag->findById($id);

        return view('admin.pages.tags.edit', compact("tag"));
    }


    public function update(Request $request, $id)
    {
        $this->tag->update($request, $id);

        return redirect()->route('admin.tags.index')->with('info', 'Etiqueta editada correctamente.');
    }


    public function destroy($id)
    {
        $this->tag->destroy($id);

        return redirect()->route('admin.tags.index')->with('danger', 'Etiqueta eliminada correctamente.');
    }
}
