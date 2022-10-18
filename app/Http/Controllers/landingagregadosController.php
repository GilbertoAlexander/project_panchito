<?php

namespace App\Http\Controllers;

use App\Models\Agregado;
use App\Models\Cotizacionagregado;
use App\Models\Detallecotizacionagregado;
use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Models\Interesado;
use App\Models\Servicio;
use App\Models\Ubigeo;
use Carbon\Carbon;
use Illuminate\Support\Str;
use PDF;
class landingagregadosController extends Controller
{
    public function index(Request $request)
    {
        $nombre = $request->get('buscarpor');
        $agregados = Agregado::where('estado','Activo')->where('name','like',"%$nombre%")->paginate(8);
        return view('LANDING.agregados.index', compact('agregados'));
    }
    public function agregado_show(Agregado $agregado)
    {
        $agregados = Agregado::where('id','!=',$agregado->id)->get();
        return view('LANDING.agregados.show', compact('agregado','agregados'));
    }
    public function agregado_cotizacion(Request $request)
    {
        
        $interesados = new Interesado();
        $interesados->name = $request->input('name');
        $interesados->slug = Str::slug($request->input('name'));
        $interesados->email = $request->input('email');
        $interesados->cotizacion_interesada = 'Agregado';
        $interesados->celular = $request->input('celular');
        $interesados->estado = 'Imcompleto';
        $interesados->save();
 
        session(['interesado' => $request->input('name')]);

        return redirect()->route('cotizacion.agregado');
    }

    public function store_cotizacion_detalle(Request $request)
    {        
        $now = Carbon::now();
        $cotizacion = Cotizacionagregado::orderBy('id','desc')->first();
        $nubRow =$cotizacion?$cotizacion->id+1:1;
        $codigo = $now->format('Ymd').$nubRow.'-CO';

        $cotizacion = new Cotizacionagregado();
        $cotizacion->codigo = $codigo;
        $cotizacion->slug = $codigo;
        $cotizacion->empresa_solicitante = $request->input('name_empresa');
        $cotizacion->fecha_entrega = $request->input('fecha_ejecucion');
        $cotizacion->informacion_adicional = $request->input('informacion_adicional');
        $cotizacion->direccion = $request->input('direccion');
        $cotizacion->transporte_agregado = $request->input('transporte_agregado');
        $cotizacion->total = $request->input('cantidad_total');
        $cotizacion->ubigeo_id = $request->input('ubigeo_id');
        $cotizacion->interesado_id = $request->input('interesado_id');
        $cotizacion->estado = 'Por atender';
        $cotizacion->save();

        $id_agregado = $request->input('id_agregado');
        $cantidad = $request->input('cantidad');
        $precio = $request->input('precio');

        foreach ($id_agregado as $key => $name) {
            $detalle = new Detallecotizacionagregado();
            $detalle->cotizacionagregado_id = $cotizacion->id;
            $detalle->agregado_id = $id_agregado[$key];
            $detalle->cantidad = $cantidad[$key];
            $detalle->precio = $precio[$key];
            $detalle->save();
        }
 
        session()->forget('interesado');
        $interesado_update = new Interesado();
        $array_movientos = ['interesado_id' => $request->input('interesado_id'),'estado' => 'Por atender','tipo_estado' => 'Aprobado'];
        $interesado_update->update_estado($array_movientos);
        return redirect()->route('confirmacion.cotizacion_agregado', ['confirmacion_cotizacion' => $cotizacion->slug]);
    }

    public function agregado_detalle(Request $request)
    {
        $interesado_id = session('interesado');
        $interesado = Interesado::where('name',$interesado_id)->first();
        $ubigeos = Ubigeo::all();
        $agregados = Agregado::all()->where('estado','Activo');
        return view('LANDING.agregados.cotizacion_agregados', compact('interesado','ubigeos','agregados'));
    }

    public function confirmacion_cotizacion(Cotizacionagregado $confirmacion_cotizacion)
    {

        return view('LANDING.agregados.confirmacion_cotizacion', compact('confirmacion_cotizacion'));
    }

    public function getCotizacionAgregadoPdf(Cotizacionagregado $confirmacion_cotizacion)
    {
        $now = Carbon::now();
        $empresa = Empresa::find(1);
        $pdf = PDF::loadView('LANDING.agregados.reporte_cotizacion_agregado', ['confirmacion_cotizacion'=>$confirmacion_cotizacion, 'now'=>$now, 'empresa'=>$empresa]);
        return $pdf->download('PANCHITO-COTIZACION-'.$confirmacion_cotizacion->codigo.'.pdf');
    }
}
