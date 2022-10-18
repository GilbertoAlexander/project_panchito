<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEtiquetaRequest extends FormRequest
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
        $admin_blog_etiqueta = $this->route()->parameter('admin_blog_etiqueta');
        $rules = [
            'name' => 'required|unique:etiquetas'
        ];
        if ($admin_blog_etiqueta) {
            $rules['name'] = 'required|unique:etiquetas,name,' . $admin_blog_etiqueta->id;
        }

        return $rules;
    }
}
