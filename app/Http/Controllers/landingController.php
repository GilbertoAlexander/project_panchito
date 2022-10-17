<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class landingController extends Controller
{
    public function index()
    {
        $admin_empresa = Empresa::find(1);
        return view('LANDING.index', compact('admin_empresa'));
    }

    public function nosotros()
    {
        return view('LANDING.nosotros');
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
