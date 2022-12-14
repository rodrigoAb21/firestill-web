<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratoFormRequest extends FormRequest
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
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'periodo' => 'required|numeric|min:1',
            'cliente_id' => 'required|numeric|min:1',
            'trabajador_id' => 'required|numeric|min:1',
            //'documento' => 'nullable|file|mimes:doc,docx,pdf,txt',
        ];
    }
}
