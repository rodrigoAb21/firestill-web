<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioFormRequest extends FormRequest
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
            'fecha' => 'required|date',
            'empleado_id' => 'nullable|numeric|min:0',
            'cliente_id' => 'required|numeric|min:1',
            'total' => 'required|numeric|min:0',

            'idProductoT' => 'nullable|array|min:0',
            'idProductoT.*' => 'nullable|numeric|min:1',
            'cantidadT' => 'nullable|array|min:0',
            'cantidadT.*' => 'nullable|numeric|min:1',
            'precioT' => 'nullable|array|min:0',
            'precioT.*' => 'nullable|numeric|min:0',

            'nombresT' => 'required|array|min:1',
            'nombresT.*' => 'required|string|max:255',
            'preciosST' => 'required|array|min:1',
            'preciosST.*' => 'required|numeric|min:0',
        ];
    }
}
