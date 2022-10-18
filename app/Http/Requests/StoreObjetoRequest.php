<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreObjetoRequest extends FormRequest
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
        $admin_cotizaciones_objeto = $this->route()->parameter('admin_cotizaciones_objeto');
        $rules = [
            'name' => 'required|unique:objetos',
            'cotizacion__category_id' => 'required'
        ];
        if ($admin_cotizaciones_objeto) {
            $rules['name'] = 'required|unique:objetos,name,' . $admin_cotizaciones_objeto->id;
        }

        return $rules;
    }
}