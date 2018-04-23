<?php

namespace Noblex\Repositories;

use Illuminate\Support\Facades\Storage;
use Noblex\WidgetMedia;
use Noblex\Repositories\Interfaces\WidgetMediaInterface;

class EloquentWidgetMedia implements WidgetMediaInterface
{
    public function findById($id){
        
        return WidgetMedia::findOrFail($id);
    }

	public function upload($request)
	{
		if($request->ajax())
        {

            $widgetMedia = request()->validate([
                'source'    		=> 'nullable',
                'title'    		=> 'nullable|max:50',
                'description'	=> 'nullable|max:100',
                'link' 			=> 'nullable',
            ]);
            

            if(!empty($request->file('image'))) {
                
                $file = $request->file('image')->store('widgets', 'public');
                $widgetMedia['type'] = 'image';
                $widgetMedia['source'] = $file;
                
            }

            if(!empty($request->file('video'))) {
                $file = $request->file('video')->store('widgets', 'public');
                $widgetMedia['type'] = 'video';
                $widgetMedia['source'] = $file;
            }

            if(!$request->get('position')){
                $last = WidgetMedia::where('widget_id', $request->get('widget_id'))->orderBy('position', 'desc')->first();
                $widgetMedia['position'] = $last ? $last->position + 1 : 0;
            }

            if($request->get('id')){
                $med = WidgetMedia::find($request->get('id'));
                $med->update($widgetMedia);
            }else{
                $med = WidgetMedia::create($widgetMedia);
            }
            

            return $med;
        }
    }

    public function create($data){
        $media = WidgetMedia::create($data);
        return $media;
    }

    public function update($data, $id){
        
        $link = array_key_exists('link', $data) && $data['link'] !== '' ? $data['link'] : null;

        $target = array_key_exists('link_target', $data) ? $data['link_target'] : '_self';

        $data['link'] = $link ? $target . "|" . $data['link'] : null;

        if(array_key_exists('image', $data)) {
                
            $file = $data['image']->store('widgets', 'public');
            $data['type'] = 'image';
            $data['source'] = $file;
            
        }

        $media = $this->findById($id);
        $media->update($data);
        return $media;
    }
    
    public function destroy($id){
        $media = $this->findById($id);
        dd($media);
        return $media->delete() ? 'OK' : '';
    }
}