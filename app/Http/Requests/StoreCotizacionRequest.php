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
        $admin_cotizaciones_agregado = $this->route()->parameter('admin-cotizaciones-agregados');
        $rules = [
            'empresa_solicitante' => 'required',
            'fecha_entrega' => 'required',
            'direccion' => 'required',
            'ubigeo_id' => 'required',
            'transporte_agregado' => 'required',
            'informacion_adicional' => 'required',
            'observacion_adicional' => 'required',
        ];
        if ($admin_cotizaciones_agregado) {
            $rules['empresa_solicitante'] = 'required' . $admin_cotizaciones_agregado->id;
            $rules['fecha_entrega'] = 'required' . $admin_cotizaciones_agregado->id;
            $rules['direccion'] = 'required' . $admin_cotizaciones_agregado->id;
            $rules['ubigeo_id'] = 'required' . $admin_cotizaciones_agregado->id;
            $rules['transporte_agregado'] = 'required' . $admin_cotizaciones_agregado->id;
            $rules['informacion_adicional'] = 'required' . $admin_cotizaciones_agregado->id;
            $rules['observacion_adicional'] = 'required' . $admin_cotizaciones_agregado->id;
        }

        return $rules;
    }
}
 