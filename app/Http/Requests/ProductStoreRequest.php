<?php

namespace Noblex\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'sku'               => 'required_without:id|max:30|unique:products,sku,'.$this->id,
            'name'              => 'required|max:100',
            'brand_id'          => 'required',
            'category_id'       => 'required',
            'short_description' => 'required|max:200',
            'description'       => 'required'
        ];

        
    }

    public function attributes()
    {
        return [
            'brand_id'          => 'marca',
            'category_id'       => 'categoria',
            'short_description' => 'descripción corta',
            'description'       => 'descripción'
        ];
    }
}
