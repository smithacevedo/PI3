<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LectorFormRequest extends FormRequest
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
            'Apellido' => 'required',
            'Direccion' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Nombre' => 'El campo Nombre no puede estar vacio',
            'Apellido' => 'El campo Apellido no puede estar vacio',
            'Direccion' => 'El campo Direccion no puede estar vacio'
        ];
    }
}
