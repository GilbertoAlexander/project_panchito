<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    use HasFactory;
    protected $table = 'correos';
    protected $fillable = [
        'name_lastname',
        'slug',
        'email',
        'asunto',
        'celular',
        'mensaje',
        'fecha'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
