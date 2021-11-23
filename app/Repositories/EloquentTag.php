<?php 

namespace Noblex\Repositories;

use Noblex\Tag;
use Noblex\Repositories\Interfaces\TagInterface;

class EloquentTag implements TagInterface
{
	public function getAll()
	{
		return Tag::all();
	}


	public function findById($id) 
	{
        return Tag::findOrFail($id);
	}


	public function store($request) 
	{
		$data = $request->validate([
			'name'	=> 'required'
		]);

		Tag::create($data);
	}


	public function update($request, $id) 
	{
		$data = $request->validate([
			'name'	=> 'required'
		]);

		$tag = $this->findById($id);
		$tag->fill($data)->save();
	}


	public function destroy($id) 
	{
		$tag = $this->findById($id);
        $tag->delete();
	}
}