<?php

namespace Noblex\Repositories;

use Illuminate\Support\Facades\Storage;
use Noblex\WidgetMedia;
use Noblex\Widget;
use Noblex\Repositories\Interfaces\WidgetMediaInterface;

class EloquentWidgetMedia implements WidgetMediaInterface
{
    public function findById($id){
        
        return WidgetMedia::findOrFail($id);
    }

	public function upload($request){
        
        if(!empty($request->file('file'))) {
            $file = $request->file('file')->store('widgets', 'public');
            return ['source' => $file];
        }
        return '';
    }

	public function create($request)
	{
       
		if($request->ajax())
        {
            
            $widgetMedia = request()->validate([
                'source'    		=> 'nullable',
                'title'    		=> 'nullable|max:50',
                'description'	=> 'nullable|max:100',
                'link' 			=> 'nullable',
                'type'          => 'nullable',
                'subtitle'      => 'nullable',
                'position'      => 'nullable',
            ]);

            $widget = Widget::find($request->widget_id);
            
            if(!empty($request->file('image'))) {
                
                $file = $request->file('image')->store('widgets', 'public');
                $widgetMedia['source'] = $file;
                
            }

            if(!$request->get('position')){
                $last = WidgetMedia::where('widget_id', $request->get('widget_id'))->orderBy('position', 'desc')->first();
                $widgetMedia['position'] = $last ? $last->position + 1 : 0;
            }else{
                $widgetMedia['position'] = $request->get('position');
            }

            $widgetMedia['subtitle'] = !$request->get('subtitle') ? !$request->get('subtitle') : '';

            

            if($request->get('id')){
                $med = WidgetMedia::find($request->get('id'));
                $med->update($widgetMedia);
            }else{
                $widgetMedia['widget_id'] = $widget->id;
                $med = WidgetMedia::create($widgetMedia);
            }
            

            return $med;
        }
    }

    public function insert($data){
       
        $media = WidgetMedia::create($data);
        return $media;
    }

    public function update($data, $id){
        
        $link = array_key_exists('link', $data) && $data['link'] !== '' ? $data['link'] : null;

        
        if(array_key_exists('file', $data)) {
            
            $file = $data['file']->store('widgets', 'public');
            //$data['type'] = 'image';
            $data['source'] = $file;
            
        }


        $target = @$data['type'] == 'image' ? array_key_exists('link_target', $data) ? $data['link_target']. "|" : '_self' : '';

        $data['link'] = $link ? $target  . $data['link'] : null;

        $media = $this->findById($id);
        $media->update($data);
        return $media;
    }
    
    public function destroy($id){
        $media = $this->findById($id);
        return $media->delete() ? 'OK' : '';
    }
}