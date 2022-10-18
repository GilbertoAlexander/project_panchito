<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreAgregadoRequest;
use App\Models\Agregado;
use App\Models\Tipo;
use App\Models\Image;
class adminagregadosController extends Controller
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
        $agregados = Agregado::all();
        return view('ADMINISTRADOR.agregados.index', compact('agregados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ADMINISTRADOR.agregados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgregadoRequest $request)
    {
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $img_servicio = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/agregados/', $img_servicio);
        }
        // condicion para guardar el nombre de las imagenes opcionales
        $urlimagenes = [];
        if ($request->hasFile('images_opcional')){
            $imagenes = $request->file('images_opcional');
            foreach ($imagenes as $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $imagen->move(public_path().'/images/agregados-opcional/', $nombre);
                $urlimagenes[]['url']='/images/agregados-opcional/'.$nombre;
            }
        }

        $servicios = new Agregado();
        $servicios->name = $request->input('name');
        $servicios->slug = Str::slug($request->input('name'));
        $servicios->descripcion = $request->input('descripcion');
        $servicios->contenido = $request->input('contenido');
        $servicios->precio = $request->input('precio');
        $servicios->imagen = $img_servicio;
        $servicios->estado = 'Inactivo';
        $servicios->save();

        // guardar las imagenes opcionales
        $servicios->images()->createMany($urlimagenes);

        return redirect()->route('admin-agregados.index')->with('addagregado', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Agregado $admin_agregado)
    {
        return view('ADMINISTRADOR.agregados.show', compact('admin_agregado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Agregado $admin_agregado)
    {
        return view('ADMINISTRADOR.agregados.edit', compact('admin_agregado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function estado(Agregado $admin_agregado)
    {
        if($admin_agregado->estado == 'Activo'){
            $admin_agregado->update([
                'estado' => 'Inactivo',
            ]);
            $admin_agregado->save();
            return redirect()->back()->with('update', 'ok');
        }else{
            $admin_agregado->update([
                'estado' => 'Activo',
            ]);
            $admin_agregado->save();
            return redirect()->back()->with('update', 'ok');
        }
    }
    public function update(Request $request, Agregado $admin_agregado)
    {
        $admin_agregado->slug = Str::slug($request->input('name'));
        $admin_agregado->fill($request->except('imagen', 'fecha'));
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $imagen = time().$file->getClientOriginalName();
            if ($admin_agregado->imagen) {
                $file_path = public_path(). '/images/agregados/'.$admin_agregado->imagen;
                File::delete($file_path);
                $admin_agregado->update([
                    $admin_agregado->imagen = $imagen,
                    $file->move(public_path().'/images/agregados/', $imagen)
                ]);
            }else{
                $admin_agregado->create([
                    $admin_agregado->imagen = $imagen,
                    $file->move(public_path().'/images/agregados/', $imagen)
                ]);
            }
        }
        // condicion para guardar el nombre de las imagenes opcionales
        $urlimagenes = [];
        if ($request->hasFile('images_opcional')){
            $imagenes = $request->file('images_opcional');
            foreach ($imagenes as $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $imagen->move(public_path().'/images/agregados-opcional/', $nombre);
                $urlimagenes[]['url']='/images/agregados-opcional/'.$nombre;
            }
        }
        $admin_agregado->save();
        // guardar las imagenes opcionales
        $admin_agregado->images()->createMany($urlimagenes);

        return redirect()->route('admin-agregados.index')->with('update', 'ok');
    }
    public function deleteImage($id)
    {
        $image = Image::find($id);
        $file_path = public_path(). $image->url; 
        File::delete($file_path);
        $image->delete();
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agregado $admin_agregado)
    {
        // eliminar la imagen principal del producto
        $file_path = public_path(). '/images/agregados/'.$admin_agregado->imagen; 
        File::delete($file_path);
        // eliminar las imagenes opcionales del producto
        $images = $admin_agregado->images;
        foreach ($images as $image) {
            File::delete(public_path().$image->url);
            $image->delete();
        }
        // eliminar registro de productos
        $admin_agregado->delete();
        return redirect()->route('admin-agregados.index')->with('delete', 'ok');
    }
}
