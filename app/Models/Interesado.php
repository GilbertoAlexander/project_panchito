<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interesado extends Model
{
    use HasFactory;
    protected $table = 'interesados';
    protected $fillable = [
        'name',
        'slug',
        'email',
        'celular',
        'estado',
        'cotizacion_interesada',
        'servicio_id',
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
