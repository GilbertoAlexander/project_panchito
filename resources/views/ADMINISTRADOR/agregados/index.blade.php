@extends('TEMPLATE.administrador')

@section('title', 'AGREGADOS')

@section('css')
@endsection

@section('content')
<!-- Encabezado -->
<div class="row pt-5">
    <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Agregados</h1>
        <p class="text-muted">Se muestra la lista de agregados registrados</p>
    </div>
    <div class="col-lg-3 d-flex">
        <a href="{{url('admin-agregados/create')}}" class="btn btn-secondary w-100 align-self-center text-white mb-2 mb-md-0">
            <i class="bi bi-plus-circle-fill me-2"></i>
            Nuevo registro
        </a>
    </div>
</div>
<!-- fin encabezado -->

<!-- Contenido -->
<div class="card border-4 borde-top-primary shadow-sm h-100" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
    <div class="card-body">
        <table id="" class="display table table-hover table-sm" cellspacing="0" style="width:100%">
            <thead class="bg-light text-center">
                <tr>
                    <th class="h6 small text-uppercase fw-bold">N°</th>
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
                @foreach ($agregados as $admin_agregado)
                    <tr>
                        <td class="fw-normal align-middle">{{$contador}}</td>
                        <td class="fw-normal align-middle">
                            <img src="/images/agregados/{{$admin_agregado->imagen}}" class="img-fluid" style="width: 40px; height: 40px;" alt="">
                        </td>
                        <td class="fw-normal align-middle">{{$admin_agregado->name}}</td>
                        <td class="fw-light align-middle">
                            <form method="POST" action="/admin-agregados/estado/{{$admin_agregado->slug}}" class="form-update">
                            @csrf
                            @method('PUT')
                                @if($admin_agregado->estado == 'Activo')
                                    <button type="submit" class="badge bg-success border-0">Activo</button>
                                @else
                                    <button type="submit" class="badge bg-danger border-0">Inactivo</button>
                                @endif
                            </form>
                        </td>
                        <td class="align-middle">                                        
                            <form method="POST" action="{{ route('admin-agregados.destroy',$admin_agregado->slug) }}" class="form-delete">
                                @csrf
                                @method('DELETE')
                                <a href="{{ url("admin-agregados/$admin_agregado->slug")}}" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye-fill"></i></a>
                                <a href="{{ url("admin-agregados/$admin_agregado->slug/edit")}}" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <button type="submit" class="btn btn-outline-primary btn-sm"><i class="bi bi-trash-fill"></i></button>        
                            </form>       
                        </td>
                    </tr>
                @php
                    $contador++;
                @endphp
                @endforeach     
            </tbody>
        </table>
    </div>
</div>
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
    @if(session('addagregado') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#0048A4',
            title: '¡Éxito!',
            text: 'Agregado registrado correctamente',
            })
        </script>
    @endif

    <!--sweet alert actualizar-->
    @if(session('update') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#0048A4',
            title: '¡Actualizado!',
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
            title: '¡Eliminado!',
            text: 'Registro eliminado correctamente',
            })
        </script>
    @endif
    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0048A4',
            cancelButtonColor: '#FF4A17',
            confirmButtonText: '¡Sí, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                
            this.submit();
            }
            })

        });
    </script>
    <!--.sweet alert eliminar-->
@endsection