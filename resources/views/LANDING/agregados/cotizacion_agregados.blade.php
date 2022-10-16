@extends('TEMPLATE.landing')

@section('title', 'COTIZACION AGREGADOS')

@section('css')
    
@endsection
 
@section('content')
    <section class="w-100 bg-light" style="min-height: 450px;">
        <div class="container py-5">
            <p class="text-primary fw-bold text-center fs-3 pt-4">¡Hola Cesar Torres Tasaico! Un gusto poder saludarte</p>
            <p class="text-center text-dark fw-light  fs-4">2. Ahora, Por favor ingresa la informacion que te solicitamos para poder hacerte una cotización</p>

            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="card shadow border-4 mb-4 mb-lg-0 borde-top-primary" data-aos="fade-up"
                    data-aos-duration="500" style="border-radius: 15px">
                        <div class="card-body">
                            <p class="text-danger fw-light text-start text-md-end mb-0">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></p>
                            <form method="POST" action=""  enctype="multipart/form-data" autocomplete="off" >
                                <!-- @csrf -->
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
                                                <option value="" hidden selected>Seleccione</option>
                                                <option value="">Arena fina</option>
                                            </select>
                                        </div>
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
                                                        Agregado
                                                    </th>
                                                    <th class="text-uppercase small fw-bold">
                                                        Cantidad (m<sup>3</sup>)
                                                    </th>
                                                    <th class="text-uppercase small fw-bold">

                                                    </th>
                                                </thead>
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td class="fw-light align-middle small text-uppercase">Arena Fina</td>
                                                        <td class="fw-light align-middle small text-uppercase">10</td>
                                                        <td class="fw-light align-middle small text-uppercase"><button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></td>
                                                    </tr>
                                                </tbody>
                                                <tfooter class="text-center">
                                                    <th class="text-end ">TOTAL</th>
                                                    <th class="text-center ">10</th>
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
                                            <select class="form-select" name="ubigeo_id" id="ubigeo_cisterna_id">
                                                <option value="" hidden selected>Seleccione</option>
                                                <option value="">Ica - Chincha - Grocio Prado</option>
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
@endsection