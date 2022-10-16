<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingController extends Controller
{
    public function index()
    {
        return view('LANDING.index');
    }

    public function nosotros()
    {
        return view('LANDING.nosotros');
    }

    public function contacto()
    {
        return view('LANDING.contacto');
    }
}
