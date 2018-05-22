<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Http\Requests\ProductStoreRequest;
use Noblex\Category;
use Noblex\Product;
use Noblex\Feature;
use Noblex\Attribute;
use Noblex\Group;
use Noblex\ProductMedia;
use Noblex\Repositories\EloquentBrand;
use Noblex\Repositories\EloquentCategory;
use Noblex\Repositories\EloquentFeature;
use Noblex\Repositories\Interfaces\ProductInterface;
use Noblex\Repositories\Interfaces\AttributeInterface;
use Maatwebsite\Excel\Facades\Excel;
use Image;

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

    public function destroyManual(Product $product)
    {
        return $this->product->destroyManual($product);
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
        
        $producto = $this->product->findById($request->producto_id);
        $producto->attributes()->detach($request->attribute_id);
        /*
        \DB::table('attribute_category_product')
        ->where('attribute_id', $request->attribute_id)
        ->where('product_id', $request->product_id)
        ->delete();
        */
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

    public function importForm() {
        return view('admin.pages.products.import');
    }

    public function import(Request $request) {
        $file = $request->file('file');

        $fields = ['nombre', 'subtitulo', 'slug', 'sku', 'marca', 'categoria', 'subcategoria', 'descripcion', 'activo', 'destacado', 'foto_1', 'foto_2', 'foto_3', 'foto_4', 'foto_5', 'foto_6', 'ficha', 'manual', 'foto_preview', 'foto_promocional', 'back_promocional', 'cucarda', 'features_promocional', 'mas_features', 'bloque1_titulo', 'bloque1_subtitulo', 'bloque1_texto', 'bloque1_imagen', 'bloque1_alineacion', 'bloque2_titulo', 'bloque2_subtitulo', 'bloque2_texto', 'bloque2_imagen', 'bloque2_alineacion', 'bloque3_titulo', 'bloque3_subtitulo', 'bloque3_texto', 'bloque3_imagen', 'bloque3_alineacion', 'bloque4_titulo', 'bloque4_subtitulo', 'bloque4_texto', 'bloque4_imagen', 'bloque4_alineacion'];

        $importedProducts = [];

        $results = Excel::load($file, function($reader) use($fields, &$importedProducts) {
 
            $importedProducts = [];
            foreach ($reader->toArray() as $rows) {

                foreach ($rows as $row) {
                    $data = [];
                    $attributes = [];
                    $features = [];
                    $mas_features = [];
                    $media = [];

                    foreach ($row as $key=>$value) {
                        if (in_array(strtolower($key), $fields)) {
                            
                            switch ($key) {
                                case 'nombre':
                                    $data['name'] = $value;
                                    break;
                                case 'subtitulo':
                                    $data['short_description'] = $value;
                                    break;
                                case 'slug':
                                    $data['url'] = $value;
                                    break;
                                case 'sku':
                                    $data['sku'] = $value;
                                    break;
                                case 'marca':
                                    $data['brand_id'] = 1; // NOBLEX
                                    break;
                                case 'categoria':
                                case 'subcategoria':
                                    $category = Category::where('name', $value)->first();
                                    if ($category) {
                                        $data['category_id'] = $category->id;
                                    }
                                    break;
                                case 'descripcion':
                                    $data['description'] = $value;
                                    break;
                                case 'activo':
                                    $data['active'] = ($value == '1' || strtolower($value) == 'si') ? 1 : 0;
                                    break;
                                case 'destacado':
                                    $data['featured'] = ($value == '1' || strtolower($value) == 'si') ? 1 : 0;
                                    break;
                                case 'foto_1':
                                case 'foto_2':
                                case 'foto_3':
                                case 'foto_4':
                                case 'foto_5':
                                case 'foto_6':
                                    //TODO
                                    break;
                                case 'ficha':
                                    $ficha_rows = explode("\n", $value);
                                    foreach ($ficha_rows as $ficha_row) {
                                        $ficha_data = explode(":", $ficha_row);
                                        if (count($ficha_data)==2) {
                                            $attribute_name = trim($ficha_data[0]);
                                            $attribute_value = trim($ficha_data[1]);

                                            $attribute = Attribute::where('name', $attribute_name)->first();
                                            if (!$attribute) {
                                                $attribute = Attribute::create([
                                                    'name' => $attribute_name
                                                ]);
                                            }
                                            $attributes[] = ['attribute_id' => $attribute->id, 'value' => $attribute_value];
                                        }
                                    }
                                    break;
                                case 'manual':
                                    //TODO
                                    break;
                                case 'foto_preview':
                                    if ($value) {
                                        try {
                                            $filename = basename($value);
                                            $image = Image::make($value)->resize(331, 210);
                                            \Storage::put('productos/'.$filename, $image);
                                            $media['image_thumb'] = 'productos/'.$filename;
                                        }
                                        catch (Exception $e){
                                        }
                                    }
                                    break;
                                case 'foto_promocional':
                                    //TODO
                                    break;
                                case 'back_promocional':
                                    //TODO
                                    break;
                                case 'cucarda':
                                    $data['tag'] = $value;
                                    break;
                                case 'features_promocional':
                                    $features_list = explode(",", $value);
                                    foreach ($features_list as $feature_name) {
                                        $feature = Feature::where('name', $feature_name)->first();
                                        if (!$feature) {
                                            $feature = Feature::create([
                                                'name' => $feature_name
                                            ]);
                                        }
                                        $features[] = $feature->id;
                                    }
                                    break;
                                case 'mas_features':
                                    $features_list = explode(",", $value);
                                    foreach ($features_list as $feature_name) {
                                        $feature = Feature::where('name', $feature_name)->first();
                                        if (!$feature) {
                                            $feature = Feature::create([
                                                'name' => $feature_name
                                            ]);
                                        }
                                        $mas_features[] = $feature->id;
                                    }
                                    break;
                                case 'bloque1_titulo':
                                    $blocks['position_1']['title'] = $value;
                                    break;
                                case 'bloque1_subtitulo':
                                    $blocks['position_1']['subtitle'] = $value;
                                    break;
                                case 'bloque1_texto':
                                    $blocks['position_1']['description'] = $value;
                                    break;
                                case 'bloque1_imagen':
                                    $blocks['position_1']['source'] = $value;
                                    break;
                                case 'bloque1_alineacion':
                                    $blocks['position_1']['alignment'] = $value;
                                    break;
                                case 'bloque2_titulo':
                                    $blocks['position_2']['title'] = $value;
                                    break;
                                case 'bloque2_subtitulo':
                                    $blocks['position_2']['subtitle'] = $value;
                                    break;
                                case 'bloque2_texto':
                                    $blocks['position_2']['description'] = $value;
                                    break;
                                case 'bloque2_imagen':
                                    $blocks['position_2']['source'] = $value;
                                    break;
                                case 'bloque2_alineacion':
                                    $blocks['position_2']['alignment'] = $value;
                                    break;
                                case 'bloque3_titulo':
                                    $blocks['position_3']['title'] = $value;
                                    break;
                                case 'bloque3_subtitulo':
                                    $blocks['position_3']['subtitle'] = $value;
                                    break;
                                case 'bloque3_texto':
                                    $blocks['position_3']['description'] = $value;
                                    break;
                                case 'bloque3_imagen':
                                    $blocks['position_3']['source'] = $value;
                                    break;
                                case 'bloque3_alineacion':
                                    $blocks['position_3']['alignment'] = $value;
                                    break;
                                case 'bloque4_titulo':
                                    $blocks['position_4']['title'] = $value;
                                    break;
                                case 'bloque4_subtitulo':
                                    $blocks['position_4']['subtitle'] = $value;
                                    break;
                                case 'bloque4_texto':
                                    $blocks['position_4']['description'] = $value;
                                    break;
                                case 'bloque4_imagen':
                                    $blocks['position_4']['source'] = $value;
                                    break;
                                case 'bloque4_alineacion':
                                    $blocks['position_4']['alignment'] = $value;
                                    break;
                            }
                            
                        }
                        
                    }

                    $product = Product::where('sku', $data['sku'])->first();
                    if ($product) {
                        $product->fill($data);
                        $product->save();
                    }
                    else {
                        $product = Product::create($data);
                    }

                    $product->features()->sync($features);

                    $row = \DB::table('attribute_category_product')
                        ->where('product_id', $product->id)
                        ->delete();
                    foreach($attributes as $attribute){
                        \DB::table('attribute_category_product')
                            ->insert(['product_id' => $product->id, 'attribute_id' => $attribute['attribute_id'], 'value' => $attribute['value']]);
                    }

                    foreach ($media as $mediaType=>$mediaValue) {
                        ProductMedia::where('product_id', $product->id)->where('type', $mediaType)->delete();

                        $productMedia = new ProductMedia;
                        $productMedia->product_id = $product->id;
                        $productMedia->type = $mediaType;
                        $productMedia->source = $mediaValue;
                        $productMedia->position = 1;
                        $productMedia->save();
                    }

                    $result = 'Producto importado con advertencias: No pudieron descargarse todas las imagenes';
                    $importedProducts[$product->sku] = $result;
                }

            }
        });

        return view('admin.pages.products.import_result', compact('importedProducts'));
    }

    public function downloadImportModel() {
        return \Storage::download('public/modelo-importacion.xlsx');
    }

    public function downloadImportGuide() {
        return \Storage::download('public/guia-importacion.docx');
    }
}
