<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorFormRequest extends FormRequest
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
        'Nombre' => 'required',
        'Nacionalidad' => 'required',
        'Fecha_Nacimiento' => 'required|date'
    ];
}

public function messages()
{
    return [
        'Nombre' => 'El campo Nombre no puede estar vacío',
        'Nacionalidad' => 'El campo Nacionalidad no puede estar vacío',
        'Fecha_Nacimiento' => 'El campo Fecha de Nacimiento debe ser una fecha válida'
    ];
}

}
