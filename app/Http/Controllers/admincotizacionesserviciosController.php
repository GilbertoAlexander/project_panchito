<?php

namespace App\Http\Controllers;

use App\Models\Cotizacionservicio;
use App\Models\Empresa;
use App\Models\Interesado;
use App\Models\Ubigeo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class admincotizacionesserviciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizacion_servicios = Cotizacionservicio::all();
        return view('ADMINISTRADOR.cotizacion-servicios.index', compact('cotizacion_servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interesados = Interesado::all()->where('cotizacion_interesada','Servicio')->where('estado','Imcompleto');
        $ubigeos = Ubigeo::all();
        return view('ADMINISTRADOR.cotizacion-servicios.create', compact('interesados','ubigeos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            $cotizacion->interesado_id = $request->input('interesado_ids');
            $cotizacion->estado = $request->input('estado');
            $cotizacion->costo_estimado = $request->input('costo_estimado');
            $cotizacion->costo_afectado = $request->input('costo_afectado');
            $cotizacion->save();
        }
        if($request->input('tipo_ids') == 2){
            $cotizacion = new Cotizacionservicio();
            $cotizacion->codigo = $codigo;
            $cotizacion->slug = $codigo;
            $cotizacion->empresa_solicitante = $request->input('name_empresa2');
            $cotizacion->fecha_ejecucion = $request->input('fecha_ejecucion2');
            $cotizacion->informacion_adicional = $request->input('informacion_adicional2');
            $cotizacion->direccion = $request->input('direccion2');
            $cotizacion->ubigeo_id = $request->input('ubigeo_id2');
            $cotizacion->interesado_id = $request->input('interesado_ids');
            $cotizacion->estado = $request->input('estado');
            $cotizacion->costo_estimado = $request->input('costo_estimado');
            $cotizacion->costo_afectado = $request->input('costo_afectado');
            $cotizacion->save();
        }
        if($request->input('tipo_ids') == 3){
            $cotizacion = new Cotizacionservicio();
            $cotizacion->codigo = $codigo;
            $cotizacion->slug = $codigo;
            $cotizacion->empresa_solicitante = $request->input('name_empresa3');
            $cotizacion->fecha_ejecucion = $request->input('fecha_ejecucion3');
            $cotizacion->cantidad_requerida = $request->input('cantidad_requerida');
            $cotizacion->direccion = $request->input('direccion3');
            $cotizacion->ubigeo_id = $request->input('ubigeo_id3');
            $cotizacion->interesado_id = $request->input('interesado_ids');
            $cotizacion->estado = $request->input('estado');
            $cotizacion->costo_estimado = $request->input('costo_estimado');
            $cotizacion->costo_afectado = $request->input('costo_afectado');
            $cotizacion->save();
        }

        return redirect()->route('admin-cotizaciones-servicios.index')->with('addcotizacion', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cotizacionservicio $admin_cotizaciones_servicio)
    {
        return view('ADMINISTRADOR.cotizacion-servicios.show', compact('admin_cotizaciones_servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotizacionservicio $admin_cotizaciones_servicio)
    {
        // echo '<pre>';
        // var_dump ($request->input('interesado_id'));
        // echo '</pre>';
        // die();

        $admin_cotizaciones_servicio['estado'] = $request->input('estado');
        $admin_cotizaciones_agregado['costo_estimado'] = $request->input('costo_estimado');
        $admin_cotizaciones_agregado['costo_afectado'] = $request->input('costo_afectado');
        $admin_cotizaciones_agregado['igv'] = $request->input('igv');
        $admin_cotizaciones_agregado['observacion_adicional'] = $request->input('observacion_adicional');

        $admin_cotizaciones_servicio->save();

        $interesado_update = new Interesado();
        $array_movientos = ['interesado_id' => $request->input('interesado_id'),'estado' => $request->input('estado'),'tipo_estado' => 'Aprobado'];
        $interesado_update->update_estado($array_movientos);

        return redirect()->route('admin-cotizaciones-servicios.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizacionservicio $admin_cotizaciones_servicio)
    {
        
        $interesado_update = new Interesado;
        $array_movientos = ['interesado_id' => $admin_cotizaciones_servicio->interesado_id,'estado' => $admin_cotizaciones_servicio->estado,'tipo_estado' => 'Delete'];
        $interesado_update->update_estado($array_movientos);

        $admin_cotizaciones_servicio->delete();
        return redirect()->back()->with('delete', 'ok');
    }

    public function getCotizacionServicioFinalPdf(Cotizacionservicio $admin_cotizaciones_servicio)
    {
        $now = Carbon::now();
        $empresa = Empresa::find(1);
        $pdf = PDF::loadView('ADMINISTRADOR.cotizacion-servicios.reporte_cotizacion_servicio', ['admin_cotizaciones_servicio'=>$admin_cotizaciones_servicio, 'now'=>$now, 'empresa'=>$empresa]);
        return $pdf->stream('PANCHITO-COTIZACION-'.$admin_cotizaciones_servicio->codigo.'.pdf');

    }
}
