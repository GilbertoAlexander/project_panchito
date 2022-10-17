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
        'precio',
        'imagen',
        'estado',
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
