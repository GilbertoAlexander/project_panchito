@extends('TEMPLATE.administrador')

@section('title', 'COTIZACIONES DE SERVICIOS')

@section('css')
@endsection

@section('content')
<!-- Encabezado -->
<div class="row pt-5">
    <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Cotizaciones de servicio</h1>
        <p class="text-muted">Se muestra la lista de cotizaciones de servicios registrados</p>
    </div>
    <div class="col-lg-3 d-flex">
        <a href="{{url('admin-cotizaciones-servicios/create')}}" class="btn btn-secondary w-100 align-self-center text-white mb-2 mb-md-0">
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
                    <th class="h6 small text-uppercase fw-bold">Interesado</th>
                    <th class="h6 small text-uppercase fw-bold">Tipo</th>
                    <th class="h6 small text-uppercase fw-bold">Servicio</th>
                    <th class="h6 small text-uppercase fw-bold">Fecha de solicitud</th>
                    <th class="h6 small text-uppercase fw-bold">Estado</th>
                    <th class="h6 small text-uppercase fw-bold text-center">Acciones</th>
                </tr>
            </thead>
            @php
                $contador = 1;
            @endphp
            <tbody class="text-center">
                @foreach($cotizacion_servicios as $cotizacion_servicio)
                    <tr>
                        <td class="fw-light align-middle">{{$contador}}</td>
                        <td class="fw-light align-middle">{{$cotizacion_servicio->interesado->name}}</td>
                        <td class="fw-light align-middle">{{$cotizacion_servicio->interesado->cotizacion_interesada}}</td>
                        <td class="fw-light align-middle">{{$cotizacion_servicio->interesado->servicio->tipo->name}}</td>
                        <td class="fw-light align-middle">{{$cotizacion_servicio->fecha_ejecucion}}</td>
                        <td class="fw-light align-middle">
                            @if($cotizacion_servicio->estado == 'Por atender')
                                <span class="badge bg-danger border-0">{{$cotizacion_servicio->estado}}</span>
                            @elseif($cotizacion_servicio->estado == 'Seguimiento')
                                <span class="badge bg-warning border-0">{{$cotizacion_servicio->estado}}</span>
                            @else
                                <span class="badge bg-success border-0">{{$cotizacion_servicio->estado}}</span>
                            @endif
                        </td>
                        <td class="align-middle">                                        
                            <form method="POST" action="{{ route('admin-cotizaciones-servicios.destroy',$cotizacion_servicio->slug) }}" class="form-delete">
                                @csrf
                                @method('DELETE')
                                <a href="{{url("admin-cotizaciones-servicios/$cotizacion_servicio->slug")}}" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye-fill"></i></a>
                                @if($cotizacion_servicio->estado == 'Atendido')
                                    <a href="{{route('reporte_cotizacion_servicio_final.pdf', $cotizacion_servicio->slug)}}" class="btn btn-outline-primary btn-sm"><i class="bi bi-clipboard-check-fill"></i></a>
                                @else
                                    <a href="" class="btn btn-outline-primary btn-sm disabled"><i class="bi bi-clipboard-check-fill"></i></a>
                                @endif

                                @if($cotizacion_servicio->estado !== 'Atendido')
                                    <button type="submit" class="btn btn-outline-primary btn-sm"><i class="bi bi-trash-fill"></i></button>        
                                @else
                                    <button type="submit" disabled class="btn btn-outline-primary btn-sm"><i class="bi bi-trash-fill"></i></button>        
                                @endif        
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
    @if(session('addcotizacion') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#0048A4',
            title: '¡Éxito!',
            text: 'Cotizacion generada correctamente',
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