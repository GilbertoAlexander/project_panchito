<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'empresas';
    protected $fillable = [
        'img_portada',
        'razonsocial',
        'ruc',
        'slug',
        'logo',
        'email',
        'telefono',
        'celular',
        'direccion',
        'referencia',
        'nro_whatsapp',
        'url_facebook',
        'url_instagram',
        'mision',
        'vision',
        'nosotros',
        'ubigeo_id',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function ubigeo()
    {
        return $this->belongsTo(Ubigeo::class, 'ubigeo_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
