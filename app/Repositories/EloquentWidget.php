<?php

namespace Noblex\Repositories;

use Noblex\Widget;
use Noblex\WidgetMedia;

use Noblex\Repositories\Interfaces\WidgetInterface;

class EloquentWidget implements WidgetInterface
{
	public function getAll() 
	{
		return Widget::orderBy('position', 'asc')->get();
	}

	public function ordenar($request) 
	{
		if($request->ajax() && $request->get('widgets'))
        {
			foreach($request->get('widgets') as $data){
				$widget = Widget::findOrFail($data['id']);
				$widget->update($data);
			}
		}
	}
	

	public function findById($id) 
	{
        return Widget::findOrFail($id);
	}


	public function store($request) 
	{
		$data = request()->validate([
            'title'    => 'nullable',
            'description'       => 'nullable',
            'btn_text' => 'nullable',
            'url' => 'nullable',
			'show_prods' => 'nullable',
			'position' => 'nullable',
			'type' => 'required',
			'category_id' => 'nullable'
		]);
		
		if($request->input('active') == 'on')
            $data['active'] = 1;
        else
			$data['active'] = 0;
		
		if($request->input('show_prods') == 'on')
            $data['show_prods'] = 1;
        else
        	$data['show_prods'] = 0;
		
		if(!array_key_exists('position', $data))
			$data['position'] = 0;

		
		return Widget::create($data);
	}


	public function update($request, $id) 
	{

		$data = request()->validate([
			'title'    => 'nullable',
			'type' => 'required',
            'description'       => 'nullable',
            'btn_text' => 'nullable',
            'url' => 'nullable',
            'category_id' => 'nullable',
            'show_prods' => 'nullable'
		]);
		
		if($request->input('active') == 'on')
            $data['active'] = 1;
        else
			$data['active'] = 0;
		
		if($request->input('show_prods') == 'on')
            $data['show_prods'] = 1;
        else
        	$data['show_prods'] = 0;
		
		if(!array_key_exists('position', $data)) 
			$data['position'] = 0;

		$widget = Widget::findOrFail($id);
		$widget->update($data);

		if($request->get('change-type')){
			WidgetMedia::where('widget_id', $widget->id)->delete();
		}

		return $widget;
	}


	public function destroy($id) 
	{
		$widget = Widget::findOrFail($id);
        $widget->delete();
	}
}