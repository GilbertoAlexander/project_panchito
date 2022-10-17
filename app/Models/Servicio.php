<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $table = 'servicios';
    protected $fillable = [
        'name',
        'slug',
        'descripcion',
        'contenido',
        'imagen',
        'estado',
        'tipo_id'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
}
