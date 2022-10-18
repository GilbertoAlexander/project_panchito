<?php

namespace App\Http\Controllers;

use App\Models\Cotizacionservicio;
use App\Models\Empresa;
use App\Models\Interesado;
use App\Models\Servicio;
use App\Models\Ubigeo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;
class landingserviciosController extends Controller
{
    public function index()
    {
        $servicios_alquiler = Servicio::all()->where('estado','Activo')->where('tipo_id','1');
        $servicios_proyectos = Servicio::all()->where('estado','Activo')->where('tipo_id','2');
        $servicios_abastecimiento = Servicio::all()->where('estado','Activo')->where('tipo_id','3');
        return view('LANDING.servicios.index', compact('servicios_alquiler','servicios_proyectos','servicios_abastecimiento'));
    }
    public function servicio_show(Servicio $servicio)
    {
        $servicios = Servicio::where('id','!=',$servicio->id)->where('tipo_id',$servicio->tipo_id)->get();
        return view('LANDING.servicios.show', compact('servicio','servicios'));
    }
    public function servicio_cotizacion(Request $request)
    {
        
        $interesados = new Interesado();
        $interesados->name = $request->input('name');
        $interesados->slug = Str::slug($request->input('name'));
        $interesados->email = $request->input('email');
        $interesados->servicio_id = $request->input('servicio');
        $interesados->cotizacion_interesada = 'Servicio';
        $interesados->celular = $request->input('celular');
        $interesados->estado = 'Imcompleto';
        $interesados->save();
 
        session(['interesado' => $request->input('name'), 'servicio' => $request->input('servicio')]);

        return redirect()->route('cotizacion.servicio');
    }

    public function servicio_detalle(Request $request)
    {
        $interesado_id = session('interesado');
        $interesado = Interesado::where('name',$interesado_id)->first();
        $ubigeos = Ubigeo::all();
        return view('LANDING.servicios.cotizacion_servicio', compact('interesado','ubigeos'));
    }

    public function store_cotizacion_detalle(Request $request)
    {
        
        $now = Carbon::now();
        $cotizacion = Cotizacionservicio::orderBy('id','desc')->first();
        $nubRow =$cotizacion?$cotizacion->id+1:1;
        $codigo = $now->format('Ymd').$nubRow.'-CO';
        if($request->input('tipo_ids') == 1){
            $cotizacion = new Cotizacionservicio();
            $cotizacion->codigo = $codigo;
            $cotizacion->slug = $codigo;
            $cotizacion->empresa_solicitante = $request->input('name_empresa');
            $cotizacion->fecha_ejecucion = $request->input('fecha_ejecucion');
            $cotizacion->informacion_adicional = $request->input('informacion_adicional');
            $cotizacion->horas_requeridas = $request->input('horas_requerias');
            $cotizacion->operador_maquinaria = $request->input('operador_maquinaria');
            $cotizacion->interesado_id = $request->input('interesado_id');
            $cotizacion->estado = 'Por atender';
            $cotizacion->save();
        }
        if($request->input('tipo_ids') == 2){
            $cotizacion = new Cotizacionservicio();
            $cotizacion->codigo = $codigo;
            $cotizacion->slug = $codigo;
            $cotizacion->empresa_solicitante = $request->input('name_empresa');
            $cotizacion->fecha_ejecucion = $request->input('fecha_ejecucion');
            $cotizacion->informacion_adicional = $request->input('informacion_adicional');
            $cotizacion->direccion = $request->input('direccion');
            $cotizacion->ubigeo_id = $request->input('ubigeo_id');
            $cotizacion->interesado_id = $request->input('interesado_id');
            $cotizacion->estado = 'Por atender';
            $cotizacion->save();
        }
        if($request->input('tipo_ids') == 3){
            $cotizacion = new Cotizacionservicio();
            $cotizacion->codigo = $codigo;
            $cotizacion->slug = $codigo;
            $cotizacion->empresa_solicitante = $request->input('name_empresa');
            $cotizacion->fecha_ejecucion = $request->input('fecha_ejecucion');
            $cotizacion->cantidad_requerida = $request->input('cantidad_requerida');
            $cotizacion->direccion = $request->input('direccion');
            $cotizacion->ubigeo_id = $request->input('ubigeo_id');
            $cotizacion->interesado_id = $request->input('interesado_id');
            $cotizacion->estado = 'Por atender';
            $cotizacion->save();
        }
 
        session()->forget('interesado','servicio');
        $interesado_update = new Interesado();
        $array_movientos = ['interesado_id' => $request->input('interesado_id'),'estado' => 'Por atender','tipo_estado' => 'Aprobado'];
        $interesado_update->update_estado($array_movientos);
        
        return redirect()->route('confirmacion.cotizacion', ['confirmacion_cotizacion' => $cotizacion->slug]);
    }

    public function confirmacion_cotizacion(Cotizacionservicio $confirmacion_cotizacion)
    {

        return view('LANDING.servicios.confirmacion_cotizacion', compact('confirmacion_cotizacion'));
    }

    public function getCotizacionServicioPdf(Cotizacionservicio $confirmacion_cotizacion)
    {
        $now = Carbon::now();
        $empresa = Empresa::find(1);
        $pdf = PDF::loadView('LANDING.servicios.reporte_cotizacion_servicio', ['confirmacion_cotizacion'=>$confirmacion_cotizacion, 'now'=>$now, 'empresa'=>$empresa]);
        return $pdf->download('PANCHITO-COTIZACION-'.$confirmacion_cotizacion->codigo.'.pdf');
    }
}
