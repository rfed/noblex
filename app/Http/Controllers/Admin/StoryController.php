<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Theme;
use Noblex\Tag;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\Interfaces\StoryInterface;

class StoryController extends Controller
{
    protected $category;

    // Las interfaces no se pueden instanciar. 
        
    /* App/Providers/ServiceProvider.php definimos un bind para decirle a Laravel que cuando intentemos instanciar la interface,
     * automaticamente nos devuelva una instancia del objeto EloquentCategory.
     */
    public function __construct(StoryInterface $story)
    {
        $this->middleware('auth');
        $this->story = $story;
    }


    public function index(Request $request)
    {
        $stories = $this->story->getAll();

        return view('admin.pages.stories.index', compact("stories"));
    }


    public function create(Request $request)
    {
        $themes = Theme::orderBy('name')->get();

        return view('admin.pages.stories.create', compact("themes"));
    }


    public function store(Request $request)
    {
        $this->story->store($request);

        return redirect('panel/stories')->with('success', 'Novedad agregada correctamente.');
    }


    public function upload(Request $request)
    {
        return $this->story->upload($request);
    }

    public function edit(Request $request, $id)
    {
        $story = $this->story->findById($id);

        $themes = Theme::orderBy('name')->get();
        //$categoryFeatures = $categoria->features->pluck('id')->toArray();

        return view('admin.pages.stories.edit', compact("story", "themes"));
    }


    public function update(Request $request, $id)
    {
        $this->story->update($request, $id);        

        return redirect('panel/stories')->with('info', 'Novedad editada correctamente.');
    }

    
    public function destroy($id)
    {
        $this->story->destroy($id);

        return redirect('panel/stories')->with('danger', 'Novedad eliminada correctamente.');
    }

}
