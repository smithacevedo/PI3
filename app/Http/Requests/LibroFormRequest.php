<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroFormRequest extends FormRequest
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
            'Tipo' => 'required',
            'Editorial' => 'required',
            'Año' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Nombre' => 'El campo Nombre no puede estar vacio',
            'Tipo' => 'El campo Tipo no puede estar vacio',
            'Editorial' => 'El campo Editorial no puede estar vacio',
            'Año' => 'El campo Año no puede estar vacio',
        ];
    }
}
