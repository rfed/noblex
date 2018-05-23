<?php

namespace Noblex\Repositories;

use Illuminate\Support\Facades\Storage;
use Noblex\Category;
use Noblex\InfoInteres;
use Noblex\Repositories\Interfaces\CategoryInterface;

class EloquentCategory implements CategoryInterface
{
	public function getAll($root_id=0) 
	{
		return Category::where('root_id', $root_id)->orderBy('position', 'ASC')->get();
	}

    public function sort($request) 
    {
        if($request->ajax() && $request->get('categories'))
        {
            foreach($request->get('categories') as $data){
                $category = Category::findOrFail($data['id']);
                $category->update($data);
            }
        }
    }

    public function getAllDistinctRaiz()
    {
        return Category::where('root_id', 1)->get();
    }
    

    public function getSubcategories($category)
    {
        return Category::where('root_id', $category)
                        ->where('name', '!=', 'Raiz')->get();
    }
	

	public function findById($id) 
	{
        return Category::findOrFail($id);
	}


	public function store($request) 
	{
		$data = request()->validate([
            'name'    => 'required',
            'url'     => 'required',
            'root_id' => 'required',
            'feautured_product' => 'nullable',
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required',
            'banner' => 'nullable',
            'banner_link' => 'nullable',
            'banner_target' => 'nullable',
        ]);

        if($data['url'] == null) 
            $data['url'] = str_slug($data['name']);
        else
            $data['url'] = str_slug($data['url']);

        if($request->input('visible') == 'on')
            $data['visible'] = 1;
        else
            $data['visible'] = 0;
        
        if($request->input('menu') == 'on')
            $data['menu'] = 1;
        else
            $data['menu'] = 0;

		Category::create($data);
	}


	public function update($request, $id) 
	{

		$data = request()->validate([
            'name'    => 'required',
            'url'       => 'required',
            'feautured_product' => 'nullable',
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required',
            'banner' => 'nullable',
            'banner_link' => 'nullable',
            'banner_target' => 'nullable',
        ]);

        if($data['url'] == null) 
            $data['url'] = str_slug($data['name']);
        else
            $data['url'] = str_slug($data['url']);

        if($request->input('visible') == 'on')
            $data['visible'] = 1;
        else
        	$data['visible'] = 0;
        
        if($request->input('menu') == 'on')
            $data['menu'] = 1;
        else
            $data['menu'] = 0;

        $categoria = Category::findOrFail($id);
        $categoria->update($data);
        
        if($request['info']){
            foreach($request['info'] as $info){
                if(array_key_exists('id', $info)){
                    $_info = InfoInteres::findOrFail($info['id']);
                    $_info->update($info);
                }else{
                    $info['category_id'] = $categoria->id;
                    InfoInteres::create($info);
                }
            }
        }

        if ($request['info_deleted']) {
            foreach ($request['info_deleted'] as $info_id) {
                if (!empty($info_id)) {
                    $_info = InfoInteres::findOrFail($info_id);
                    $_info->delete();
                }
            }
        }

        $categoria->features()->sync($request['features']);
	}

    public function upload($request) 
    {
        if(!empty(request()->file('image'))) {
            return $request->file('image')->store('categories', 'public');
        }
        if(!empty(request()->file('banner'))) {
            return $request->file('banner')->store('categories', 'public');
        }
    }    

    public function destroyImage($request) 
    {
        Storage::disk('public')->delete($request->image);

        return response()->json(['delete' => true]);
    }    


	public function destroy($id) 
	{
		$categoria = Category::findOrFail($id);

        $categoria->delete();

        $subcategorias = Category::where('root_id', $id);

        $subcategorias->delete();
	}
}