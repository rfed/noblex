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
            'always'		=> 'nullable',
            'btn_text' 		=> 'nullable',
            'url' 			=> 'nullable',
            'category_id' 	=> 'nullable',
			'show_prods' 	=> 'nullable',
			'features' 		=> 'nullable',
			'position' 		=> 'nullable',
		]);
		
		$data['always'] = @$data['always'] == 'on' ?1:0;
		$data['active'] = @$data['active'] == 'on' ?1:0;
		$data['home'] = @$data['home'] == 'on' ?1:0;
		$data['features'] = @$data['features'] == 'on' ?1:0;
		$data['show_prods'] = @$data['show_prods'] == 'on' ?1:0;
		
		if(!$data['position']){
			$last = Widget::orderBy('position', 'desc')->first();
			$data['position'] = $last ? $last->position + 1 : 0;
		}

		$widget = Widget::create($data);
		
		if($widget->type == 1){
			
			WidgetMedia::create([
				'widget_id' => $widget->id,
				'type' => 'image',
				'position' => 0,
				'subtitle' => ''
			]);

			for($i = 0; $i < 3; $i++){
				WidgetMedia::create([
					'widget_id' => $widget->id,
					'type' => 'video',
					'position' => $i + 1,
					'subtitle' => ''
				]);
			}
		}else{
			$type = \Config::get('widgets.types')[$widget->type];
			for($i = 0; $i < $type['files']; $i++){
				WidgetMedia::create([
					'widget_id' => $widget->id,
					'type' => $type['mime'],
					'position' => $i,
					'subtitle' => ''
				]);
			}
		}

		return $widget;
	}


	public function update($request, $id) 
	{
		
		$data = request()->validate([
			'title'    		=> 'nullable|max:80',
			'type' 			=> 'nullable',
            'description'	=> 'nullable|max:100',
            'active'		=> 'nullable',
            'always'		=> 'nullable',
            'btn_text' 		=> 'nullable',
            'url' 			=> 'nullable',
            'category_id' 	=> 'nullable',
			'show_prods' 	=> 'nullable',
			'features' 		=> 'nullable',
			'position' 		=> 'nullable',
		]);

		$data['always'] = @$data['always'] == 'on' ?1:0;
		$data['active'] = $request->get('active') == 'on' ?1:0;
		$data['home'] = $request->get('home') == 'on' ?1:0;
		$data['features'] = $request->get('features')== 'on' ?1:0;
		$data['show_prods'] = $request->get('show_prods')== 'on' ?1:0;
		
		$widget = Widget::findOrFail($id);
		
		
		if($request->get('change-type')){

			WidgetMedia::where('widget_id', $widget->id)->delete();
			$data['active'] = 0;
			
			if($data['type'] == 1){
				WidgetMedia::create([
					'widget_id' => $widget->id,
					'type' => 'image',
					'position' => 0,
					'subtitle' => ''
				]);
	
				for($i = 0; $i < 3; $i++){
					WidgetMedia::create([
						'widget_id' => $widget->id,
						'type' => 'video',
						'position' => $i + 1,
						'subtitle' => ''
					]);
				}
			}else{
				$type = \Config::get('widgets.types')[$data['type']];
				for($i = 0; $i < $type['files']; $i++){
					WidgetMedia::create([
						'widget_id' => $widget->id,
						'type' => $type['mime'],
						'position' => $i,
						'subtitle' => ''
					]);
				}
			}
		}else{
			if($request->get('media')){
				$media = $request->get('media');
				foreach($media as $w_id => $w_data){
					$w_data['subtitle'] = array_key_exists('subtitle', $w_data) ? $w_data['subtitle'] : '';
					WidgetMedia::find($w_id)->update($w_data);
				}
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

	public function promoboxes(){
		return Widget::where('active', 1)->where('type', 5)
			->orderBy('position', 'asc')->get();
	}

	public function home(){
		$customer = \Auth::guard('customer')->user();
		if ($customer) {
			foreach ($customer->categories as $category) {
				$ids[] = $category->id;
			}

			$widgets = Widget::where('type', '!=', 5)
				->where('active', 1)
				->whereRaw('(category_id in ('.implode(',', $ids).') or always=1)')
				->orderBy('position', 'asc')->get();

			if (!count($widgets)) {
				return Widget::where('type', '!=', 5)
					->where('active', 1)
					->where('home', 1)
					->orderBy('position', 'asc')->get();				
			}
			else {
				return $widgets;
			}
		}
		else {
			return Widget::where('type', '!=', 5)
				->where('active', 1)
				->where('home', 1)
				->orderBy('position', 'asc')->get();
		}
	}

	public function slider(){
		$slider = Widget::where('type', 7)->where('home', 1)->first();
		return $slider;
	}

	public function getWidgets(){
		return Widget::orderBy('position','asc')->get();
	}
}