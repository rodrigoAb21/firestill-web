<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'nombre_empresa' => 'required|max:255',
            'nit' => 'nullable|numeric|min:0',
            'email' => 'nullable|max:255',
            'email_encargado' => 'nullable|max:255',
            'telefono_empresa' => 'nullable|digits_between:7,8',
            'direccion' => 'nullable|max:255',
            'nombre_encargado' => 'nullable|max:255',
            'cargo_encargado' => 'nullable|max:255',
            'telefono_encargado' => 'nullable|digits_between:7,8',
        ];
    }
    public function messages()
    {
        return [
            'nombre_empresa.required' => 'El nombre de la empresa es obligatorio.',
            'nombre_empresa.max' => 'El nombre de la empresa no debe ser mayor a 255 caracteres.',
            'email_encargado.max' => 'El email del encargado no debe ser mayor a 255 caracteres.',
            'email.max' => 'El email de la empresa no debe ser mayor a 255 caracteres.',
            'nombre_encargado.max' => 'El nombre del encargado no debe ser mayor a 255 caracteres.',
            'cargo_encargado.max' => 'El cargo del encargado no debe ser mayor a 255 caracteres.',
            'telefono_empresa.digits_between' => 'El teléfono de la empresa debe contener entre 7 y 8 dígitos.',
            'telefono_encargado.digits_between' => 'El teléfono del encargardo debe contener entre 7 y 8 dígitos.',
        ];
    }
}
