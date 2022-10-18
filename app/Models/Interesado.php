<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function update_estado($data) {

        
  
        $existencia =  DB::table('interesados')
                    ->select('interesados.*')
                    ->where('id',$data['interesado_id'])
                    ->first();
            
            if($existencia){
                $interesado = Interesado::find($existencia->id);
                if($data['tipo_estado'] == 'Aprobado' && $data['estado'] == 'Atendido') {
                    $estados = $data['estado'];
                }
                elseif($data['tipo_estado'] == 'Aprobado' && $data['estado'] == 'Seguimiento') {
                    $estados = 'En proceso';
                }elseif($data['tipo_estado'] == 'Delete' && $data['estado'] == 'Seguimiento') {
                    $estados = 'Imcompleto';
                }elseif($data['tipo_estado'] == 'Aprobado' && $data['estado'] == 'Por atender') {
                    $estados = 'Por atender';
                }else{
                    $estados = $interesado->estado;
                }
        
                //El producto existe en almacen aumentamos su cantidad
                $interesado->estado  = $estados;
                $interesado->save();
            }
            return true;
    
    }
}
