@extends('TEMPLATE.landing')

@section('title', 'COTIZACION SERVICIOS')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                            @php
                                $servicio = DB::table('servicios')->select('name','tipo_id')->where('id',$interesado->servicio_id)->first();
                                $tipo_name = DB::table('tipos')->where('id',$servicio->tipo_id)->first();
                                $interesado = DB::table('interesados')->where('name',$interesado->name)->first();
                            @endphp
                            <p class="text-danger fw-light text-start text-md-end mb-0">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></p>
                            <form method="POST" action="/servicios_cotizacion/detalle"  enctype="multipart/form-data" autocomplete="off" >
                                @csrf
                                <input hidden name="interesado_id" value="{{$interesado->id}}">
                                <input hidden name="tipo_ids" value="{{$servicio->tipo_id}}">
                                <p class="text-uppercase">Tipo de servicio: <span class="badge bg-primary">{{$tipo_name->name}}</span></p>
                                <p class="text-uppercase">Servicio Requerido: <span class="badge bg-secondary">{{$servicio->name}}</span></p>
                                @if($servicio->tipo_id == '1')
                                <div class="form__alquiler">
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
                                                        <input class="form-check-input" type="radio" name="operador_maquinaria" value="Si" id="no_id">
                                                        <label class="form-check-label" for="no_id">
                                                        Si
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2">
                                                        <input class="form-check-input" type="radio" name="operador_maquinaria" value="No" id="si_id">
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
                                @endif
                                @if($servicio->tipo_id == '2')
                                <div class="form_proyectos" >
                                    <div class="row">
                                        <div class="col-12 col-md-8">
                                            <div class="mb-3">
                                                <label for="empresa_proyecto_id" class="form-label">Empresa solicitante<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control fw-light" id="empresa_proyecto_id" name="name_empresa" placeholder="Nombre o razón social">
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-4">
                                            <div class="mb-3">
                                                <label for="fecha_ejecucion_proyecto_id" class="form-label">Fecha de ejecución<span class="text-danger">*</span></label>
                                                <input type="date" class="form-control fw-light" id="fecha_ejecucion_proyecto_id" name="fecha_ejecucion">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="mb-3">
                                                <label for="direccion_proyecto_id" class="form-label">Dirección<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control fw-light" id="direccion_proyecto_id" name="direccion">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="mb-3">
                                                <label for="ubigeo_proyecto_id" class="form-label">Departamento - Provincia - Distrito<span class="text-danger">*</span></label>
                                                <select class="form-select select2" name="ubigeo_id" id="ubigeo_cisterna_id">
                                                    <option hidden selected>Seleccione una opcion</option>
                                                    @foreach($ubigeos as $ubigeo)
                                                        <option value="{{$ubigeo->id}}">{{$ubigeo->departamento. ', '.$ubigeo->distrito. ', '.$ubigeo->provincia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="informacion_adicional_proyecto_id" class="form-label">Información adicional<span class="text-danger">*</span></label>
                                                <textarea name="informacion_adicional" class="form-control fw-light" id="informacion_adicional_proyecto_id" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($servicio->tipo_id == '3')
                                <div class="form_abastecimientodeagua">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="empresa_cisterna_id" class="form-label">Empresa solicitante<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control fw-light" id="empresa_cisterna_id" name="name_empresa" placeholder="Nombre o razón social">
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-4">
                                            <div class="mb-3">
                                                <label for="fecha_entrega_id" class="form-label">Fecha de entrega<span class="text-danger">*</span></label>
                                                <input type="date" class="form-control fw-light" id="fecha_entrega_id" name="fecha_ejecucion">
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-4">
                                            <div class="mb-3">
                                                <label for="cantidad_requerida_id" class="form-label">Cantidad requerida<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control fw-light" id="cantidad_requerida_id" name="cantidad_requerida" min="100" value="100">
                                                    <span class="input-group-text small" style="font-size: 13px;" id="basic-addon1">LITROS</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="mb-3">
                                                <label for="direccion_cisterna_id" class="form-label">Dirección<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control fw-light" id="direccion_cisterna_id" name="direccion">
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

                                    
                                    </div>
                                </div>
                                @endif

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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection