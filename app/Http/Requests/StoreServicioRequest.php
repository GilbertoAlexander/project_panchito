<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServicioRequest extends FormRequest
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
        $admin_servicio = $this->route()->parameter('admin-servicios');
        $rules = [
            'name' => 'required|unique:servicios',
            'descripcion' => 'required|max:2000',
            'contenido' => 'required',
            'tipo_id' => 'required',
            'precio' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:3000',
        ];
        if ($admin_servicio) {
            $rules['name'] = 'required|unique:servicios,name,' . $admin_servicio->id;
            $rules['descripcion'] = 'required' . $admin_servicio->id;
            $rules['contenido'] = 'required' . $admin_servicio->id;
            $rules['tipo_id'] = 'required' . $admin_servicio->id;
            $rules['precio'] = 'required' . $admin_servicio->id;
            $rules['imagen'] = 'image|mimes:jpeg,png,jpg|max:3000,imagen,' . $admin_servicio->id;
        }

        return $rules;
    }
}
