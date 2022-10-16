@extends('TEMPLATE.administrador')

@section('title', 'EQUIPO')

@section('css')
@endsection

@section('content')
<!-- Encabezado -->
<div class="row pt-5">
    <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Equipo</h1>
        <p class="text-muted">Se muestra la lista de miembros del equipo registrados</p>
    </div>
    <div class="col-lg-3 d-flex">
        <a href="{{url('admin-equipo/create')}}" class="btn btn-secondary w-100 align-self-center text-white mb-2 mb-md-0">
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
                    <th class="h6 small text-uppercase fw-bold">Cargo</th>
                    <th class="h6 small text-uppercase fw-bold">Estado</th>
                    <th class="h6 small text-uppercase fw-bold text-center">Acciones</th>
                </tr>
            </thead>
            <!-- @php
                $contador = 1;
            @endphp -->
            <tbody class="text-center">
                
                    <tr>
                        <td class="fw-normal align-middle">1</td>
                        <td class="fw-normal align-middle">
                            <img src="/images/FOTO_TRABAJADOR.png" class="img-fluid" style="width: 40px; height: 40px;" alt="">
                        </td>
                        <td class="fw-normal align-middle">Gilberto Alexander</td>
                        <td class="fw-normal align-middle">Chofer de volquete</td>
                        <td class="fw-normal align-middle">
                            <span class="badge bg-success tex-uppercase">Activo</span>
                        </td>
                        <td class="align-middle">                                        
                            <form method="POST" action="{{-- {{ route('admin-articulos.destroy',$admin_articulo->slug) }} --}}" class="form-delete">
                                <!-- @csrf
                                @method('DELETE') -->
                                <a href="" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <button type="submit" class="btn btn-outline-primary btn-sm"><i class="bi bi-trash-fill"></i></button>        
                            </form>       
                        </td>
                    </tr>
                   
                
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
    @if(session('addequipo') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#0048A4',
            title: '¡Éxito!',
            text: 'Equipo registrado correctamente',
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