<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Http\Requests\ProductStoreRequest;
use Noblex\Product;
use Noblex\ProductMedia;
use Noblex\Repositories\EloquentBrand;
use Noblex\Repositories\EloquentCategory;
use Noblex\Repositories\EloquentFeature;
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


    public function create(EloquentCategory $category, EloquentBrand $brand, EloquentFeature $feature)
    {
        $categorias = $category->getAllDistinctRaiz();
        $brands = $brand->getAll();
        $productos = $this->product->getAll();
        $features = $feature->getAll();

        return view('admin.pages.products.create', compact("categorias", "brands", "productos", "features"));
    }


    public function store(ProductStoreRequest $request)
    {
        $product = $this->product->store($request);

        return redirect()->route('admin.productos.files.create', $product);
    }


    public function edit(EloquentCategory $category, EloquentBrand $brand, EloquentFeature $feature, $id)
    {
        $producto = $this->product->findById($id);
        $categorias = $category->getAllDistinctRaiz();
        $brands = $brand->getAll();
        $productos = $this->product->getAll();
        $features = $feature->getAll();

        return view('admin.pages.products.edit', compact("categorias", "brands", "productos", "features", "producto"));
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
