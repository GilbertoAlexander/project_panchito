<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacionagregado extends Model
{
    use HasFactory;
    protected $table = 'cotizacionagregados';
    protected $fillable = [
        'codigo',
        'slug',
        'empresa_solicitante',
        'fecha_entrega',
        'direccion',
        'transporte_agregado',
        'informacion_adicional',
        'total',
        'ubigeo_id',
        'interesado_id',
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
