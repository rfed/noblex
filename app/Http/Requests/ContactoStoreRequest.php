<?php

namespace Noblex\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoStoreRequest extends FormRequest
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
            'firstname'             => 'required',   
            'lastname'              => 'nullable',
            'email'                 => 'required|email',
            'subject_id'            => 'required',
            'message'               => 'required',
            'g-recaptcha-response'  => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'Debés completar este campo',
            'email.email'       => 'Debés ingresar un E-mail válido'
        ];
    }
}
