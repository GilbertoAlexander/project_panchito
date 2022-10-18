<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransporteRequest extends FormRequest
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
        $admin_transporte = $this->route()->parameter('admin_transporte');
        $rules = [
            'name' => 'required|unique:transportes',
            'descripcion' => 'required|max:2000',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:3000'
        ];
        if ($admin_transporte) {
            $rules['name'] = 'required|unique:transportes,name,' . $admin_transporte->id;
            $rules['imagen'] = 'image|mimes:jpeg,png,jpg|max:3000,imagen,' . $admin_transporte->id;
        }

        return $rules;
    }
}
