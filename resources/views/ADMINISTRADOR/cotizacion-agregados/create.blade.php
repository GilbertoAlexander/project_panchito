@extends('TEMPLATE.administrador')

@section('title', 'COTIZACIONES DE AGREGADOS')

@section('css')
@endsection

@section('content')
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Cotizaciones de agregados</h1>
                <p class="text-muted">Se muestra el detalle de la solicitud de cotización</p>
            </div>
            <div class="col-lg-3 d-flex">
                
            </div>
        </div>
    <!-- fin encabezado -->

    {{-- Contenido --}}
    <form class="form-group" method="POST" action="/admin-cotizaciones-agregados" enctype="multipart/form-data" autocomplete="off">      
    @csrf
    <div class="card border-4 borde-top-primary shadow-sm h-100" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="card-body">
            <span class="mb-0 fw-bold small text-primary text-uppercase">Información del interesado</span>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="nameapp" class="form-label text-dark">Interesado</label>
                        <select id="interesado_id" class="form-select form-select-sm">
                            <option selected hidden>Seleccione una opción</option>
                            @foreach ($interesados as $interesado)
                                <option value="{{$interesado->id}}_{{$interesado->email}}_{{$interesado->celular}}">{{$interesado->name}}</option>                                
                            @endforeach
                        </select>
                        <input hidden name="interesado_ids" id="interesado_ids">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label text-dark">Correo eletrónico</label>
                        <input type="email" id="id_email__"  class="form-control form-control-sm bg-white" disabled>
                            <input hidden type="email" id="id_email" required name="email" class="form-control form-control-sm bg-white" >
                        
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group mb-3">
                        <label for="id_servicio" class="form-label text-dark">Celular - (Whatsapp)</label>
                        <input type="number" id="id_celular__"  class="form-control form-control-sm bg-white" disabled>
                            <input hidden type="number" id="id_celular" required name="celular" class="form-control form-control-sm bg-white" >
                    </div>
                </div>
            </div>
            <hr>
            <span class="mb-0 fw-bold small text-primary text-uppercase">Información de cotización</span>
            

            <div class="my-3">
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
                                <option value="" hidden selected>Seleccione una opcion</option>
                                @foreach($agregados as $agregado)
                                    <option value="{{$agregado->id}}_{{$agregado->name}}_{{$agregado->precio}}">{{$agregado->name}}</option>                                    
                                @endforeach
                            </select>
                        </div>
                        <input hidden id="precio_agre">
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
                                        Precio
                                    </th>
                                    <th class="text-uppercase small fw-bold">
                                        Subtotal
                                    </th>
                                    <th class="text-uppercase small fw-bold">
                                        Accion
                                    </th>
                                </thead>
                                <tbody class="text-center" id="agregado">
                                    
                                </tbody>
                                <tfooter class="text-center">
                                    <th class="text-end "></th>
                                    <th class="text-end "></th>
                                    <th class="text-end "></th>
                                    <th class="text-center ">TOTAL</th>
                                    <th class="text-center "><p class="fw-bold text-primary fs-5" id="tproductos">0</p><input type="hidden" name="cantidad_total" id="total_product"></th>
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
                                    <input class="form-check-input" type="radio" name="transporte_agregado" value="Si" id="no_id">
                                    <label class="form-check-label" for="no_id">
                                      Si
                                    </label>
                                </div>
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="radio" name="transporte_agregado" value="No" id="si_id">
                                    <label class="form-check-label" for="si_id">
                                      No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="informacion_adicional_id" class="form-label">Información adicional<span class="text-danger">*</span></label>
                                <textarea name="informacion_adicional" class="form-control fw-light" id="informacion_adicional_id" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="informacion_adicional_id" class="form-label">Observacion adicional<span class="text-danger">*</span></label>
                                <textarea name="observacion_adicional" class="form-control fw-light" id="informacion_adicional_id" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-md-3 mb-2">
                    <label for="" class="fw-bold text-secondary fw-bold">Estado</label>
                    <select name="estado" id="estado" class="form-select form-select-sm border-2 border-secondary">
                        <option value="Por atender">Por atender</option>
                        <option value="Seguimiento">Seguimiento</option>
                        <option value="Atendido">Atendido</option>
                    </select>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <label for="" class="fw-bold text-dark fw-bold">Costo estimado por el servicio</label>
                    <input type="decimal" name="costo_estimado" id="costo_estimado" class="form-control form-control-sm" value="">
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <label for="" class="fw-bold text-dark fw-bold">IGV(0.18)</label>
                    <select name="igv" id="igv__" class="form-select form-select-sm border-2 border-secondary">
                        <option hidden selected>Seleccionar una opcion</option>
                        <option value="0.18">Aplicar impuesto</option>
                        <option value="0">Exonerar impuesto</option>
                    </select>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <label for="" class="fw-bold text-dark fw-bold">Costo con afectacion de impuesto</label>
                    <input type="decimal" name="costo_afectado" class="form-control form-control-sm" id="costo_afectado">
                </div>   
            </div>
        </div>
    </div>

    <div class="py-3 text-end">
        <a href="{{url('admin-cotizaciones-servicios')}}" class="btn btn-outline-secondary">Volver</a>
        <button typé="submit" class="btn btn-primary px-5">Registrar</button>
    </div>
    </form>
    {{-- Fin contenido --}}


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

        $('#interesado_id').on('change', function(){
            var cliente = document.getElementById('interesado_id').value.split('_');
            if($.trim(cliente) !=''){
                $("#interesado_ids").val(cliente[0]);
                $('#id_email__').val(cliente[1]);
                $('#id_email').val(cliente[1]);
                $('#id_celular__').val(cliente[2]);
                $('#id_celular').val(cliente[2]);
            } 
        });

        $('#igv__').on('click', function(){
            var impuesto = $(this).val();
            var impuesto_base = $("#costo_estimado").val();
            if($.trim(impuesto) !=''){
                if(impuesto == 0.18){
                    var impuesto_new = parseFloat(impuesto_base*0.18)+parseFloat(impuesto_base);
                    impuesto_new = impuesto_new.toFixed(2);
                }else{
                    var impuesto_new = impuesto_base;
                }
                $("#costo_afectado").val(impuesto_new);
            } 
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
                cantidades[cont]=Number(cantidad)*parseFloat(precio);
                tproductos = tproductos+cantidades[cont];
                var fila = '<tr class="selected" id="fila'+cont+'"><td class="align-middle fw-normal">'+contador+'</td><td class="align-middle fw-normal">'+name_agregado+'</td><td class="align-middle fw-normal">'+cantidad+'</td><td class="align-middle fw-normal">'+precio+'</td><td class="align-middle fw-normal">'+cantidades[cont]+'</td><input type="hidden" name="id_agregado[]" value="'+id_agregado+'"><input type="hidden" name="cantidad[]" value="'+cantidad+'"><input type="hidden" name="precio[]" value="'+precio+'"><td class="align-middle"><button class="btn btn-sm btn-danger" onclick="eliminar('+cont+');"><i class="bi bi-trash"></i></button></td></tr>';
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