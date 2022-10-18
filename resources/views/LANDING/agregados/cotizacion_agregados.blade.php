@extends('TEMPLATE.landing')

@section('title', 'COTIZACION AGREGADOS')

@section('css')
    
@endsection
 
@section('content')
    <section class="w-100 bg-light" style="min-height: 450px;">
        <div class="container py-5">
            <p class="text-primary fw-bold text-center fs-3 pt-4">¡Hola {{$interesado->name}}! Un gusto poder saludarte</p>
            <p class="text-center text-dark fw-light  fs-4">2. Ahora, Por favor ingresa la informacion que te solicitamos para poder hacerte una cotización</p>

            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="card shadow border-4 mb-4 mb-lg-0 borde-top-primary" data-aos="fade-up"
                    data-aos-duration="500" style="border-radius: 15px">
                        <div class="card-body">
                            <p class="text-danger fw-light text-start text-md-end mb-0">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></p>
                            <form method="POST" action="/agregados_cotizacion/detalle"  enctype="multipart/form-data" autocomplete="off" >
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <div class="mb-3">
                                            <label for="empresa_id" class="form-label">Empresa solicitante<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control fw-light" id="empresa_id" name="name_empresa" placeholder="Nombre o razón social">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="mb-3">
                                            <label for="fecha_ejecucion_id" class="form-label">Fecha de entrega<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control fw-light" id="fecha_ejecucion_id" name="fecha_ejecucion">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="agregados_id" class="form-label">Agregados</label>
                                            <select class="form-select" id="agregados_id">
                                                <option hidden selected>Seleccione un agregado</option>
                                                @foreach($agregados as $agregado)
                                                    <option value="{{$agregado->id}}_{{$agregado->name}}_{{$agregado->precio}}">{{$agregado->name}}</option>                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                        <input id="precio_agre">
                                    </div>

                                    <div class="col-6 col-md-3">
                                        <div class="mb-3">
                                            <label for="cantidad_id" class="form-label">Cantidad (m<sup>3</sup>)<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control fw-light" id="cantidad_id">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-2 col-lg-3">
                                        <div class="mb-3">
                                            <label for="fecha_ejecucion_id" class="form-label text-white">Agregar</label>
                                            <button type="button" id="btnagregar" class="btn btn-secondary w-100 text-white mt-2 mt-md-0">
                                                <i class="bi bi-plus-circle me-2"></i>
                                                Agregar
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="table-responsive mb-3">
                                            <table class="table table-sm table-hover">
                                                <thead class="bg-primary text-white text-center">
                                                    <th class="text-uppercase small fw-bold">
                                                        N°
                                                    </th>
                                                    <th class="text-uppercase small fw-bold">
                                                        Agregado
                                                    </th>
                                                    <th class="text-uppercase small fw-bold">
                                                        Cantidad (m<sup>3</sup>)
                                                    </th>
                                                    <th class="text-uppercase small fw-bold">
                                                        Accion
                                                    </th>
                                                </thead>
                                                <tbody class="text-center" id="agregado">
                                                    
                                                </tbody>
                                                <tfooter class="text-center">
                                                    <th class="text-end "></th>
                                                    <th class="text-end ">TOTAL</th>
                                                    <th class="text-center "><p class="fw-bold text-primary fs-5" id="tproductos">0</p><input type="hidden" name="cantidad_total" id="total_product"></th>
                                                    <th></th>
                                                </tfooter>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="direccion_id" class="form-label">Dirección<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control fw-light" id="direccion_id" name="direccion">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="ubigeo_cisterna_id" class="form-label">Departamento - Provincia - Distrito<span class="text-danger">*</span></label>
                                            <select class="form-select select2" name="ubigeo_id" id="ubigeo_cisterna_id">
                                                <option hidden selected>Seleccione una opcion</option>
                                                @foreach($ubigeos as $ubigeo)
                                                    <option value="{{$ubigeo->id}}">{{$ubigeo->departamento. ', '.$ubigeo->distrito. ', '.$ubigeo->provincia}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="horas_requeridas_id" class="form-label">Transporte del agregado<span class="text-danger">*</span></label>
                                            <div class="d-flex">
                                                <div class="form-check me-5">
                                                    <input class="form-check-input" type="radio" name="transporte_agregado" id="no_id">
                                                    <label class="form-check-label" for="no_id">
                                                    Si
                                                    </label>
                                                </div>
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="radio" name="transporte_agregado" id="si_id">
                                                    <label class="form-check-label" for="si_id">
                                                    No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="informacion_adicional_id" class="form-label">Información adicional<span class="text-danger">*</span></label>
                                            <textarea name="informacion_adicional" class="form-control fw-light" id="informacion_adicional_id" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary px-5 text-uppercase">Solicitar Cotización</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#agregados_id').click(function(){
            var agregado = document.getElementById('agregados_id').value.split('_');
            $('#precio_agre').val(agregado[2]);
        });

        $('#btnagregar').click(function(){
            agregar();
        });
    });

    var cont = 0;
    var contador = 1;
    tproductos=0;
    cantidades=[];
        function agregar()
        {
            var agregados = document.getElementById("agregados_id").value.split('_');
            precio = $("#precio_agre").val();
            id_agregado = agregados[0];
            name_agregado = agregados[1];
            cantidad = $("#cantidad_id").val();
            if (agregados!="Seleccione un agregado" && agregados!="" && cantidad>0 && cantidad!="") 
            {            
                cantidades[cont]=Number(cantidad);
                tproductos = tproductos+cantidades[cont];
                var fila = '<tr class="selected" id="fila'+cont+'"><td class="align-middle fw-normal">'+contador+'</td><td class="align-middle fw-normal">'+name_agregado+'</td><td class="align-middle fw-normal">'+cantidad+'</td><input type="hidden" name="id_agregado[]" value="'+id_agregado+'"><input type="hidden" name="cantidad[]" value="'+cantidad+'"><input type="hidden" name="precio[]" value="'+precio+'"><td class="align-middle"><button class="btn btn-sm btn-danger" onclick="eliminar('+cont+');"><i class="bi bi-trash"></i></button></td></tr>';
                cont++;
                contador++;
                limpiar();
                $("#tproductos").html(+tproductos);
                $("#total_product").val(tproductos);
                $('#agregado').append(fila);
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al ingresar el detalle del agregado, revise los datos del detalle',
                    })
            }
        }
        function limpiar()
        {
            $("#cantidad_id").val("");
            $("#precio_agre").val("");
        }
        function eliminar(index)
        {
            tproductos = tproductos-cantidades[index];
            $("#tproductos").html(+tproductos);
            $("#total_product").val(tproductos);
            $("#fila" + index).remove();
        }
</script>
@endsection