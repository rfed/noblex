<?php

namespace Noblex\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilUpdateRequest extends FormRequest
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
            'firstname'     => 'required|string|max:100',
            'lastname'      => 'required|string|max:100',
            'email'         => 'required|string|email|max:191|unique:customers,email,'.$this->customer_id,
            'password'      => 'nullable|string|min:6|confirmed',
            'gender'        => 'required|in:M,F',
            'day'           => 'required|date_format:d',
            'month'         => 'required|date_format:m',
            'year'          => 'required|date_format:Y',
            'category_id'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'day.date_format'       => 'El Formato Día es incorrecto.',
            'month.date_format'     => 'El Formato Mes es incorrecto.',
            'year.date_format'      => 'El Formato Año es incorrecto.',
            'email.email'           => 'El campo Email debe ser válido.',
            'password.min'          => 'La contraseña debe contener mas de 6 caracteres',
            'password.confirmed'    => 'La contraseña no coincide.'
        ];
    }
}
