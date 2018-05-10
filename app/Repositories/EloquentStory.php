<?php

namespace Noblex\Repositories;

use Noblex\Story;
use Noblex\Theme;
use Noblex\Tag;
use Noblex\Repositories\Interfaces\StoryInterface;

class EloquentStory implements StoryInterface
{
	public function getAll() 
	{
		return Story::orderBy('date', 'DESC')->get();
	}

	public function findById($id) 
	{
        return Story::findOrFail($id);
	}

	public function store($request) 
	{
		$data = request()->validate([
            'title'    => 'required',
            'url'     => 'nullable',
            'subtitle' => 'required',
            'content' => 'required',
            'image' => 'nullable',
            'theme_id' => 'required'
            //'date' => 'required'
        ]);

        if($data['url'] == null) 
            $data['url'] = str_slug($data['name']);
        else
            $data['url'] = str_slug($data['url']);

        if($request->input('visible') == 'on')
            $data['visible'] = 1;
        else
            $data['visible'] = 0;
        
		Story::create($data);
	}


	public function update($request, $id) 
	{

		$data = request()->validate([
            'title'    => 'required',
            'url'     => 'nullable',
            'subtitle' => 'required',
            'content' => 'required',
            'image' => 'nullable',
            //'date' => 'required',
            'theme_id' => 'required'
        ]);

        if($data['url'] == null) 
            $data['url'] = str_slug($data['name']);
        else
            $data['url'] = str_slug($data['url']);

        if($request->input('visible') == 'on')
            $data['visible'] = 1;
        else
        	$data['visible'] = 0;
        
        $story = Story::findOrFail($id);
        $story->update($data);
        
        //$categoria->features()->sync($request['features']);
	}

    public function upload($request) 
    {
        if(!empty(request()->file('image'))) {
            return $request->file('image')->store('categories', 'public');
        }
    }    


	public function destroy($id) 
	{
		$story = Story::findOrFail($id);

        $story->delete();
	}
}