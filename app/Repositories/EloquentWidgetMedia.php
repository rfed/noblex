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
            if($request->get('media_id')){
                $widgetMedia = WidgetMedia::find($request->get('media_id'));
            }else{
                $widgetMedia = new WidgetMedia;
            }
            $widgetMedia->widget_id = request()->get('widget_id');

            if(!empty($request->file('image'))) {

                $file = $request->file('image')->store('widgets', 'public');
                $widgetMedia->type = 'image';
                $widgetMedia->source = $file;
            }

            if(!empty($request->file('video'))) {
                $file = $request->file('video')->store('widgets', 'public');
                $widgetMedia->type = 'video';
                $widgetMedia->source = $file;
            }

            if(!$request->get('position')){
                $widgetMedia->position = 0;
            }
            
            $widgetMedia->save();
        }
    }
    
    public function destroy($id){
        $media = WidgetMedia::findOrFail($id);
        return $media->delete() ? 'OK' : '';
    }
}