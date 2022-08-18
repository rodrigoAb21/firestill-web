<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignacionHerramientaFormRequest extends FormRequest
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
            'idHerramientaT' => 'required|array|min:1',
            'idHerramientaT.*' => 'required|numeric|min:1',
            'cantidadT' => 'required|array|min:1',
            'cantidadT.*' => 'required|numeric|min:1',
            'trabajador_id' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'idHerramientaT.required' => 'Debe ingresar al menos una herramienta.',
            'idHerramientaT.*.numeric' => 'Seleccione una herramienta válida.',
            'cantidadT.required' => 'Debe ingresar al menos una cantidad.',
            'cantidadT.*.numeric' => 'La cantidad debe ser un número válido > 0.',
            'trabajador_id.required' => 'Es requerido asignar un trabajador como responsable.',
        ];
    }
}
