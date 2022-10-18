<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class adminclientesController extends Controller
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
        $clientes = Cliente::all();
        return view('ADMINISTRADOR.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ADMINISTRADOR.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // condicion para guardar el nombre de la imagen principal
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $img_cliente = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/clientes/', $img_cliente);
        }

        $cliente = new Cliente();
         $cliente->name = $request->input('name');
         $cliente->slug = Str::slug($request->input('name'));
         $cliente->imagen = $img_cliente;
         $cliente->estado = 'Inactivo';
         $cliente->save();

        return redirect()->route('admin-clientes.index')->with('addcliente', 'ok');
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

    public function estado(Cliente $admin_cliente)
    {
        if($admin_cliente->estado == 'Activo'){
            $admin_cliente->update([
                'estado' => 'Inactivo',
            ]);
            $admin_cliente->save();
            return redirect()->back()->with('update', 'ok');
        }else{
            $admin_cliente->update([
                'estado' => 'Activo',
            ]);
            $admin_cliente->save();
            return redirect()->back()->with('update', 'ok');
        }
    }

    public function update(Request $request, Cliente $admin_cliente)
    {
        $admin_cliente['slug'] = Str::slug($request->input('name'));
        $admin_cliente->fill($request->except('imagen'));
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $imagen = time().$file->getClientOriginalName();
            if ($admin_cliente->imagen) {
                $file_path = public_path(). '/images/clientes/'.$admin_cliente->imagen;
                File::delete($file_path);
                $admin_cliente->update([
                    $admin_cliente->imagen = $imagen,
                    $file->move(public_path().'/images/clientes/', $imagen)
                ]);
            }else{
                $admin_cliente->create([
                    $admin_cliente->imagen = $imagen,
                    $file->move(public_path().'/images/clientes/', $imagen)
                ]);
            }
        }
        $admin_cliente->save();

        return redirect()->route('admin-clientes.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $admin_cliente)
    {
        $file_path = public_path(). '/images/clientes/'.$admin_cliente->imagen; 
        File::delete($file_path);

        $admin_cliente->delete();
        return redirect()->back()->with('delete', 'ok');
    }
}
