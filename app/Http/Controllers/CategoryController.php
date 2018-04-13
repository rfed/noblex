<?php

namespace Noblex\Http\Controllers;

use Illuminate\Http\Request;
use Noblex\Category;
use Noblex\Repositories\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    protected $category;

    // Las interfaces no se pueden instanciar. 
        
    /* App/Providers/ServiceProvider.php definimos un bind para decirle a Laravel que cuando intentemos instanciar la interface,
     * automaticamente nos devuelva una instancia del objeto CacheCategory.
     */
    public function __construct(CategoryInterface $category)
    {
        $this->middleware('auth');
        $this->category = $category;
    }


    public function index()
    {
        $categorias = $this->category->getAll();

        return view('admin.pages.categorias.index', compact("categorias"));
    }


    public function create()
    {
        return view('admin.pages.categorias.form');
    }


    public function store(Request $request)
    {
        $this->category->store($request);

        return redirect()->route('categorias.index')->with('success', 'Categoria agregada correctamente.');
    }


    public function edit($id)
    {
        $categoria = $this->category->findById($id);

        return view('admin.pages.categorias.form', compact("categoria"));
    }


    public function update(Request $request, $id)
    {
        $this->category->update($request, $id);

        return redirect()->route('categorias.index')->with('info', 'Categoria editada correctamente.');
    }

    
    public function destroy($id)
    {
        $this->category->destroy($id);

        return redirect()->route('categorias.index')->with('danger', 'Categoria eliminada correctamente.');
    }
}
