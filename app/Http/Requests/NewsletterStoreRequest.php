<?php

namespace Noblex\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterStoreRequest extends FormRequest
{
    /*public $validator = null;*/

    // Redireccionar a la url si falla la validacion.
    protected $redirect = '#newsletter';

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
            'name'                  => 'required|max:100',
            'email'                 => 'required|max:200|email|unique:newsletters,email',
            'g-recaptcha-response'  => 'required|captcha'
        ];
    }

    /*protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }*/
}
