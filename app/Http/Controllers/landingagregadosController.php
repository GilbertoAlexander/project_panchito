<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingagregadosController extends Controller
{
    public function index()
    {
        return view('LANDING.agregados.index');
    }
}
