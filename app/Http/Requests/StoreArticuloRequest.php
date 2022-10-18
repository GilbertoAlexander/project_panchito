<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticuloRequest extends FormRequest
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
            'name' => 'required|unique:articulos',
            'descripcion' => 'required|max:2000',
            'contenido' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:3000',
            'blog__category_id' => 'required'
        ];
        if ($admin_blog_articulo) {
            $rules['name'] = 'required|unique:articulos,name,' . $admin_blog_articulo->id;
            $rules['imagen'] = 'image|mimes:jpeg,png,jpg|max:3000,imagen,' . $admin_blog_articulo->id;
        }

        return $rules;
    }
}
