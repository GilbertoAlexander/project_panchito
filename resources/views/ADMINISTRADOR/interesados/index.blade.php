@extends('TEMPLATE.administrador')

@section('title', 'INTERESADOS')

@section('css')
@endsection

@section('content')
<!-- Encabezado -->
<div class="row pt-5">
    <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Interesados</h1>
        <p class="text-muted">Se muestra la lista de interesados registrados</p>
    </div>
    <div class="col-lg-3 d-flex">
       
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
                    <th class="h6 small text-uppercase fw-bold">Nombres y apellidos</th>
                    <th class="h6 small text-uppercase fw-bold">Email</th>
                    <th class="h6 small text-uppercase fw-bold">Nro. de contacto</th>
                    <th class="h6 small text-uppercase fw-bold">Cotización interesada</th>
                    <th class="h6 small text-uppercase fw-bold">Estado</th>
                    <th class="h6 small text-uppercase fw-bold text-center">Acciones</th>
                </tr>
            </thead>
            @php
                $contador = 1;
            @endphp
            <tbody class="text-center">
                @foreach($interesados as $admin_interesado)
                    <tr>
                        <td class="fw-light align-middle">{{$contador}}</td>
                        <td class="fw-light align-middle">{{$admin_interesado->name}}</td>
                        <td class="fw-light align-middle">{{$admin_interesado->email}}</td>
                        <td class="fw-light align-middle">{{$admin_interesado->celular}}</td>
                        <td class="fw-light align-middle">{{$admin_interesado->servicio_id?$admin_interesado->servicio->tipo->name:$admin_interesado->cotizacion_interesada}}</td>
                        <td class="fw-light align-middle">
                            <form method="POST" action="/admin-equipo/estado/{{$admin_interesado->slug}}" class="form-update">
                            @csrf
                            @method('PUT')
                                @if($admin_interesado->estado == 'Imcompleto')
                                    <span class="badge bg-danger border-0">Imcompleto</span>
                                @elseif($admin_interesado->estado =='Por atender')
                                    <span class="badge bg-info border-0">Por atender</span>
                                @elseif($admin_interesado->estado =='En proceso')
                                    <span class="badge bg-warning border-0">En proceso</span>
                                @else
                                    <span class="badge bg-success border-0">Atendido</span>
                                @endif
                            </form>
                        </td>  
                        <td class="align-middle">                                        
                            <div class="text-center">
                                @if($admin_interesado->estado != 'Atendido')
                                    <form method="POST" action="{{ route('admin-interesados.destroy',$admin_interesado->slug) }}" class="form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary text-white btn-sm"><i class="bi bi-trash-fill"></i></button>        
                                    </form>
                                @else
                                    <button type="submit" disabled class="btn btn-primary text-white btn-sm"><i class="bi bi-trash-fill"></i></button>        
                                @endif
                            </div>       
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