<?php

namespace App\Http\Requests;

use App\Rules\ValidarCampoUrl;
use Illuminate\Foundation\Http\FormRequest;

class ValidacionMenu extends FormRequest
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
            'nombre' => 'required|max:50|unique:menu,nombre',
            'url' => ['required','max:50', new ValidarCampoUrl],
            'icono' => 'required|max:50'
        ];
    }

    /*
    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'url.required' => 'El campo URL es obligatorio'
        ];
    }
    */
}