<?php

namespace App\Http\Controllers;

use App\Models\Agregado;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Equipo;
use App\Models\Servicio;
use Illuminate\Http\Request;

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
        return view('LANDING.contacto');
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
