@extends('TEMPLATE.administrador')

@section('title', 'COTIZACIONES DE SERVICIOS')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Cotizaciones de servicios</h1>
                <p class="text-muted">Se muestra el detalle de la solicitud de cotización</p>
            </div>
            <div class="col-lg-3 d-flex">
                
            </div>
        </div>
    <!-- fin encabezado -->
    <form class="form-group" method="POST" action="/admin-cotizaciones-servicios" enctype="multipart/form-data" autocomplete="off">      
    @csrf
    {{-- Contenido --}}
        <div class="card border-4 borde-top-primary shadow-sm h-100" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <div class="card-body">
                <span class="mb-0 fw-bold small text-primary text-uppercase">Información del interesado</span>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group py-1">
                            <label for="nameapp" class="form-label text-dark">Interesado</label>
                            <select id="interesado_id" class="form-select form-select-sm">
                                <option selected hidden>Seleccione una opción</option>
                                @foreach ($interesados as $interesado)
                                    <option value="{{$interesado->id}}+{{$interesado->email}}+{{$interesado->celular}}+{{$interesado->servicio->tipo->id}}+{{$interesado->servicio->tipo->name}}+{{$interesado->servicio->name}}+{{$interesado->servicio->precio}}">{{$interesado->name}}</option>                                
                                @endforeach
                            </select>
                            <input hidden name="tipo_ids" id="tipo_id__">
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
                <div class="my-2">
                    <p class="text-uppercase">Tipo de servicio: <span class="badge bg-primary" id="tipo_servicio"></span></p>
                    <p class="text-uppercase">Servicio Requerido: <span class="badge bg-secondary" id="name_servicio"></span></p>
                </div>

                <div class="form__alquiler" id="show_alquiler">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="empresa_id" class="form-label">Empresa solicitante<span class="text-danger">*</span></label>
                                <input type="text" class="form-control fw-light" id="empresa_id" name="name_empresa" placeholder="Nombre o razón social">
                            </div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="fecha_ejecucion_id" class="form-label">Fecha de ejecución<span class="text-danger">*</span></label>
                                <input type="date" class="form-control fw-light" id="fecha_ejecucion_id" name="fecha_ejecucion">
                            </div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="horas_requeridas_id" class="form-label">Horas requeridas<span class="text-danger">*</span></label>
                                <input type="number" class="form-control fw-light" id="horas_requeridas_id" name="horas_requerias" min="1" value="1">
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="horas_requeridas_id" class="form-label">Operador de maquinaria<span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check me-5">
                                        <input class="form-check-input" value="Si" type="radio" name="operador_maquinaria" id="no_id">
                                        <label class="form-check-label" for="no_id">
                                        Si
                                        </label>
                                    </div>
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" value="No" type="radio" name="operador_maquinaria" id="si_id">
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
                </div>

                <div class="form_proyectos" id="show_proyecto">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="mb-3">
                                <label for="empresa_proyecto_id" class="form-label">Empresa solicitante<span class="text-danger">*</span></label>
                                <input type="text" class="form-control fw-light" id="empresa_proyecto_id" name="name_empresa2" placeholder="Nombre o razón social">
                            </div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="fecha_ejecucion_proyecto_id" class="form-label">Fecha de ejecución<span class="text-danger">*</span></label>
                                <input type="date" class="form-control fw-light" id="fecha_ejecucion_proyecto_id" name="fecha_ejecucion2">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="direccion_proyecto_id" class="form-label">Dirección<span class="text-danger">*</span></label>
                                <input type="text" class="form-control fw-light" id="direccion_proyecto_id" name="direccion2">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="ubigeo_proyecto_id" class="form-label">Departamento - Provincia - Distrito<span class="text-danger">*</span></label>
                                <select class="form-select select2" style="width:100%;" name="ubigeo_id2" id="ubigeo_proyecto_id">
                                    <option  hidden selected>Seleccione una opcion</option>
                                    @foreach($ubigeos as $ubigeo)
                                        <option value="{{$ubigeo->id}}">{{$ubigeo->departamento. ', '.$ubigeo->distrito. ', '.$ubigeo->provincia}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="informacion_adicional_proyecto_id" class="form-label">Información adicional<span class="text-danger">*</span></label>
                                <textarea name="informacion_adicional2" class="form-control fw-light" id="informacion_adicional_proyecto_id" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form_abastecimientodeagua" id="show_agua">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="empresa_cisterna_id" class="form-label">Empresa solicitante<span class="text-danger">*</span></label>
                                <input type="text" class="form-control fw-light" id="empresa_cisterna_id" name="name_empresa3" placeholder="Nombre o razón social">
                            </div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="fecha_entrega_id" class="form-label">Fecha de entrega<span class="text-danger">*</span></label>
                                <input type="date" class="form-control fw-light" id="fecha_entrega_id" name="fecha_ejecucion3">
                            </div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="cantidad_requerida_id" class="form-label">Cantidad requerida<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control fw-light" id="cantidad_requerida_id" name="cantidad_requerida">
                                    <span class="input-group-text small" style="font-size: 13px;" id="basic-addon1">LITROS</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="direccion_cisterna_id" class="form-label">Dirección<span class="text-danger">*</span></label>
                                <input type="text" class="form-control fw-light" id="direccion_cisterna_id" name="direccion3">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="ubigeo_cisterna_id" class="form-label">Departamento - Provincia - Distrito<span class="text-danger">*</span></label>
                                <select class="form-select select2" name="ubigeo_id3" id="ubigeo_cisterna_id">
                                    <option value="" hidden selected>Seleccione</option>
                                    @foreach($ubigeos as $ubigeo)
                                        <option value="{{$ubigeo->id}}">{{$ubigeo->departamento. ', '.$ubigeo->distrito. ', '.$ubigeo->provincia}}</option>
                                    @endforeach
                                </select>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
        // In your Javascript (external .js resource or <script> tag) 
        $(document).ready(function() {
            $('.select2').select2();
            $('.ubigeo_origen').select2();

        });
    </script>
    <script>
    $(document).ready(function(){
        $('#show_alquiler').hide();
        $('#show_proyecto').hide();
        $('#show_agua').hide();
        $('#interesado_id').on('change', function(){
            this.disabled = "disabled";
            var cliente = document.getElementById('interesado_id').value.split('+');
            if($.trim(cliente) !=''){
                $("#interesado_ids").val(cliente[0]);
                $('#id_email__').val(cliente[1]);
                $('#id_email').val(cliente[1]);
                $('#id_celular__').val(cliente[2]);
                $('#id_celular').val(cliente[2]);
                $("#tipo_servicio").html(cliente[4]);
                $("#name_servicio").html(cliente[5]);
                $("#tipo_id__").val(cliente[3]);

                if(cliente[3] == 1){
                    $('#show_alquiler').show();
                    $('#show_proyecto').hide();
                    $('#show_agua').hide();
                    horas_requeridas_id.oninput = function() {
                        var new_costo = horas_requeridas_id.value*cliente[6];
                        new_costo = new_costo.toFixed(2);
                        $('#costo_estimado').val(new_costo);
                    };
                    $('#costo_estimado').val(cliente[6]);
                }
                if(cliente[3] == 2){
                    $('#show_proyecto').show();
                    $('#show_alquiler').hide();
                    $('#show_agua').hide();
                    $('#costo_estimado').val(cliente[6]);
                }
                if(cliente[3] == 3){
                    $('#show_alquiler').hide();
                    $('#show_proyecto').hide();
                    $('#show_agua').show();
                    cantidad_requerida_id.oninput = function() {
                        var new_costo = cantidad_requerida_id.value*cliente[6];
                        new_costo = new_costo.toFixed(2);
                        $('#costo_estimado').val(new_costo);
                    };
                }
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
    </script>
@endsection