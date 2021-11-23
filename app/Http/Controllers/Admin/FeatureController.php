<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\Interfaces\FeatureInterface;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    private $feature;

    public function __construct(FeatureInterface $feature)
    {
        $this->middleware('auth');
        $this->feature = $feature;
    }


    public function index()
    {
        $features = $this->feature->getAll();

        return view('admin.pages.features.index', compact("features")); 
    }


    public function create()
    {
        return view('admin.pages.features.create');
    }


    public function store(Request $request)
    {
        return $this->feature->store($request);
    }

    public function upload(Request $request)
    {
        return $this->feature->upload($request);
    }


    public function edit($id)
    {
        $feature = $this->feature->findById($id);

        return view('admin.pages.features.edit', compact("feature"));
    }


    public function update(Request $request, $id)
    {
        $this->feature->update($request, $id);        

        return redirect('panel/features')->with('success', 'Feature editado correctamente.');
    }


    public function destroy($id)
    {
        $this->feature->destroy($id);

        return redirect()->route('admin.features.index')->with('danger', 'Feature eliminada correctamente.');
    }

    public function destroyImage(Request $request)
    {
        Storage::disk('public')->delete($request->image);
    }
}
