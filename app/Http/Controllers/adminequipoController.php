<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipoRequest;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class adminequipoController extends Controller
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
        $equipos = Equipo::all();
        return view('ADMINISTRADOR.equipo.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ADMINISTRADOR.equipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipoRequest $request)
    {
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $img_equipos = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/equipos/', $img_equipos);
        }

        $equipos = new Equipo();
        $equipos->name = $request->input('name');
        $equipos->slug = Str::slug($request->input('name'));
        $equipos->cargo = $request->input('cargo');
        $equipos->estado = 'Inactivo';
        $equipos->imagen = $img_equipos;
        $equipos->save();

        return redirect()->route('admin-equipo.index')->with('addequipo', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $admin_equipo)
    {
        return view('ADMINISTRADOR.equipo.edit', compact('admin_equipo'));
    }


    public function estado(Equipo $admin_equipo)
    {
        if($admin_equipo->estado == 'Activo'){
            $admin_equipo->update([
                'estado' => 'Inactivo',
            ]);
            $admin_equipo->save();
            return redirect()->back()->with('update', 'ok');
        }else{
            $admin_equipo->update([
                'estado' => 'Activo',
            ]);
            $admin_equipo->save();
            return redirect()->back()->with('update', 'ok');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $admin_equipo)
    {
        $admin_equipo['slug'] = Str::slug($request->input('name'));
        $admin_equipo->fill($request->except('imagen'));
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $imagen = time().$file->getClientOriginalName();
            if ($admin_equipo->imagen) {
                $file_path = public_path(). '/images/equipos/'.$admin_equipo->imagen;
                File::delete($file_path);
                $admin_equipo->update([
                    $admin_equipo->imagen = $imagen,
                    $file->move(public_path().'/images/equipos/', $imagen)
                ]);
            }else{
                $admin_equipo->create([
                    $admin_equipo->imagen = $imagen,
                    $file->move(public_path().'/images/equipos/', $imagen)
                ]);
            }
        }
        $admin_equipo->save();

        return redirect()->route('admin-equipo.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $admin_equipo)
    {
        $file_path = public_path(). '/images/equipos/'.$admin_equipo->imagen; 
        File::delete($file_path);
        $admin_equipo->delete();
        return redirect()->route('admin-equipo.index')->with('delete', 'ok');
    }
}
