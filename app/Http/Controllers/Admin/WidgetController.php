<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Widget;
use Noblex\Category;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\Interfaces\WidgetInterface;
use Noblex\Repositories\Interfaces\WidgetMediaInterface;

class WidgetController extends Controller
{
    private $widget;
    private $widgetMedia;

    public function __construct(WidgetInterface $widget, WidgetMediaInterface $widgetMedia)
    {
        $this->middleware('auth');
        $this->widget = $widget;
        $this->widgetMedia = $widgetMedia;
    }


    public function index()
    {
        $widgets = $this->widget->getWidgets()->where('type', '!=', 7)->sortBy('position');
        return view('admin.pages.widgets.index', compact("widgets"));
    }


    public function create(Request $request)
    {
        $categoria = null;
        if($request->get('cat')){
            $categoria = Category::find($request->get('cat'));
        }
        $categorias = Category::where('root_id', 1)->orderBy('name')->get();
        $types = \Config::get('widgets.types');
        return view('admin.pages.widgets.create', compact('types', 'categorias', 'categoria'));
    }


    public function store(Request $request)
    {
        $widget = $this->widget->store($request);

        return redirect()->route('admin.widgets.edit', $widget->id);
    }


    public function show(Widget $widget)
    {
        
    }


    public function edit(Widget $widget)
    {
        $categorias = Category::where('root_id', 1)->orderBy('name')->get();
        $types = \Config::get('widgets.types');

        return view('admin.pages.widgets.edit', compact('widget', 'types', 'categorias'));
    }


    public function update(Request $request, $id)
    {
        
        $this->widget->update($request, $id);
        
        if($request->get('change') || $request->get('change-type')){
            return redirect()->route('admin.widgets.edit', $id);
        }

        return redirect()->route('admin.widgets.index');
    }


    public function destroy($id)
    {
        
        $this->widget->destroy($id);

        return redirect()->route('admin.widgets.index')->with('danger', 'Widget eliminada correctamente.');
    }

    public function ordenar(Request $request){
        $this->widget->ordenar($request);
    }

    public function createMedia(Request $request){
        
        if($request->get('id')){
            return $this->widgetMedia->update($request->all(), $request->get('id'));
        }else{
            
            return $this->widgetMedia->upload($request);
        }
    }

    public function deleteMedia($id){
        $widgetMedia = $this->widgetMedia->findById($id);
        return $this->widgetMedia->destroy($id);
    }
}
