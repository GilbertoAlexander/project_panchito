@extends('TEMPLATE.administrador')

@section('title', 'SERVICIOS')

@section('css')
@endsection

@section('content')
<!-- Encabezado -->
<div class="row pt-5">
    <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Servicios</h1>
        <p class="text-muted">Se muestra el formulario para ver el detalle de un servicio</p>
    </div>
    <div class="col-lg-3 d-flex">
    </div>
</div>
<!-- fin encabezado -->

{{-- contenido --}}
    <div class="card border-4 borde-top-primary shadow-sm mb-3">
        <div class="card-body">
            <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-7">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <div class="pb-3">
                                <label for="name_id" class="form-label">Nombre<span class="text-danger">*</span></label>
                                <label class="form-control form-control-sm"  maxlength="2000" name="descripcion" id="descripcion_id">{{$admin_servicio->name}}</label>
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="pb-3">
                                <label for="name_id" class="form-label">Tipo<span class="text-danger">*</span></label>
                                <label class="form-control form-control-sm"  maxlength="2000" name="descripcion" id="descripcion_id">{{$admin_servicio->tipo->name}}</label>
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="pb-3">
                                <label for="precio_id" class="form-label">Precio<span class="text-danger">*</span></label>
                                <label type="text" name="precio" id="precio_id" class="form-control form-control-sm" >{{$admin_servicio->precio}}</label>
                                @error('precio')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="pb-3">
                                <label for="descripcion_id" class="form-label">Descripcion<span class="text-danger">*</span></label>
                                <label class="form-control"  maxlength="2000" placeholder="Máximo 2000 caracteres" name="descripcion" id="descripcion_id" style="height: 80px;">{{$admin_servicio->descripcion}}</label>
                                @error('descripcion')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="pb-3">
                                <label for="contenido_id" class="form-label">Contenido<span class="text-danger">*</span></label>
                                <label class="form-control" name="contenido" >{!!$admin_servicio->contenido!!}</label>
                                @error('contenido')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="pb-3">
                        <label for="" class="form-label">Imagen principal<span class="text-danger">*</span></label>
                        <div class="card text-center imagecard rounded mb-0">  
                            <label for="uploadImage1" class=" my-auto text-center">
                                <img for="uploadImage1" id="uploadPreview1" alt="" class="py-auto" src="/images/servicios/{{$admin_servicio->imagen}}" style="width: 100%; height: auto;">   
                            </label>
                        </div>
                        @error('imagen_principal')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 
                </div> 
                <div class="col-12">
                    <p class="text-muted mb-2 small text-uppercase fw-bold">Cargue más imágenes (opcional)</p> 
                    <div class="card imagecardfiles" style="min-height: 200px">
                        <div class="card-body">
                            <div id="container_images_multiple">

                            </div>
                            <div class="row my-3">
                                @foreach($admin_servicio->images as $image)
                                    <div class="col-6 col-md-3 col-lg-4 mb-2">
                                        <div class="card text-center imagecard rounded bg-light mb-0" style="height: 160px">  
                                            <label class=" my-auto text-center">
                                                <img for="uploadImage1" id="uploadPreview1" alt="" class="py-auto rounded" style="width: 100%; height: 156px;" src="{{$image->url}}">   
                                            </label>
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
        <a href="{{url('admin-servicios')}}" class="btn btn-outline-secondary">Atras</a>
    </div>
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