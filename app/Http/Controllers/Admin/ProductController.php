<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Http\Requests\ProductStoreRequest;
use Noblex\Product;
use Noblex\ProductMedia;
use Noblex\Repositories\CacheBrand;
use Noblex\Repositories\CacheCategory;
use Noblex\Repositories\Interfaces\ProductInterface;


class ProductController extends Controller
{
    private $product;

    public function __construct(ProductInterface $product)
    {
        $this->middleware('auth');
        $this->product = $product;
    }


    public function index()
    {
        $productos = $this->product->getAll();

        return view('admin.pages.products.index', compact("productos"));
    }


    public function create(CacheCategory $category, CacheBrand $brand)
    {
        $categorias = $category->getAll();
        $brands = $brand->getAll();
        $productos = $this->product->getAll();

        return view('admin.pages.products.create', compact("categorias", "brands", "productos"));
    }


    public function store(ProductStoreRequest $request)
    {
        $product = $this->product->store($request);

        return redirect()->route('admin.productos.files.create', $product);
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
