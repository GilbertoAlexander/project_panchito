@extends('TEMPLATE.administrador')

@section('title', 'Buzón de correo')

@section('css')

@endsection

@section('content')
    
<!-- Encabezado -->
<div class="row pt-5">
    <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Buzón de correo</h1>
        <p class="text-muted">Se muestra la lista de correos enviados desde la página web</p>
    </div>
    <div class="col-lg-3 d-flex">
    </div>
</div>
<!-- fin encabezado -->

    {{-- contenido --}}
        <div class="card border-4 borde-top-primary shadow-sm h-100">
            <div class="card-body">
                <table id="" class="display table table-hover table-sm py-2" cellspacing="0" style="width:100%">
                    <thead class="bg-light text-center">
                        <tr>
                            <th class="h6 small text-uppercase fw-bold">N°</th>
                            <th class="h6 small text-uppercase fw-bold">Remitente</th>
                            <th class="h6 small text-uppercase fw-bold">Correo electrónico</th>
                            <th class="h6 small text-uppercase fw-bold">Nro. de celular</th>
                            <th class="h6 small text-uppercase fw-bold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php 
                            $contador = 1;
                        @endphp
                        @foreach($correos as $admin_correo)
                            <tr>
                                <td class="fw-light align-middle">{{$contador}}</td>
                                <td class="fw-light align-middle">{{$admin_correo->name_lastname}}</td>
                                <td class="fw-light align-middle">{{$admin_correo->email}}</td>
                                <td class="fw-light align-middle">{{$admin_correo->celular}}</td>
                                <td class="align-middle">                                        
                                    <div class="text-center">
                                        <form method="POST" action="{{ route('admin-correos.destroy',$admin_correo->slug) }}" class="form-delete">
                                            @csrf
                                            @method('DELETE') 
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#view_email{{$admin_correo->slug}}"><i class="bi bi-eye-fill me-2"></i>Ver mensaje</button> 
                                            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="bi bi-trash-fill me-2"></i>Eliminar</button>        
                                        </form>
                                    </div>      
                                </td>
                            </tr>
                        @php 
                            $contador++;
                        @endphp
                        @include('ADMINISTRADOR.buzon-de-correo.show')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    {{-- fin contenido --}}

@endsection

@section('js')
    <!--sweet alert actualizar-->
    @if(session('update') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#1C3146',
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
            confirmButtonColor: '#1C3146',
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
            confirmButtonColor: '#1C3146',
            cancelButtonColor: '#FF9C00',
            confirmButtonText: '¡Sí, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                
            this.submit();
            }
            })

        });
    </script>
@endsection