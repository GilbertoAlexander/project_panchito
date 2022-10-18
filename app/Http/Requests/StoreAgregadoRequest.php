<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgregadoRequest extends FormRequest
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
        $admin_agregado = $this->route()->parameter('admin-agregados');
        $rules = [
            'name' => 'required|unique:servicios',
            'descripcion' => 'required|max:2000',
            'contenido' => 'required',
            'precio' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:3000',
        ];
        if ($admin_agregado) {
            $rules['name'] = 'required|unique:servicios,name,' . $admin_agregado->id;
            $rules['descripcion'] = 'required' . $admin_agregado->id;
            $rules['contenido'] = 'required' . $admin_agregado->id;
            $rules['precio'] = 'required' . $admin_agregado->id;
            $rules['imagen'] = 'image|mimes:jpeg,png,jpg|max:3000,imagen,' . $admin_agregado->id;
        }

        return $rules;
    }
}
