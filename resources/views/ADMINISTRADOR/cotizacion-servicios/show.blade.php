@extends('TEMPLATE.administrador')

@section('title', 'COTIZACIONES DE SERVICIOS')

@section('css')
@endsection

@section('content')
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Cotizaciones de servicio</h1>
                <p class="text-muted">Se muestra el detalle de la solicitud de cotización</p>
            </div>
            <div class="col-lg-3 d-flex">
                
            </div>
        </div>
    <!-- fin encabezado -->

    {{-- Contenido --}}
    <div class="card border-4 borde-top-primary shadow-sm h-100" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="card-body">
            {{-- <input hidden name="interesado_id" value="{{$admin_cotizaciones_cotizacione->interesado_id}}"> --}}
                <p class="fw-bold text-uppercase">Nro de Cotización: <span class="badge bg-dark">123</span></p>
                <span class="mb-0 fw-bold small text-primary text-uppercase">Información del interesado</span>
                <div class="card-group">
                    <div class="card mb-3">
                        <div class="card-header py-1">
                            <p class="small text-uppercase mb-0">Nombres y Apellidos</p>
                        </div>
                        <div class="card-body py-1">
                            <p class="fw-normal mb-0">Gilberto Alexander De La Cruz Saravia</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header py-1">
                            <p class="small text-uppercase mb-0">Correo electrónico</p>
                        </div>
                        <div class="card-body py-1">
                            <p class="fw-normal mb-0">gilbertodelacruzsaravia@gmail.com</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header py-1">
                            <p class="small text-uppercase mb-0">Nro de Contacto</p>
                        </div>
                        <div class="card-body py-1">
                            <p class="fw-normal mb-0">937040520</p>
                        </div>
                    </div>
                </div>

                <span class="mb-0 fw-bold small text-primary text-uppercase">Información de cotización</span>
                <div class="my-2">
                    <p class="text-uppercase">Tipo de servicio: <span class="badge bg-primary">Alquiler</span></p>
                    <p class="text-uppercase">Servicio Requerido: <span class="badge bg-secondary">Alquiler de Camión Grúa 22 TN</span></p>
                </div>
                <div class="form__alquiler" hidden>
                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Empresa solicitante</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">Mi empresa SAC</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Fecha de ejecución</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">15/10/2022</p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Horas requeridas</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">100 HORAS</p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Operador de maquinaria</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0"><span class="badge bg-success">SI</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Información adicional</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam possimus voluptatum totam maxime nobis, voluptas nostrum sint, inventore aperiam et amet delectus sapiente suscipit repudiandae veniam, magni voluptates optio error.</p>
                            </div>
                        </div>
                    </div>
                </div>  
                
                <div class="form_proyectos" hidden>
                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Empresa solicitante</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">Mi empresa SAC</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Fecha de ejecución</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">15/10/2022</p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Dirección</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt, possimus.</p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">departamento - provincia - distrito</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">Lima - Lima - Lima</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Información adicional</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam possimus voluptatum totam maxime nobis, voluptas nostrum sint, inventore aperiam et amet delectus sapiente suscipit repudiandae veniam, magni voluptates optio error.</p>
                            </div>
                        </div>
                    </div>
                </div>  

                <div class="form_abastecimientodeagua">
                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Empresa solicitante</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">Mi empresa SAC</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Fecha de entrega</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">15/10/2022</p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">cantidad</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">2000 LITROS</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Dirección</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt, possimus.</p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">departamento - provincia - distrito</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">Lima - Lima - Lima</p>
                            </div>
                        </div>
                    </div>
                </div> 
                <hr>

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
        <button typé="submit" class="btn btn-primary px-5">Actualizar</button>
    </div>
    {{-- Fin contenido --}}


@endsection

@section('js')
@endsection