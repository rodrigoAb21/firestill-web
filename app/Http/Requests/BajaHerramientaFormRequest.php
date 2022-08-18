<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BajaHerramientaFormRequest extends FormRequest
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
            'motivo' => 'required|string|max:255',
            'cantidad' => 'required|numeric|min:1',
            'herramienta_id' => 'required',
            'trabajador_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'herramienta_id.required' => 'Es requerido seleccionar una herramienta para dar de baja.',
            'trabajador_id.required' => 'Es requerido asignar un trabajador responsable de la baja.',
        ];
    }
}
