<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Page;
use Noblex\Template;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\Interfaces\PageInterface;

class PageController extends Controller
{
    protected $page;

    // Las interfaces no se pueden instanciar. 
        
    /* App/Providers/ServiceProvider.php definimos un bind para decirle a Laravel que cuando intentemos instanciar la interface,
     * automaticamente nos devuelva una instancia del objeto EloquentCategory.
     */
    public function __construct(PageInterface $page)
    {
        $this->middleware('auth');
        $this->page = $page;
    }


    public function index(Request $request)
    {
        $pages = $this->page->getAll();

        return view('admin.pages.pages.index', compact("pages"));
    }


    public function create(Request $request)
    {
        $templates = Template::orderBy('name')->get();

        return view('admin.pages.pages.create', compact("templates"));
    }


    public function store(Request $request)
    {
        $this->page->store($request);

        return redirect('panel/pages')->with('success', 'Página agregada correctamente.');
    }


    public function upload(Request $request)
    {
        return $this->page->upload($request);
    }

    public function edit(Request $request, $id)
    {
        $page = $this->page->findById($id);
        $templates = Template::orderBy('name')->get();

        return view('admin.pages.pages.edit', compact("page", "templates"));
    }


    public function update(Request $request, $id)
    {
        $this->page->update($request, $id);        

        return redirect('panel/pages')->with('info', 'Página editada correctamente.');
    }

    
    public function destroy($id)
    {
        $this->page->destroy($id);

        return redirect('panel/pages')->with('danger', 'Página eliminada correctamente.');
    }

    public function sort(Request $request){
        $this->page->sort($request);
    }


}
