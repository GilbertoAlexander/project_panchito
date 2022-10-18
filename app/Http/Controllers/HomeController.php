<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch(auth()->user()->role_id == 1 || auth()->user()->role_id == 2){
            case ('1'):
                return redirect()->route('admin-empresa.index');
            break;
            case ('2'):
                return redirect()->route('admin-empresa.index');
            break;
        }
    }
}
