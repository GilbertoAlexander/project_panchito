@extends('TEMPLATE.administrador')

@section('title', 'CLIENTES')

@section('css')
@endsection

@section('content')
<!-- Encabezado -->
<div class="row pt-5">
    <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Clientes</h1>
        <p class="text-muted">Se muestra la lista de clientes registrados</p>
    </div>
    {{-- <div class="col-lg-3 d-flex">
        <a href="{{url('admin-clientes/create')}}" class="btn btn-secondary w-100 align-self-center text-white mb-2 mb-md-0">
            <i class="bi bi-plus-circle-fill me-2"></i>
            Nuevo registro
        </a>
    </div> --}}
</div>
<!-- fin encabezado -->
<div class="row">
    <div class="col-12 col-md-4">
        <form class="form-group" method="POST" action="/admin-clientes" enctype="multipart/form-data" autocomplete="off">      
            @csrf
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card border-4 borde-top-primary shadow-sm py-2 mb-3">
                        <div class="card-body">
                            <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                            <div class="pb-3">
                                <label for="" class="form-label">Foto</label>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="card text-center imagecard rounded mb-0" style="width: 145px; height: 145px">  
                                        <label for="uploadImagexy" class="">
                                            <img for="uploadImagexy" id="uploadPreviewxy" alt="" class=" rounded" width="100%" height="140" src="/images/icon-photo.png">   
                                        </label>
                                    </div>
                                </div>
                                
                                <input id="uploadImagexy" type="file" name="imagen" onchange="previewImage1('xy');" hidden/>
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
                        <div class="pb-3 text-end me-2">
                            <button type="submit" class="btn btn-primary px-5 my-2 my-md-0 text-white">Registrar</button>
                        </div>        
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-md-8">
        <div class="card border-4 borde-top-primary shadow-sm h-100" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <div class="card-body">
                <table id="" class="display table table-hover table-sm" cellspacing="0" style="width:100%">
                    <thead class="bg-light text-center">
                        <tr>
                            <th class="h6 small text-uppercase fw-bold">N??</th>
                            <th class="h6 small text-uppercase fw-bold">Foto</th>
                            <th class="h6 small text-uppercase fw-bold">Nombre</th>
                            <th class="h6 small text-uppercase fw-bold">Estado</th>
                            <th class="h6 small text-uppercase fw-bold text-center">Acciones</th>
                        </tr>
                    </thead>
                    @php
                        $contador = 1;
                    @endphp
                    <tbody class="text-center">
                        @foreach($clientes as $admin_cliente)
                            <tr>
                                <td class="fw-normal align-middle">{{$contador}}</td>
                                <td class="fw-normal align-middle">
                                    <img src="/images/clientes/{{$admin_cliente->imagen}}" class="img-fluid" style="width: 40px; height: 40px;" alt="">
                                </td>
                                <td class="fw-normal align-middle">{{$admin_cliente->name}}</td>
                                <td class="fw-light align-middle">
                                    <form method="POST" action="/admin-clientes/estado/{{$admin_cliente->slug}}" class="form-update">
                                    @csrf
                                    @method('PUT')
                                        @if($admin_cliente->estado == 'Activo')
                                            <button type="submit" class="badge bg-success border-0">Activo</button>
                                        @else
                                            <button type="submit" class="badge bg-danger border-0">Inactivo</button>
                                        @endif
                                    </form>
                                </td>  
                                <td class="align-middle">                                        
                                    <form method="POST" action="{{ route('admin-clientes.destroy',$admin_cliente->slug) }}" class="form-delete">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <a href="" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye-fill"></i></a> --}}
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editcliente{{$admin_cliente->slug}}"><i class="bi bi-pencil-square"></i></button>
                                        <button type="submit" class="btn btn-outline-primary btn-sm"><i class="bi bi-trash-fill"></i></button>        
                                    </form>       
                                </td>
                            </tr>
                        @include('ADMINISTRADOR.clientes.edit')
                        @php
                            $contador++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Contenido -->
<!-- Fin contenido -->
@endsection

@section('js')
    <script>
        $(function() {
            $('#toggle-two').bootstrapToggle({
            on: 'Enabled',
            off: 'Disabled'
            });
        })
    </script>
    <!--sweet alert agregar-->
    @if(session('addcliente') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#0048A4',
            title: '????xito!',
            text: 'Cliente registrado correctamente',
            })
        </script>
    @endif

    <!--sweet alert actualizar-->
    @if(session('update') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#0048A4',
            title: '??Actualizado!',
            text: 'Registro actualizado correctamente',
            })
        </script>
    @endif
        
    <!--sweet alert eliminar-->
    @if(session('delete') == 'ok')
        <script>
        Swal.fire({
            icon: 'success',
            confirmButtonColor: '#0048A4',
            title: '??Eliminado!',
            text: 'Registro eliminado correctamente',
            })
        </script>
    @endif
    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '??Estas seguro?',
            text: "??No podr??s revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0048A4',
            cancelButtonColor: '#FF4A17',
            confirmButtonText: '??S??, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                
            this.submit();
            }
            })

        });
    </script>
    <!--.sweet alert eliminar-->
    <script>
        function previewImage1(cre) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('uploadImage'+cre).files[0]);         
        reader.onload = function (e) {             
            document.getElementById('uploadPreview'+cre).src = e.target.result;         
        };     
        }
    </script>
    @yield('fotoeditcliente')
@endsection