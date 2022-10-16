@extends('TEMPLATE.administrador')

@section('title', 'CLIENTES')

@section('css')
@endsection

@section('content')
<!-- Encabezado -->
<div class="row pt-5">
    <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Clientes</h1>
        <p class="text-muted">Se muestra el formulario para registrar un nuevo cliente</p>
    </div>
    <div class="col-lg-3 d-flex">
       
    </div>
</div>
<!-- fin encabezado -->
{{-- contenido --}}
<form class="form-group" method="POST" action="/admin-equipo" enctype="multipart/form-data" autocomplete="off">      
    @csrf
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card border-4 borde-top-primary shadow-sm py-2 mb-3">
                <div class="card-body">
                    <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                    <div class="pb-3">
                        <label for="" class="form-label">Foto</label>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="card text-center imagecard rounded mb-0" style="width: 145px; height: 145px">  
                                <label for="uploadImage1" class="">
                                    <img for="uploadImage1" id="uploadPreview1" alt="" class=" rounded" width="100%" height="140" src="/images/icon-photo.png">   
                                </label>
                            </div>
                        </div>
                        
                        <input id="uploadImage1" type="file" name="imagen" onchange="previewImage(1);" hidden/>
                        @error('imagen')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="pb-3">
                        <label for="titulo_id" class="form-label">Nombre<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="titulo_id" value="{{old('')}}" class="form-control form-control-sm" maxLength="100">
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>                      
                </div>
            </div>
            <div class="pb-3 text-end">
                <a href="{{url('admin-clientes')}}" class="btn btn-outline-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary px-5 my-2 my-md-0 text-white">Registrar</button>
            </div>        
        </div>
    </div>
</form>
{{-- fin contenido --}}
@endsection

@section('js')
    <script>
        function previewImage(nb) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
        reader.onload = function (e) {             
            document.getElementById('uploadPreview'+nb).src = e.target.result;         
        };     
        }
    </script>
@endsection