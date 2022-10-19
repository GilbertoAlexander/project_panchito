@extends('TEMPLATE.administrador')

@section('title', 'EMPRESA')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Empresa</h1>
                <p class="text-muted">Se muestra el detalle de la información de la empresa</p>
            </div>
            <div class="col-lg-3 d-flex">
                
            </div>
        </div>
    <!-- fin encabezado -->

    {{-- Contenido --}}
    <form class="form-group" method="POST" action="/admin-empresa/{{$admin_empresa->slug}}" enctype="multipart/form-data" autocomplete="off">      
        @csrf
        @method('put')
        <div class="card border-4 borde-top-primary shadow-sm py-2 mb-3 h-100">
            <div class="card-body">
                <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                <div class="pb-3">
                    <label for="" class="form-label pt-2">Portada - <span class="text-muted">Tamaño referencial (1920x642)</span><span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="card text-center imagecard rounded bg-light mb-0 portada" style="width: 100%; height: auto;">  
                            <label for="uploadImage1" class="">
                                <img for="uploadImage1" id="uploadPreview1" alt="" class="rounded portada" style="width:100%; height: auto;" src="/images/empresa/{{$admin_empresa->img_portada}}">   
                            </label>
                        </div>
                    </div>
                    
                    <input id="uploadImage1" class="form-control-file" type="file" name="img_portada" onchange="previewImagePortada(1);"hidden/>
                    @error('portada')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12 col-md-3 col-lg-2 pb-3">
                        <label for="" class="form-label">Logo<span class="text-danger">*</span></label>
                        <div class="d-flex justify-content-center ">
                            <div class="card text-center imagecard rounded bg-light mb-0" style="width: 100%; height:189px;">  
                                <label for="uploadImage2" class="">
                                    <img for="uploadImage2" id="uploadPreview2" alt="" class="rounded" style="width:100%; height:189px;" src="/images/empresa/{{$admin_empresa->logo}}">   
                                </label>
                            </div>
                        </div>
                        
                        <input id="uploadImage2" class="form-control-file" type="file" name="logo" onchange="previewImageLogo(2);" hidden/>
                        @error('logo')
                            <small class="text-danger">{{$message}}</small>
                        @enderror 
                    </div>
                    <div class="col-12 col-md-9 col-lg-10">
                        <div class="row">
                            <div class="col-12 col-md-7 col-lg-8">
                                <div class="pb-3">
                                    <label for="razonsocial_id" class="form-label">Razon social<span class="text-danger">*</span></label>
                                    <input type="text" name="razonsocial" id="razonsocial_id" value="{{$admin_empresa->razonsocial}}" class="form-control form-control-sm" maxLength="100">
                                    @error('razonsocial')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-5 col-lg-4">
                                <div class="pb-3">
                                    <label for="ruc_id" class="form-label">Nro. R.U.C.<span class="text-danger">*</span></label>
                                    <input type="number" name="ruc" id="ruc_id" value="{{$admin_empresa->ruc}}" class="form-control form-control-sm" maxLength="100">
                                    @error('ruc')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-5 col-lg-4">
                                <div class="pb-3">
                                    <label for="email_empresa_id" class="form-label">Email de empresa<span class="text-danger">*</span></label>
                                    <input type="email" name="email_empresa" id="email_empresa_id" value="{{$admin_empresa->email}}" class="form-control form-control-sm" maxLength="100">
                                    @error('email_empresa')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-5 col-lg-4">
                                <div class="pb-3">
                                    <label for="telefono_id" class="form-label">Nro. teléfono<span class="text-danger">*</span></label>
                                    <input type="number" name="telefono" id="telefono_id" value="{{$admin_empresa->telefono}}" class="form-control form-control-sm" maxLength="100">
                                    @error('telefono')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-5 col-lg-4">
                                <div class="pb-3">
                                    <label for="celular_id" class="form-label">Nro. celular<span class="text-danger">*</span></label>
                                    <input type="number" name="celular" id="celular_id" value="{{$admin_empresa->celular}}" class="form-control form-control-sm" maxLength="100">
                                    @error('celular')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="pb-3">
                                    <label for="nro_whatsapp_id" class="form-label">Nro. whatsapp<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-whatsapp"></i></span>
                                        <input type="number" name="nro_whatsapp" id="nro_whatsapp_id" value="{{$admin_empresa->nro_whatsapp}}" class="form-control form-control-sm" maxLength="100">
                                    </div>
                                    @error('nro_whatsapp')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-8 col-lg-5">
                                <div class="pb-3">
                                    <label for="ubigeo_select_id" class="form-label">Departamento/Provincia/distrito<span class="text-danger">*</span></label>
                                    <select class="form-select form-select-sm select2" name="ubigeo_id" id="ubigeo_select_id" aria-label=".form-select-sm example">
                                        <option value="{{$admin_empresa->ubigeo_id}}" disabled="disabled" selected="selected" hidden="hidden">{{$admin_empresa->ubigeo->departamento.'/'.$admin_empresa->ubigeo->provincia.'/'.$admin_empresa->ubigeo->distrito}}</option>
                                        @foreach($ubigeos as $ubigeo)
                                            <option value="{{$ubigeo->id}}">{{$ubigeo->departamento. ', '.$ubigeo->distrito. ', '.$ubigeo->provincia}}</option>
                                        @endforeach
                                </select>
                                    @error('ubigeo_id')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="pb-3">
                                    <label for="direccion_id" class="form-label">Dirección<span class="text-danger">*</span></label>
                                    <input type="text" name="direccion" id="direccion_id" value="{{$admin_empresa->direccion}}" class="form-control form-control-sm" maxLength="100">
                                    @error('direccion')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="pb-3">
                            <label for="referencia_id" class="form-label">Referencia<span class="text-danger">*</span></label>
                            <input type="text" name="referencia" id="referencia_id" value="{{$admin_empresa->referencia}}" class="form-control form-control-sm" maxLength="100">
                            @error('referencia')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="pb-3">
                            <label for="url_facebook_id" class="form-label">URL Facebook<span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-facebook"></i></span>
                                <input type="text" name="url_facebook" id="url_facebook_id" value="{{$admin_empresa->url_facebook}}" class="form-control form-control-sm" maxLength="100">
                            </div>
                            @error('url_facebook')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="pb-3">
                            <label for="url_youtube_id" class="form-label">URL Instagram<span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm ">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-youtube"></i></span>
                                <input type="text" name="url_instagram" id="url_instagram_id" value="{{$admin_empresa->url_instagram}}" class="form-control form-control-sm" maxLength="100">
                            </div>
                            @error('url_youtube')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="pb-3">
                            <label for="" class="form-label pt-2">Misión<span class="text-danger">*</span></label>
                            <input id="uploadImage3" class="form-control-file" type="file" name="img_mision" onchange="previewImageMision(3);" hidden/>
                            @error('img_mision')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="pb-3">
                            <textarea class="form-control" maxlength="2000" placeholder="Máximo 2000 caracteres" name="mision" id="mision_id" style="height: 205px">{{$admin_empresa->mision}}</textarea>
                            @error('mision')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>  
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="pb-3">
                            <label for="" class="form-label pt-2">Visión<span class="text-danger">*</span></label>
                            <input id="uploadImage4" class="form-control-file" type="file" name="img_vision" onchange="previewImageVision(4);" hidden/>
                            @error('img_vision')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="pb-3">
                            <textarea class="form-control" maxlength="2000" placeholder="Máximo 2000 caracteres" name="vision" id="nosotros_id" style="height: 205px">{{$admin_empresa->vision}}</textarea>
                            @error('vision')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>  
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="pb-3">
                            <label for="" class="form-label pt-2">¿Quienes somos?<span class="text-danger">*</span></label>
                            <input id="uploadImage5" class="form-control-file" type="file" name="img_nosotros" onchange="previewImageNosotros(5);" hidden/>
                            @error('img_nosotros')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="pb-3">
                            <textarea class="form-control" maxlength="2000" placeholder="Máximo 2000 caracteres" name="nosotros" id="nosotros_id" style="height: 205px">{{$admin_empresa->nosotros}}</textarea>
                            @error('nosotros')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <p class="text-muted mb-2 small text-uppercase fw-bold">Cargue más imágenes (opcional) - <span class="text-muted">Tamaño referencial (1920x1280)</span></p> 
                        <div class="card imagecardfiles" style="min-height: 200px">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="multiple__imagenes" class="btn btn-sm btn-info text-white"><i class="bi bi-upload me-2"></i>Subir imágenes</label>
                                        <input type="file" onchange="preview()" multiple accept="image/*" id="multiple__imagenes" name="images_opcional[]" hidden>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <p id="numero_archivos" class="text-start text-md-end small fw-bold text-muted">0 archivos seleccionados</p>
                                    </div>
                                </div>
                                <div id="container_images_multiple">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 pb-3">
                        <label for="" class="form-label">Imagenes del banner principal agregadas <span class="text-danger">*</span></label>
                        <div class="row">
                            @foreach($admin_empresa->images as $image)
                                <div class="col-6 col-md-3 col-lg-2">
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
        <div class="pt-3 pb-5 text-end">
            <a href="{{url('admin-empresa')}}" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary px-5 my-2 my-md-0 text-white">Actualizar registros</button>
        </div> 
    </form>    
    {{-- Fin contenido --}}
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
<script>
    function previewImagePortada(nb) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
        reader.onload = function (e) {             
            document.getElementById('uploadPreview'+nb).src = e.target.result;         
        };     
    }

    function previewImageLogo(nb) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
        reader.onload = function (e) {             
            document.getElementById('uploadPreview'+nb).src = e.target.result;         
        };     
    }
</script>
@endsection