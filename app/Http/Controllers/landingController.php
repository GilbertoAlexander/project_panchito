<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCorreoRequest;
use App\Models\Agregado;
use App\Models\Cliente;
use App\Models\Correo;
use App\Models\Empresa;
use App\Models\Equipo;
use App\Models\Servicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class landingController extends Controller
{
    public function index()
    {
        $admin_empresa = Empresa::find(1);
        $servicios = Servicio::all()->where('estado','Activo');
        $agregados = Agregado::all()->where('estado','Activo');
        $clientes = Cliente::all()->where('estado','Activo');
        return view('LANDING.index', compact('admin_empresa','servicios','agregados','clientes'));
    }

    public function nosotros()
    {
        $equipos = Equipo::all()->where('estado','Activo');
        return view('LANDING.nosotros', compact('equipos'));
    }

    public function contacto()
    {
        $now = Carbon::now();
        return view('LANDING.contacto', compact('now'));
    }
    public function logueos()
    {
        return view('auth.login');
    }
    public function store_email(StoreCorreoRequest $request)
    {
        $correo = new Correo();
        $correo->name_lastname = $request->input('name_lastname');
        $correo->email = $request->input('email');
        $correo->asunto = $request->input('asunto');
        $correo->slug =  Str::slug($request->input('asunto'));
        $correo->celular = $request->input('celular');
        $correo->mensaje = $request->input('mensaje');
        $correo->save();
        
        return redirect()->back()->with('addcorreo', 'ok');
    }
    public function avisolegal(){
        $empresa = Empresa::find(1);
        return view('aviso_legal', compact('empresa'));
    }
    public function politicaprivacidad(){
        $empresa = Empresa::find(1);
        return view('politica_privacidad', compact('empresa'));
    }
    public function politicacookies(){
        $empresa = Empresa::find(1);
        return view('politica_cookies', compact('empresa'));
    }
}
