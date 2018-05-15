<?php

namespace Noblex\Repositories;

use Noblex\Page;
use Noblex\Repositories\Interfaces\PageInterface;

class EloquentPage implements PageInterface
{
	public function getAll() 
	{
		return Page::orderBy('title', 'DESC')->get();
	}

	public function findById($id) 
	{
        return Page::findOrFail($id);
	}

	public function store($request) 
	{
		$data = request()->validate([
            'title'    => 'required',
            'url'     => 'nullable',
            'content' => 'required',
            'template_id' => 'required',
        ]);

        if($data['url'] == null) 
            $data['url'] = str_slug($data['name']);
        else
            $data['url'] = str_slug($data['url']);

        if($request->input('visible') == 'on')
            $data['visible'] = 1;
        else
            $data['visible'] = 0;
        
        if($request->input('footer') == 'on')
            $data['footer'] = 1;
        else
            $data['footer'] = 0;
        
		Page::create($data);
	}


	public function update($request, $id) 
	{
		$data = request()->validate([
            'title'    => 'required',
            'url'     => 'nullable',
            'content' => 'required',
            'template_id' => 'required',
        ]);

        if($data['url'] == null) 
            $data['url'] = str_slug($data['name']);
        else
            $data['url'] = str_slug($data['url']);

        if($request->input('visible') == 'on')
            $data['visible'] = 1;
        else
        	$data['visible'] = 0;
        
        if($request->input('footer') == 'on')
            $data['footer'] = 1;
        else
            $data['footer'] = 0;

        $page = Page::findOrFail($id);
        $page->update($data);
	}

    public function upload($request) 
    {
        if(!empty(request()->file('file'))) {
            return response()->json(['location' => '/storage/'.$request->file('file')->store('pages', 'public')]);
        }
    }    

	public function destroy($id) 
	{
		$page = Page::findOrFail($id);

        $page->delete();
	}
}