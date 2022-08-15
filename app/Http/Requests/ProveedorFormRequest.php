<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorFormRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'nit' => 'nullable|numeric|min:0',
            'email' => 'nullable|email',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|numeric|digits_between:7,8',
            'informacion' => 'nullable|string|max:255',
            'titular' => 'nullable|string|max:255',
            'banco' => 'nullable|string|max:255',
            'sucursal' => 'nullable|string|max:255',
            'nro_cuenta' => 'nullable|numeric',
            'moneda' => 'nullable|string|max:255',
            'tipo_identificacion' => 'nullable|string|max:255',
            'nro_identificacion' => 'nullable|string|max:255',
        ];
    }
}
