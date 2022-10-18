<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreServicioRequest;
use App\Models\Tipo;
use App\Models\Image;
class adminserviciosController extends Controller
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
        $servicio = Servicio::all();
        return view('ADMINISTRADOR.servicios.index', compact('servicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::all();
        return view('ADMINISTRADOR.servicios.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServicioRequest $request)
    {
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $img_servicio = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/servicios/', $img_servicio);
        }
        // condicion para guardar el nombre de las imagenes opcionales
        $urlimagenes = [];
        if ($request->hasFile('images_opcional')){
            $imagenes = $request->file('images_opcional');
            foreach ($imagenes as $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $imagen->move(public_path().'/images/servicios-opcional/', $nombre);
                $urlimagenes[]['url']='/images/servicios-opcional/'.$nombre;
            }
        }

        $servicios = new Servicio();
        $servicios->name = $request->input('name');
        $servicios->slug = Str::slug($request->input('name'));
        $servicios->descripcion = $request->input('descripcion');
        $servicios->contenido = $request->input('contenido');
        $servicios->tipo_id = $request->input('tipo_id');
        $servicios->imagen = $img_servicio;
        $servicios->estado = 'Inactivo';
        $servicios->save();

        // guardar las imagenes opcionales
        $servicios->images()->createMany($urlimagenes);

        return redirect()->route('admin-servicios.index')->with('addservicio', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $admin_servicio)
    {
        return view('ADMINISTRADOR.servicios.show', compact('admin_servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $admin_servicio)
    {
        $tipos = Tipo::all();
        return view('ADMINISTRADOR.servicios.edit', compact('admin_servicio','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function estado(Servicio $admin_servicio)
    {
        if($admin_servicio->estado == 'Activo'){
            $admin_servicio->update([
                'estado' => 'Inactivo',
            ]);
            $admin_servicio->save();
            return redirect()->back()->with('update', 'ok');
        }else{
            $admin_servicio->update([
                'estado' => 'Activo',
            ]);
            $admin_servicio->save();
            return redirect()->back()->with('update', 'ok');
        }
    }
    public function update(Request $request, Servicio $admin_servicio)
    {
        $admin_servicio->slug = Str::slug($request->input('name'));
        $admin_servicio->fill($request->except('imagen', 'fecha'));
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $imagen = time().$file->getClientOriginalName();
            if ($admin_servicio->imagen) {
                $file_path = public_path(). '/images/servicios/'.$admin_servicio->imagen;
                File::delete($file_path);
                $admin_servicio->update([
                    $admin_servicio->imagen = $imagen,
                    $file->move(public_path().'/images/servicios/', $imagen)
                ]);
            }else{
                $admin_servicio->create([
                    $admin_servicio->imagen = $imagen,
                    $file->move(public_path().'/images/servicios/', $imagen)
                ]);
            }
        }
        // condicion para guardar el nombre de las imagenes opcionales
        $urlimagenes = [];
        if ($request->hasFile('images_opcional')){
            $imagenes = $request->file('images_opcional');
            foreach ($imagenes as $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $imagen->move(public_path().'/images/servicios-opcional/', $nombre);
                $urlimagenes[]['url']='/images/servicios-opcional/'.$nombre;
            }
        }
        $admin_servicio->save();
        // guardar las imagenes opcionales
        $admin_servicio->images()->createMany($urlimagenes);

        return redirect()->route('admin-servicios.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteImage($id)
    {
        $image = Image::find($id);
        $file_path = public_path(). $image->url; 
        File::delete($file_path);
        $image->delete();
        return redirect()->back();
    }
    public function destroy(Servicio $admin_servicio)
    {
        // eliminar la imagen principal del producto
        $file_path = public_path(). '/images/servicios/'.$admin_servicio->imagen; 
        File::delete($file_path);
        // eliminar las imagenes opcionales del producto
        $images = $admin_servicio->images;
        foreach ($images as $image) {
            File::delete(public_path().$image->url);
            $image->delete();
        }
        // eliminar registro de productos
        $admin_servicio->delete();
        return redirect()->route('admin-servicios.index')->with('delete', 'ok');
    }
}
