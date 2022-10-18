<?php

namespace App\Http\Controllers;

use App\Models\Agregado;
use App\Models\Cotizacionagregado;
use App\Models\Detallecotizacionagregado;
use App\Models\Empresa;
use App\Models\Interesado;
use App\Models\Ubigeo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class admincotizacionesagregadosController extends Controller
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
        $cotizacion_agregados = Cotizacionagregado::all();
        return view('ADMINISTRADOR.cotizacion-agregados.index', compact('cotizacion_agregados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interesados = Interesado::all()->where('cotizacion_interesada','Agregado')->where('estado','Imcompleto');
        $agregados = Agregado::all()->where('estado','Activo');
        $ubigeos = Ubigeo::all();
        return view('ADMINISTRADOR.cotizacion-agregados.create', compact('interesados','agregados','ubigeos'));
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
        $cotizacion->interesado_id = $request->input('interesado_ids');
        $cotizacion->costo_estimado = $request->input('costo_estimado');
        $cotizacion->costo_afectado = $request->input('costo_afectado');
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
        return redirect()->route('admin-cotizaciones-agregados.index')->with('addagregados','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cotizacionagregado $admin_cotizaciones_agregado)
    {
        $dt_cotizacion = Detallecotizacionagregado::where('cotizacionagregado_id',$admin_cotizaciones_agregado->id)->get();
        return view('ADMINISTRADOR.cotizacion-agregados.show', compact('admin_cotizaciones_agregado','dt_cotizacion'));
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
    public function update(Request $request, Cotizacionagregado $admin_cotizaciones_agregado)
    {
        $admin_cotizaciones_agregado['estado'] = $request->input('estado');
        $admin_cotizaciones_agregado['costo_estimado'] = $request->input('costo_estimado');
        $admin_cotizaciones_agregado['costo_afectado'] = $request->input('costo_afectado');
        $admin_cotizaciones_agregado['igv'] = $request->input('igv');
        $admin_cotizaciones_agregado['observacion_adicional'] = $request->input('observacion_adicional');
        $admin_cotizaciones_agregado->save();

        $interesado_update = new Interesado();
        $array_movientos = ['interesado_id' => $request->input('interesado_id'),'estado' => $request->input('estado'),'tipo_estado' => 'Aprobado'];
        $interesado_update->update_estado($array_movientos);

        return redirect()->route('admin-cotizaciones-agregados.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizacionagregado $admin_cotizaciones_agregado)
    {
        $interesado_update = new Interesado;
        $array_movientos = ['interesado_id' => $admin_cotizaciones_agregado->interesado_id,'estado' => $admin_cotizaciones_agregado->estado,'tipo_estado' => 'Delete'];
        $interesado_update->update_estado($array_movientos);

        $admin_cotizaciones_agregado->delete();
        return redirect()->back()->with('delete', 'ok');
    }

    public function getCotizacionAgregadoFinalPdf(Cotizacionagregado $admin_cotizaciones_agregado)
    {
        $now = Carbon::now();
        $empresa = Empresa::find(1);
        $pdf = PDF::loadView('ADMINISTRADOR.cotizacion-agregados.reporte_cotizacion_agregado', ['admin_cotizaciones_agregado'=>$admin_cotizaciones_agregado, 'now'=>$now, 'empresa'=>$empresa]);
        return $pdf->stream('PANCHITO-COTIZACION-'.$admin_cotizaciones_agregado->codigo.'.pdf');
    }
}
