<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCotizacionCategoriaRequest extends FormRequest
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
        $admin_cotizaciones_categoria = $this->route()->parameter('admin_cotizaciones_categoria');
        $rules = [
            'name' => 'required|unique:cotizacion__categories'
        ];
        if ($admin_cotizaciones_categoria) {
            $rules['name'] = 'required|unique:cotizacion__categories,name,' . $admin_cotizaciones_categoria->id;
        }

        return $rules;
    }
}
