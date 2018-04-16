<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Noblex\Brand;
use Noblex\Category;
use Noblex\Http\Controllers\Controller;
use Noblex\Product;
use Noblex\Repositories\CacheBrand;
use Noblex\Repositories\CacheCategory;
use Noblex\Http\Requests\ProductStoreRequest;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.pages.productos.index');
    }


    public function create(CacheCategory $category, CacheBrand $brand)
    {
        $categorias = $category->getAll();
        $brands = $brand->getAll();

        return view('admin.pages.productos.create', compact("categorias", "brands"));
    }


    public function store(ProductStoreRequest $request)
    {
        Product::create($request->validated());
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
