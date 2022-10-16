<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipos';
    protected $fillable = [
        'name',
        'slug',
        'cargo',
        'imagen',
        'estado',
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
