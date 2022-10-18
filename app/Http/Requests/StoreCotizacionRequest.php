<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCotizacionRequest extends FormRequest
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
        $admin_cotizaciones_cotizacione = $this->route()->parameter('admin_cotizaciones_cotizacione');
        $rules = [
            'ubigeo_origen' => 'required',
            'direccion_origen' => 'required',
            'nro_inmueble_origen' => 'required',
            'bajar_origen' => 'required',
            'ubigeo_destino' => 'required',
            'direccion_destino' => 'required',
            'nro_inmueble_destino' => 'required',
            'subir_destino' => 'required',
            'precio_sugerido' => 'required',
            'estado' => 'required',
            'interesado_id' => 'required'
        ];
        if ($admin_cotizaciones_cotizacione) {
            $rules['nro_cotizacion'] = 'required|unique:cotizacions,nro_cotizacion,' . $admin_cotizaciones_cotizacione->id;
        }

        return $rules;
    }
}
 