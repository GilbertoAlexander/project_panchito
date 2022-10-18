<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogCategoriaRequest extends FormRequest
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
        $admin_blog_articulo = $this->route()->parameter('admin_blog_articulo');
        $rules = [
            'name' => 'required|unique:blog__categories',
            'descripcion' => 'max:190'
        ];
        if ($admin_blog_articulo) {
            $rules['name'] = 'required|unique:blog__categories,name,' . $admin_blog_articulo->id;
        }
 
        return $rules;
    }
}
