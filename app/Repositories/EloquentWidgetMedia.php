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

    public function update($data, $id){
        
        $media = $this->findById($id);
        return $media->update($data);
    }
    
    public function destroy($id){
        $media = $this->findById($id);
        dd($media);
        return $media->delete() ? 'OK' : '';
    }
}