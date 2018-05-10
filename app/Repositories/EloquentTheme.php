<?php 

namespace Noblex\Repositories;

use Noblex\Theme;
use Noblex\Repositories\Interfaces\ThemeInterface;

class EloquentTheme implements ThemeInterface
{
	public function getAll()
	{
		return Theme::all();
	}


	public function findById($id) 
	{
        return Theme::findOrFail($id);
	}


	public function store($request) 
	{
		$data = $request->validate([
			'name'	=> 'required'
		]);

		Theme::create($data);
	}


	public function update($request, $id) 
	{
		$data = $request->validate([
			'name'	=> 'required'
		]);

		$theme = $this->findById($id);
		$theme->fill($data)->save();
	}


	public function destroy($id) 
	{
		$theme = $this->findById($id);
        $theme->delete();
	}
}