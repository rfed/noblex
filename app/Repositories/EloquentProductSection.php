<?php

namespace Noblex\Repositories;

use Noblex\ProductSection;

class EloquentProductSection
{
	public function store($product, $request)
	{
        $rules = array(
            'title'        			=> 'required',
            'subtitle'        		=> 'required',
            'description'            => 'required',
            'aligment'        		=> 'required'
        );

        $validator = \Validator::make($request->all(), $rules);  // Validacion

        if($validator->fails())
        {
            return \Response::json([
                'errorValidation'  => $validator->errors()
            ]);
        }
        
        if ($request->id) {
            $productSection = ProductSection::findOrFail($request->id);
        }else{
            $productSection = new ProductSection();
        }
        $productSection->product_id = $product;
        
        $productSection->position = $request->position;
        $productSection->title = $request->title;
        $productSection->subtitle = $request->subtitle;
        $productSection->description = $request->description;
        $productSection->alignment = $request->alignment;
        $productSection->source = $request->image;
        $productSection->position = $request->position ? $request->position : 0;

        $productSection->save();

        return $productSection;
	}

    public function upload($product, $request)
    {
        if(!empty($request->file('image1')))
            return $request->file('image1')->store('sectionproducts', 'public');

        if(!empty($request->file('image2')))
            return $request->file('image2')->store('sectionproducts', 'public');

        if(!empty($request->file('image3')))
            return $request->file('image3')->store('sectionproducts', 'public');

        if(!empty($request->file('image4')))
            return $request->file('image4')->store('sectionproducts', 'public');
    }

    public function destroy($id){
        ProductSection::findorFail($id)->delete();
        return 'OK';
    }

}