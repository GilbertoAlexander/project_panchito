@extends('TEMPLATE.administrador')

@section('title', 'AGREGADOS')

@section('css')
@endsection

@section('content')
<!-- Encabezado -->
<div class="row pt-5">
    <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Agregados</h1>
        <p class="text-muted">Se muestra el formulario para actualizar un agregado</p>
    </div>
    <div class="col-lg-3 d-flex">
    </div>
</div>
<!-- fin encabezado -->

{{-- contenido --}}
<form class="form-group" method="POST" action="/admin-agregados/{{$admin_agregado->slug}}" enctype="multipart/form-data" autocomplete="off">      
    @csrf
    @method('put')
    <div class="card border-4 borde-top-primary shadow-sm mb-3">
        <div class="card-body">
            <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
            <div class="row">
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="row">
                        <div class="col-12 col-md-8 col-lg-8">
                            <div class="pb-3">
                                <label for="name_id" class="form-label">Nombre<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name_id" value="{{$admin_agregado->name}}" class="form-control form-control-sm" maxLength="100">
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="pb-3">
                                <label for="precio_id" class="form-label">Precio<span class="text-danger">*</span></label>
                                <input type="number" name="precio" id="precio_id" value="{{$admin_agregado->precio}}" class="form-control form-control-sm" step="0.01">
                                @error('precio')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div> 
                    <div class="pb-3">
                        <label for="descripcion_id" class="form-label">Descripcion<span class="text-danger">*</span></label>
                        <textarea class="form-control" maxlength="2000" placeholder="M??ximo 2000 caracteres" name="descripcion" id="descripcion_id" style="height: 100px">{{$admin_agregado->descripcion}}</textarea>
                        @error('descripcion')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>   
                    
                    <div class="pb-3">
                        <label for="contenido_id" class="form-label">Contenido<span class="text-danger">*</span></label>
                        <textarea class="form-control ck-editor__editable" name="contenido" id="editor">{!!$admin_agregado->contenido!!}</textarea>
                        @error('contenido')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="pb-3">
                        <label for="" class="form-label">Imagen principal<span class="text-danger">*</span></label>
                        <div class="card text-center imagecard rounded mb-0">  
                            <label for="uploadImage1" class=" my-auto text-center">
                                <img for="uploadImage1" id="uploadPreview1" alt="" class="py-auto" src="/images/agregados/{{$admin_agregado->imagen}}" style="width: 100%; height: auto;">   
                            </label>
                        </div>
                        <input id="uploadImage1" class="form-control-file" type="file" name="imagen" onchange="previewImage(1);" hidden/>
                        @error('imagen_principal')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 
                </div>
                <div class="col-12">
                    <p class="text-muted mb-2 small text-uppercase fw-bold">Cargue m??s im??genes (opcional)</p> 
                    <div class="card imagecardfiles" style="min-height: 200px">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="multiple__imagenes" class="btn btn-sm btn-info text-white"><i class="bi bi-upload me-2"></i>Subir im??genes</label>
                                    <input type="file" onchange="preview()" multiple accept="image/*" id="multiple__imagenes" name="images_opcional[]" hidden>
                                </div>
                                <div class="col-12 col-md-6">
                                    <p id="numero_archivos" class="text-start text-md-end small fw-bold text-muted">0 archivos seleccionados</p>
                                </div>
                            </div>
                            <div id="container_images_multiple">

                            </div>
                            <div class="row my-3">
                                @foreach($admin_agregado->images as $image)
                                    <div class="col-6 col-md-3 col-lg-4">
                                        <div class="card text-center imagecard rounded bg-light mb-0" style="height: 160px">  
                                            <label class=" my-auto text-center">
                                                <img for="uploadImage1" id="uploadPreview1" alt="" class="py-auto rounded" style="width: 100%; height: 156px;" src="{{$image->url}}">   
                                            </label>
                                            <div class="card-img-overlay">
                                                <a type="button" href="/images/{{$image->id}}/delete" class="btn btn-danger btn-sm float-end"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="pb-3 text-end">
        <a href="{{url('admin-servicios')}}" class="btn btn-outline-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary px-5 my-2 my-md-0 text-white">Actualizar</button>
    </div>
</form>        
{{-- fin contenido --}}
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
    <script>
        function previewImage(nb) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
        reader.onload = function (e) {             
            document.getElementById('uploadPreview'+nb).src = e.target.result;         
        };     
        }
    </script>
    <script>
        let multiple__imagenes = document.getElementById("multiple__imagenes");
        let container_images_multiple = document.getElementById("container_images_multiple");
        let numero_archivos = document.getElementById("numero_archivos");
    
        function preview(){
            container_images_multiple.innerHTML = "";
            numero_archivos.textContent = `${multiple__imagenes.files.length} archivos seleccionados`;
    
            for(i of multiple__imagenes.files){
                let reader = new FileReader();
                let figure = document.createElement("figure");
                let figCap = document.createElement("figcaption");
                figCap.innerText = i.name;
                figure.appendChild(figCap);
                reader.onload=()=>{
                    let img = document.createElement("img");
                    img.setAttribute("src",reader.result);
                    img.classList.add('img_opcional');
                    figure.insertBefore(img,figCap);
                }
                container_images_multiple.appendChild(figure);
                reader.readAsDataURL(i);
            }
    
        }
    
    </script>
@endsection