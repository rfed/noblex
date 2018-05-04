<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Http\Requests\ProductStoreRequest;
use Noblex\Product;
use Noblex\Attribute;
use Noblex\Group;
use Noblex\ProductMedia;
use Noblex\Repositories\EloquentBrand;
use Noblex\Repositories\EloquentCategory;
use Noblex\Repositories\EloquentFeature;
use Noblex\Repositories\Interfaces\ProductInterface;
use Noblex\Repositories\Interfaces\AttributeInterface;

class ProductController extends Controller
{
    private $product;
    private $attribute;

    public function __construct(ProductInterface $product, AttributeInterface $attribute)
    {
        $this->middleware('auth');
        $this->product = $product;
        $this->attribute = $attribute;
    }


    public function index()
    {
        $productos = $this->product->getAll();

        return view('admin.pages.products.index', compact("productos"));
    }

    public function listProductsWithManual()
    {
        $productos = $this->product->getAllWithManualAndActive();

        return view('admin.pages.manuales.index', compact("productos"));
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

        return redirect()->route('admin.productos.edit', $product);
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

        $attributes = Attribute::whereNull('attributegroup_id')->whereNotIn('id', $producto->attributes->pluck('id'))->get();
        
        $groups = Attribute::DifferentbyGroup($producto->attributes->pluck('id'));

        $currentMedia = [];
        foreach ($producto->productsMedia as $media) {
            switch ($media->type) {
                case 'image_featured': 
                    $currentMedia['image_featured'] = $media->source;
                    break;
                case 'image_featured_background': 
                    $currentMedia['image_featured_background'] = $media->source;
                    break;
                case 'image_thumb': 
                    $currentMedia['image_thumb'] = $media->source;
                    break;
            }
        }

        $tab = request()->get('tab') ? request()->get('tab') : '';

        return view('admin.pages.products.edit', compact("categorias", "brands", "productos", "features", "producto", "categoria", "subcategoria", "currentMedia", "sections", "attributes", "groups","tab"));
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

    public function atributos(Request $request){
        if($request->get('attributes')){
            $product = Product::findOrFail($request->product_id);
            $arr = [];
            foreach($request->get('attributes') as $k => $att){
                \DB::table('attribute_category_product')
                ->where('id', $att['id'])
                ->update(['value' => $att['value']]);

            }
        }
        return response()->json(['success' => true]);
    }

    public function deleteAtributo(Request $request){
        
        //$producto = $this->product->findById($request->producto_id);
        //$producto->attributes()->detach($request->attribute_id);
        \DB::table('attribute_category_product')
        ->where('id', $request->attribute_id)
        ->delete();

        return response()->json(['status' => 'success']);
    }

    public function addAtributos(Request $request){
        $producto = $this->product->findById($request->producto_id);
        $attribute = Attribute::find($request->attribute_id);
        $producto->attributes()->attach($attribute);
        $attribute = $producto->attributes()->where('attribute_id',$request->attribute_id)->first();
        if($request->ajax()){
            return response()->json([
                'group' => $attribute->group,
                'attribute' => $attribute,
                'view' => view('admin.pages.products.partials.attribute')->with(['attribute' => $attribute, 'value' => ''])->render()
            ]);
        }else{
            return redirect('panel/productos/'.$producto->id.'/edit#attributes');
        }
    }
}
