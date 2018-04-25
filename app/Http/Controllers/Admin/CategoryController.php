<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Category;
use Noblex\Feature;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    protected $category;

    // Las interfaces no se pueden instanciar. 
        
    /* App/Providers/ServiceProvider.php definimos un bind para decirle a Laravel que cuando intentemos instanciar la interface,
     * automaticamente nos devuelva una instancia del objeto EloquentCategory.
     */
    public function __construct(CategoryInterface $category)
    {
        $this->middleware('auth');
        $this->category = $category;
    }


    public function index(Request $request)
    {
        $root_id = $request['root_id'];
        if (empty($root_id)) {
            $root_id = 1;
            $parentCategory = null;
        }
        else {
            $parentCategory = $this->category->findById($root_id);
        }

        $categorias = $this->category->getAll($root_id);

        if(request()->ajax())
        {
            $subcategorias = $this->category->getSubcategories($request->id_categoria);
            return $subcategorias;
        }

        return view('admin.pages.categories.index', compact("categorias", "root_id", "parentCategory"));
    }


    public function create(Request $request)
    {
        $root_id = $request['root_id'];
        if (empty($root_id)) {
            $root_id = 1;
            $parentCategory = null;
        }
        else {
            $parentCategory = $this->category->findById($root_id);
        }
        $features = Feature::orderBy('name')->get();

        return view('admin.pages.categories.create', compact("root_id", "parentCategory", "products", "features"));
    }


    public function store(Request $request)
    {
        $this->category->store($request);

        return redirect('panel/categorias/?root_id='.$request['root_id'])->with('success', 'Categoria agregada correctamente.');
    }


    public function upload(Request $request)
    {
        return $this->category->upload($request);
    }

    public function edit(Request $request, $id)
    {
        $categoria = $this->category->findById($id);
        $root_id = $categoria->root_id;
        $parentCategory = Category::find($root_id);
        $products = $categoria->products->pluck('id', 'name');
        $features = Feature::orderBy('name')->get();
        $categoryFeatures = $categoria->features->pluck('id')->toArray();

        return view('admin.pages.categories.edit', compact("categoria", "root_id", "parentCategory", "products", "features", "categoryFeatures"));
    }


    public function update(Request $request, $id)
    {
        $root_id = $request['root_id'];

        $this->category->update($request, $id);        

        return redirect('panel/categorias/?root_id='.$root_id)->with('info', 'Categoria editada correctamente.');
    }

    
    public function destroy($id)
    {
        $categoria = $this->category->findById($id);

        $this->category->destroy($id);

        return redirect('panel/categorias/?root_id='.$categoria->root_id)->with('danger', 'Categoria eliminada correctamente.');
    }

    public function sort(Request $request){
        $this->category->sort($request);
    }

}
