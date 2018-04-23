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
			'title'    		=> 'nullable|max:80',
			'type' 			=> 'required',
            'description'	=> 'nullable|max:100',
            'active'		=> 'nullable',
            'btn_text' 		=> 'nullable',
            'url' 			=> 'nullable',
            'category_id' 	=> 'nullable',
			'show_prods' 	=> 'nullable',
			'features' 		=> 'nullable',
			'position' 		=> 'nullable',
			'home'			=> 'nullable'
		]);
		
		$data['active'] = $data['active'] == 'on' ?1:0;
		$data['features'] = $data['features'] == 'on' ?1:0;
		$data['show_prods'] = $data['show_prods'] == 'on' ?1:0;
		$data['home'] = $data['home'] == 'on' ?1:0;
		
		if(!$data['position']){
			$last = Widget::orderBy('position', 'desc')->first();
			$data['position'] = $last ? $last->position + 1 : 0;
		}
		
		return Widget::create($data);
	}


	public function update($request, $id) 
	{
		
		$data = request()->validate([
			'title'    		=> 'nullable|max:80',
			'type' 			=> 'required',
            'description'	=> 'nullable|max:100',
            'active'		=> 'nullable',
            'btn_text' 		=> 'nullable',
            'url' 			=> 'nullable',
            'category_id' 	=> 'nullable',
			'show_prods' 	=> 'nullable',
			'features' 		=> 'nullable',
			'position' 		=> 'nullable',
			'home'			=> 'nullable'
		]);

		$data['active'] = $data['active'] == 'on' ?1:0;
		$data['features'] = $data['features'] == 'on' ?1:0;
		$data['show_prods'] = $data['show_prods'] == 'on' ?1:0;
		$data['home'] = $data['home'] == 'on' ?1:0;

		$widget = Widget::findOrFail($id);
		$widget->update($data);

		return $widget;
	}


	public function destroy($id) 
	{
		$widget = Widget::findOrFail($id);
        $widget->delete();
	}
}