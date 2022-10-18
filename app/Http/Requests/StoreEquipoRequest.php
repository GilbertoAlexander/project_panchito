<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipoRequest extends FormRequest
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
        $admin_equipo = $this->route()->parameter('admin_equipo');
        $rules = [
            'name' => 'required|unique:equipos',
            'cargo' => 'required',
            'email' => 'required|unique:equipos',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:3000'
        ];
        if ($admin_equipo) {
            $rules['name'] = 'required|unique:equipos,name,' . $admin_equipo->id;
            $rules['email'] = 'required|unique:equipos,email,' . $admin_equipo->id;
            $rules['imagen'] = 'image|mimes:jpeg,png,jpg|max:3000,imagen,' . $admin_equipo->id;
        }

        return $rules;
    }
}
