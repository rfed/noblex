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
		
		$data['active'] = @$data['active'] == 'on' ?1:0;
		$data['features'] = @$data['features'] == 'on' ?1:0;
		$data['show_prods'] = @$data['show_prods'] == 'on' ?1:0;
		$data['home'] = @$data['home'] == 'on' ?1:0;
		
		if(!$data['position']){
			$last = Widget::orderBy('position', 'desc')->first();
			$data['position'] = $last ? $last->position + 1 : 0;
		}

		$widget = Widget::create($data);
		
		if($widget->type == 1){
			
			WidgetMedia::create([
				'widget_id' => $widget->id,
				'type' => 'image',
				'position' => 0
			]);

			for($i = 0; $i < 3; $i++){
				WidgetMedia::create([
					'widget_id' => $widget->id,
					'type' => 'video',
					'position' => $i + 1
				]);
			}
		}

		return $widget;
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

		$data['active'] = @$data['active'] == 'on' ?1:0;
		$data['features'] = @$data['features'] == 'on' ?1:0;
		$data['show_prods'] = @$data['show_prods'] == 'on' ?1:0;
		$data['home'] = @$data['home'] == 'on' ?1:0;

		$widget = Widget::findOrFail($id);
		
		if($request->get('change-type')){
			
			WidgetMedia::where('widget_id', $widget->id)->delete();
			$data['active'] = 0;
			for($i = 0; $i < \Config::get('widgets.types')[$data['type']]['files'] ; $i++){
				WidgetMedia::create([
					'widget_id' => $widget->id,
					'position' => $i,
				]);
			}
		}
		
		$widget->update($data);
		return $widget;
	}


	public function destroy($id) 
	{
		$widget = Widget::findOrFail($id);
        $widget->delete();
	}
}