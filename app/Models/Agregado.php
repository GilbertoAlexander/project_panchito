<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agregado extends Model
{
    use HasFactory;
    protected $table = 'agregados';
    protected $fillable = [
        'name',
        'slug',
        'descripcion',
        'contenido',
        'imagen',
        'estado',
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
