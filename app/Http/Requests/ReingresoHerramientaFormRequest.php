<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReingresoHerramientaFormRequest extends FormRequest
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
            'idHerramientaT' => 'required|array|min:1',
            'idHerramientaT.*' => 'required|numeric|min:0',
            'cantidadAT' => 'required|array|min:1',
            'cantidadAT.*' => 'required|numeric|min:0',
            'cantidadRT' => 'required|array|min:1',
            'cantidadRT.*' => 'required|numeric|min:0',
            'motivoT' => 'nullable|array|min:1',
            'motivoT.*' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'idHerramientaT.required' => 'Debe ingresar al menos una herramienta.',
            'idHerramientaT.*.numeric' => 'Seleccione una herramienta válida.',
            'cantidadAT.required' => 'Debe ingresar al menos una cantidad.',
            'cantidadAT.*.numeric' => 'La cantidad debe ser un número válido > 0.',
            'cantidadRT.required' => 'Debe ingresar al menos una cantidad.',
            'cantidadRT.*.numeric' => 'La cantidad debe ser un número válido > 0.',
            'motivoT.*.max' => 'El motivo no debe ser mayor a 255 caracteres.',
        ];
    }
}
