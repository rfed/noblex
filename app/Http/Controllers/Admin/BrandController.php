<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\Interfaces\BrandInterface;

class BrandController extends Controller
{
    private $brand;

    public function __construct(BrandInterface $brand)
    {
        $this->middleware('auth');
        $this->brand = $brand;
    }


    public function index()
    {
        $brands = $this->brand->getAll();

        return view('admin.pages.brands.index', compact("brands")); 
    }


    public function create()
    {
        return view('admin.pages.brands.create');
    }


    public function store(Request $request)
    {
        $this->brand->store($request);

        return redirect()->route('admin.brands.index')->with('success', 'Marca agregada correctamente.');;
    }


    public function edit($id)
    {
        $brand = $this->brand->findById($id);

        return view('admin.pages.brands.edit', compact("brand"));
    }


    public function update(Request $request, $id)
    {
        $this->brand->update($request, $id);

        return redirect()->route('admin.brands.index')->with('info', 'Marca editada correctamente.');
    }


    public function destroy($id)
    {
        $this->brand->destroy($id);

        return redirect()->route('admin.brands.index')->with('danger', 'Marca eliminada correctamente.');
    }
}
