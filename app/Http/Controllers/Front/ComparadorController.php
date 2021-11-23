<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Session;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Product;
use \DB;

class ComparadorController extends FrontController
{

    public function index(Request $request)
    {
        $page_id = 'comparador';
        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        $comparador = $_SESSION['comparador'];

        $ids = []; //Product IDs
        $products = []; //Product objects
        $groups = []; //Groups of attributes
        $values = []; //Values of attributes per each product

        foreach ($comparador as $key=>$product_id) {
            $ids[] = $product_id;
            $productResult = Product::where('id', $product_id)->get();
            if ($productResult) {
                $products[] = $productResult[0];
            }
        }

        if (count($products)) {
            //Obtener la categoria en analisis
            $category = $products[0]->category;
            foreach ($products as $product) {
                if ($product->category->id != $category->id) {
                    $category = $product->category;
                    break;
                }
            }        

            $breadcrumbs[] = ['caption' => $category->name, 'link' => url($category->url)];
            $breadcrumbs[] = ['caption' => 'Comparador de productos', 'link' => ''];

            $data = DB::select('select ap.product_id, g.name as attributegroup, a.name as attribute, ap.value
                        from attribute_category_product ap
                        inner join attributes a on a.id = ap.attribute_id
                        left join attributegroups g on g.id = a.attributegroup_id
                        where ap.product_id in ('.implode(",", $ids).')');

            foreach ($data as $row) {
                if ($row->attributegroup == '') {
                    $group_name = "Características";
                }
                else {
                    $group_name = $row->attributegroup;
                }

                if (!isset($groups[$group_name])) {
                    $groups[$group_name] = [];
                }

                if (!isset($groups[$group_name][$row->attribute])) {
                    $groups[$group_name][] = $row->attribute;
                }

                $values[$group_name.'-'.$row->attribute.'-'.$row->product_id] = $row->value;
            }
        }

        return view('front.pages.comparador', compact("page_id", "breadcrumbs", "groups", "values", "products", "category"));
    }


    public function handle(Request $request)
    {
        $id = $request->post('item');
        $error = FALSE;
        $product = Product::where('id', $id)->first();

        if (isset($_SESSION['comparador'])) {
            $comparador = $_SESSION['comparador'];
        }
        else {
            $comparador = [];
        }

        foreach ($comparador as $id_p) {
            $productComparado = Product::where('id', $id_p)->first();

            if ($product->category_id != $productComparado->category_id) {

                if ($productComparado->category->root_id != 1) {
                    if ($product->category->root_id == $productComparado->category->root_id) {
                        $error = FALSE;
                        break;
                    }
                    else {
                        $error = 'No es posible comparar productos de distintas categorías.';        
                    }
                }
                
                $error = 'No es posible comparar productos de distintas categorías.';
                break;
            }
        }

        if ($error === FALSE) {
            if (isset($comparador[$product->sku])) {
                unset($comparador[$product->sku]);
            }
            else {
                if (count($comparador) < 3) {
                    $comparador[$product->sku] = $product->id;
                }
                else {
                    $error = 'No es posible comparar más de tres productos.';
                }
            }

            $_SESSION['comparador'] = $comparador;
        }

        return response()->json([
           'comparar' => (count($comparador)>1) ? true : false,
           'error' => $error
        ]);
    }

}
