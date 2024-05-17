<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultaFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
{
    return [
        'fechaInicio' => 'required|date',
        'fechaFin' => 'required|date',
        'numSocio' => 'required'
    ];
}

public function messages()
{
    return [
        'fechaInicio' => 'El campo Fecha incio debe ser una fecha válida',
        'fechaFin' => 'El campo Fecha fin debe ser una fecha válida',
        'Nombre' => 'El campo Socio no puede estar vacío',
        
    ];
}
}
