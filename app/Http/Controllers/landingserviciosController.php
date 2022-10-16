<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingserviciosController extends Controller
{
    public function index()
    {
        return view('LANDING.servicios.index');
    }
}
