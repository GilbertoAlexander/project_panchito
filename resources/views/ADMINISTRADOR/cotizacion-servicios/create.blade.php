@extends('TEMPLATE.administrador')

@section('title', 'COTIZACIONES DE SERVICIOS')

@section('css')
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

    {{-- Contenido --}}
    <div class="card border-4 borde-top-primary shadow-sm h-100" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="card-body">
            <span class="mb-0 fw-bold small text-primary text-uppercase">Información del interesado</span>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group py-1">
                        <label for="nameapp" class="form-label text-dark">Interesado</label>
                        <select name="" id="" class="form-select form-select-sm">
                            <option selected hidden>Seleccione una opción</option>
                            <option value="">Opcion uno</option>
                        </select>
                        
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label text-dark">Correo eletrónico</label>
                        <input type="email" id="id_email" required name="email" class="form-control form-control-sm bg-white" disabled>
                        
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group mb-3">
                        <label for="id_servicio" class="form-label text-dark">Celular - (Whatsapp)</label>
                        <input type="number" id="id_servicio" required name="celular" class="form-control form-control-sm bg-white" disabled>
                    </div>
                </div>
            </div>
            <hr>
            <span class="mb-0 fw-bold small text-primary text-uppercase">Información de cotización</span>
            <div class="my-2">
                <p class="text-uppercase">Tipo de servicio: <span class="badge bg-primary">Alquiler</span></p>
                <p class="text-uppercase">Servicio Requerido: <span class="badge bg-secondary">Alquiler de Camión Grúa 22 TN</span></p>
            </div>

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
                                    <input class="form-check-input" type="radio" name="operador_maquinaria" id="no_id">
                                    <label class="form-check-label" for="no_id">
                                      Si
                                    </label>
                                </div>
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="radio" name="operador_maquinaria" id="si_id">
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
                            <select class="form-select" name="ubigeo_id" id="ubigeo_proyecto_id">
                                <option value="" hidden selected>Seleccione</option>
                                <option value="">Ica - Chincha - Grocio Prado</option>
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
                                <input type="number" class="form-control fw-light" id="cantidad_requerida_id" name="cantidad_requeria" min="100" value="100">
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
                            <select class="form-select" name="ubigeo_id" id="ubigeo_cisterna_id">
                                <option value="" hidden selected>Seleccione</option>
                                <option value="">Ica - Chincha - Grocio Prado</option>
                            </select>
                        </div>
                    </div>

                   
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-md-4 mb-2">
                    <label for="" class="fw-bold text-secondary fw-bold">Estado</label>
                    <select name="estado" id="estado" class="form-select form-select-sm border-2 border-secondary">
                        <option value="Por atender">Por atender</option>
                        <option value="Seguimiento">Seguimiento</option>
                        <option value="Atendido">Atendido</option>
                    </select>
                </div>
                <div class="col-12 col-md-4 mb-2">
                    <label for="" class="fw-bold text-dark fw-bold">Costo estimado por el servicio</label>
                    <input type="decimal" name="precio_cotizado" class="form-control form-control-sm" value="">
                </div>   
            </div>
        </div>
    </div>

    <div class="py-3 text-end">
        <a href="{{url('admin-cotizaciones-servicios')}}" class="btn btn-outline-secondary">Volver</a>
        <button typé="submit" class="btn btn-primary px-5">Registrar</button>
    </div>
    {{-- Fin contenido --}}


@endsection

@section('js')
@endsection