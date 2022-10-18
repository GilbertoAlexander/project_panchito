<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpresaRequest extends FormRequest
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
        $admin_informacion = $this->route()->parameter('admin_informacion');
        $rules = [
            'razonsocial' => 'required|unique:empresas',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:3000',
            'ruc' => 'required',
            'email_empresa' => 'required',
            'telefono' => 'required',
            'celular' => 'required',
            'direccion' => 'required',
            'referencia' => 'required',
            'nro_whatsapp' => 'required',
            'url_facebook' => 'required',
            'url_linkedin' => 'required',
            'url_instagram' => 'required',
            'url_twitter' => 'required',
            'mision' => 'required',
            'img_mision' => 'required|image|mimes:jpeg,png,jpg|max:3000',
            'vision' => 'required',
            'img_vision' => 'required|image|mimes:jpeg,png,jpg|max:3000',
            'nosotros' => 'required',
            'img_nosotros' => 'required|image|mimes:jpeg,png,jpg|max:3000',
        ];

        if ($admin_informacion) {
            $rules['razonsocial'] = 'required|unique:empresas,razonsocial,' . $admin_informacion->id;
            $rules['logo'] = 'image|mimes:jpeg,png|max:3000,logo,' . $admin_informacion->id;
            $rules['img_mision'] = 'image|mimes:jpeg,png,jpg|max:3000,img_mision,' . $admin_informacion->id;
            $rules['img_vision'] = 'image|mimes:jpeg,png,jpg|max:3000,img_vision,' . $admin_informacion->id;
            $rules['img_nosotros'] = 'image|mimes:jpeg,png,jpg|max:3000,img_nosotros,jpg,' . $admin_informacion->id;
        }

        return $rules;
    }
}
