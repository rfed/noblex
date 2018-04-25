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
use Noblex\Repositories\Interfaces\AttributeInterface;

class ProductController extends Controller
{
    private $product;
    private $atribute;

    public function __construct(ProductInterface $product, AttributeInterface $atribute)
    {
        $this->middleware('auth');
        $this->product = $product;
        $this->atribute = $atribute;
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

        $categoria = $producto->category ? $producto->category->root_id == 1 ?$producto->category : $producto->category->parent : null;

        $subcategoria = $producto->category->root_id == 1 ? null : $producto->category;

        $sections = $producto->sectionproducts->sortBy('position')->toArray();

        $brands = $brand->getAll();
        $productos = $this->product->getAll();
        $features = $feature->getAll();

        $atributes = $this->atribute->getAll();

        dd($atributes);

        // $currentMedia = [];
        // foreach ($producto->productsMedia as $media) {
        //     switch ($media->type) {
        //         case 'image_featured': 
        //             $currentMedia['image_featured'] = $media->source;
        //             break;
        //         case 'image_featured_background': 
        //             $currentMedia['image_featured_background'] = $media->source;
        //             break;
        //         case 'image_thumb': 
        //             $currentMedia['image_thumb'] = $media->source;
        //             break;
        //     }
        // }

        return view('admin.pages.products.edit', compact("categorias", "brands", "productos", "features", "producto", "categoria", "subcategoria", "currentMedia", "sections"));
    }


    public function update(ProductStoreRequest $request, $id)
    {
        $product = $this->product->update($request, $id);

        return redirect()->route('admin.productos.index');
    }


    public function destroy($id)
    {
        $producto = $this->product->findById($id);
        $producto->destroy($id);

        return redirect()->route('admin.productos.index');
    }
}
