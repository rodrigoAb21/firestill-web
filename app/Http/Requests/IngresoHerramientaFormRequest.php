<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngresoHerramientaFormRequest extends FormRequest
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
            'tienda' => 'required|string|max:255',
            'nro_factura' => 'nullable|numeric|integer',
            'foto_factura' => 'nullable|image|mimes:jpg,jpeg,bmp,png',
            'total' => 'required|numeric|min:1',
            'idHerramientaT' => 'required|array|min:1',
            'idHerramientaT.*' => 'required|numeric|min:1',
            'cantidadT' => 'required|array|min:1',
            'cantidadT.*' => 'required|numeric|min:1',
            'costoT' => 'required|array|min:1',
            'costoT.*' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'nro_factura.numeric' => 'El número de factura debe ser un número entero.',
            'nro_factura.integer' => 'El número de factura debe ser un número entero.',
            'foto_factura.image' => 'El archivo de la factura debe ser una imágen válida.',
            'idHerramientaT.required' => 'Debe ingresar al menos una herramienta.',
            'idHerramientaT.*.numeric' => 'Seleccione una herramienta válida.',
            'cantidadT.required' => 'Debe ingresar al menos una cantidad.',
            'cantidadT.*.numeric' => 'La cantidad debe ser un número válido > 0.',
            'costoT.required' => 'Debe ingresar al menos un costo.',
            'costoT.*.numeric' => 'El costo debe ser un número válido > 0.',
        ];
    }
}
