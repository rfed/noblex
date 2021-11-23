<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\Interfaces\ThemeInterface;

class ThemeController extends Controller
{
    private $theme;

    public function __construct(themeInterface $theme)
    {
        $this->middleware('auth');
        $this->theme = $theme;
    }


    public function index()
    {
        $themes = $this->theme->getAll();

        return view('admin.pages.themes.index', compact("themes")); 
    }


    public function create()
    {
        return view('admin.pages.themes.create');
    }


    public function store(Request $request)
    {
        $this->theme->store($request);

        return redirect()->route('admin.themes.index')->with('success', 'Categoría agregada correctamente.');
    }


    public function edit($id)
    {
        $theme = $this->theme->findById($id);

        return view('admin.pages.themes.edit', compact("theme"));
    }


    public function update(Request $request, $id)
    {
        $this->theme->update($request, $id);

        return redirect()->route('admin.themes.index')->with('info', 'Categoría editada correctamente.');
    }


    public function destroy($id)
    {
        $this->theme->destroy($id);

        return redirect()->route('admin.themes.index')->with('danger', 'Categoría eliminada correctamente.');
    }
}
