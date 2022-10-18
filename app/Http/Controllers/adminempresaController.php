<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Ubigeo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class adminempresaController extends Controller
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
        $admin_empresa = Empresa::find(1);
        return view('ADMINISTRADOR.empresa.index', compact('admin_empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Empresa $admin_empresa)
    {
        $ubigeos = Ubigeo::all();
        return view('ADMINISTRADOR.empresa.edit', compact('admin_empresa', 'ubigeos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $admin_empresa)
    {
        $admin_empresa['slug'] = Str::slug($request->input('razonsocial'));
        $admin_empresa->fill($request->except('img_principal', 'img_portada', 'logo', 'img_mision', 'img_vision', 'img_nosotros', 'slug'));
        if ($request->hasFile('img_principal')) {
            $file = $request->file('img_principal');
            $img_principal = time().$file->getClientOriginalName();
            if ($admin_empresa->img_principal) {
                $file_path = public_path(). '/images/empresa/'.$admin_empresa->img_principal;
                File::delete($file_path);
                $admin_empresa->update([
                    $admin_empresa->img_principal = $img_principal,
                    $file->move(public_path().'/images/empresa/', $img_principal)
                ]);
            }
        }
        
        if ($request->hasFile('img_portada')) {
            $file = $request->file('img_portada');
            $portada = time().$file->getClientOriginalName();
            if ($admin_empresa->img_portada) {
                $file_path = public_path(). '/images/empresa/'.$admin_empresa->img_portada;
                File::delete($file_path);
                $admin_empresa->update([
                    $admin_empresa->img_portada = $portada,
                    $file->move(public_path().'/images/empresa/', $portada)
                ]);
            }
        }
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $logo = time().$file->getClientOriginalName();
            if ($admin_empresa->logo) {
                $file_path = public_path(). '/images/empresa/'.$admin_empresa->logo;
                File::delete($file_path);
                $admin_empresa->update([
                    $admin_empresa->logo = $logo,
                    $file->move(public_path().'/images/empresa/', $logo)
                ]);
            }
        }
        if ($request->hasFile('img_mision')) {
            $file = $request->file('img_mision');
            $img_mision = time().$file->getClientOriginalName();
            if ($admin_empresa->img_mision) {
                $file_path = public_path(). '/images/empresa/'.$admin_empresa->img_mision;
                File::delete($file_path);
                $admin_empresa->update([
                    $admin_empresa->img_mision = $img_mision,
                    $file->move(public_path().'/images/empresa/', $img_mision)
                ]);
            }
        }
        if ($request->hasFile('img_vision')) {
            $file = $request->file('img_vision');
            $img_vision = time().$file->getClientOriginalName();
            if ($admin_empresa->img_vision) {
                $file_path = public_path(). '/images/empresa/'.$admin_empresa->img_vision;
                File::delete($file_path);
                $admin_empresa->update([
                    $admin_empresa->img_vision = $img_vision,
                    $file->move(public_path().'/images/empresa/', $img_vision)
                ]);
            }
        }
        if ($request->hasFile('img_nosotros')) {
            $file = $request->file('img_nosotros');
            $img_nosotros = time().$file->getClientOriginalName();
            if ($admin_empresa->img_nosotros) {
                $file_path = public_path(). '/images/empresa/'.$admin_empresa->img_nosotros;
                File::delete($file_path);
                $admin_empresa->update([
                    $admin_empresa->img_nosotros = $img_nosotros,
                    $file->move(public_path().'/images/empresa/', $img_nosotros)
                ]);
            }
        }
        $admin_empresa->slug = Str::slug($request->input('razonsocial'));
        // condicion para guardar el nombre de las imagenes opcionales
        $urlimagenes = [];
        if ($request->hasFile('images_opcional')){
            $imagenes = $request->file('images_opcional');
            foreach ($imagenes as $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $imagen->move(public_path().'/images/empresa/banner/', $nombre);
                $urlimagenes[]['url']='/images/empresa/banner/'.$nombre;
            }
        }
        $admin_empresa->save();
        // guardar las imagenes opcionales
        $admin_empresa->images()->createMany($urlimagenes);

        return redirect()->route('admin-empresa.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
