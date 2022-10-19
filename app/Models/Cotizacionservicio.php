<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacionservicio extends Model
{
    use HasFactory;
    protected $table = 'cotizacionservicios';
    protected $fillable = [
        'codigo',
        'slug',
        'empresa_solicitante',
        'fecha_ejecucion',
        'horas_requeridas',
        'operador_maquinaria',
        'informacion_adicional',
        'direccion',
        'fecha_entrega',
        'cantidad_requerida',
        'ubigeo_id',
        'estado',
        'costo_estimado',
        'costo_afectado',
        'igv',
        'interesado_id',
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function interesado()
    {
        return $this->belongsTo(Interesado::class);
    }
    public function ubigeo()
    {
        return $this->belongsTo(Ubigeo::class);
    }
}
