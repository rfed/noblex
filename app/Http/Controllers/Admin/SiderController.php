<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Widget;
use Noblex\Category;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\Interfaces\WidgetInterface;
use Noblex\Repositories\Interfaces\WidgetMediaInterface;

class SliderController extends Controller
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
        $widget = $this->widget->slider();
        if(!$widget){
            $widget = Widget::create(['type' => 7, 'home' => 1, 'active' => 0, 'position' => 0]);
        }
        return view('admin.pages.slider.index', compact("widget"));
    }


    public function create(Request $request)
    {
        $categoria = null;
        if($request->get('cat')){
            $categoria = Category::find($request->get('cat'));
        }
        $categorias = Category::all();
        $types = \Config::get('widgets.types');
        return view('admin.pages.widgets.create', compact('types', 'categorias', 'categoria'));
    }


    public function store(Request $request)
    {
        
        $widget = $this->widget->store($request);

        return redirect()->route('admin.slider.index');
    }


    public function update(Request $request, $id)
    {
        $this->widget->update($request, $id);
        
        if($request->get('media')){
            $media = $request->get('media');
			foreach($media as $w_id => $w_data){
				$this->widgetMedia->update($w_data, $w_id);
			}
        }

        return redirect()->route('admin.slider.index');
    }


    public function destroy($id)
    {
        
        return $this->widget->destroy($id);

        return redirect('panel/widgets')->with('danger', 'Widget eliminado correctamente.');
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
