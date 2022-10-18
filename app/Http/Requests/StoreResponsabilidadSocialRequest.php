<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResponsabilidadSocialRequest extends FormRequest
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
        $admin_responsabilidadsocial = $this->route()->parameter('admin_responsabilidadsocial');
        $rules = [
            'name' => 'required|unique:responsabilidad__socials',
            'contenido' => 'required|max:2000',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:3000',
        ];
        if ($admin_responsabilidadsocial) {
            $rules['name'] = 'required|unique:responsabilidad__socials,name,' . $admin_responsabilidadsocial->id;
            $rules['imagen'] = 'image|mimes:jpeg,png,jpg|max:3000,imagen,' . $admin_responsabilidadsocial->id;
        }

        return $rules;
    }
}
