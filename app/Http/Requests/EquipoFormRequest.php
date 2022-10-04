<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipoFormRequest extends FormRequest
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
            'nro_serie' => 'required|numeric',
            'descripcion' => 'nullable|string|max:255',
            'ubicacion' => 'nullable|string|max:255',
            'unidad_medida' => 'required|string|max:255',
            'ano_fabricacion' => 'required|numeric|digits:4',
            'capacidad' => 'required|numeric|min:1',
            'sucursal_id' => 'required|numeric|min:1',
            'tipo_clasificacion_id' => 'required|numeric|min:1',
            'marca_clasificacion_id' => 'required|numeric|min:1',
        ];
    }
}
