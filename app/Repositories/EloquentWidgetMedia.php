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

	public function store($request)
	{
		if($request->ajax())
        {

            $widgetMedia = $request->all();

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
                $last = WidgetMedia::where('widget_id', $widgetMedia['widget_id'])->orderBy('position', 'desc')->first();
                $widgetMedia['position'] = $last ? $last->position + 1 : 0;
            }
            // if(!$request->get('source'))
            //     $widgetMedia['source'] = '';

            // if(!$request->get('title'))
            //     $widgetMedia['title'] = '';

            // if(!$request->get('description'))
            //     $widgetMedia['description'] = '';
            
            // if(!$request->get('link'))
            //     $widgetMedia['description'] = '';

            if($request->get('id')){
                $med = WidgetMedia::find($request->get('id'));
                $med->update($widgetMedia);
            }else{
                $med = WidgetMedia::create($widgetMedia);
            }
            

            return $med;
        }
    }
    
    public function destroy($id){
        $media = WidgetMedia::findOrFail($id);
        return $media->delete() ? 'OK' : '';
    }
}