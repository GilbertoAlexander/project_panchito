<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallecotizacionagregado extends Model
{
    use HasFactory;
    protected $table = 'detallecotizacionagregados';
    protected $fillable = [
        'cotizacionagregado_id',
        'agregado_id',
        'cantidad',
        'precio'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
