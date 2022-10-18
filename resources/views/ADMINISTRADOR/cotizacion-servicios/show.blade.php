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
    <form class="form-group" method="POST" action="/admin-cotizaciones-servicios/{{$admin_cotizaciones_servicio->slug}}" enctype="multipart/form-data" autocomplete="off">      
    @csrf
    @method('put')
    {{-- Contenido --}}
    <div class="card border-4 borde-top-primary shadow-sm h-100" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="card-body">
                <input hidden name="interesado_id" value="{{$admin_cotizaciones_servicio->interesado_id}}">
                <p class="fw-bold text-uppercase">Nro de Cotización: <span class="badge bg-dark">{{$admin_cotizaciones_servicio->codigo}}</span></p>
                <span class="mb-0 fw-bold small text-primary text-uppercase">Información del interesado</span>
                <div class="card-group">
                    <div class="card mb-3">
                        <div class="card-header py-1">
                            <p class="small text-uppercase mb-0">Nombres y Apellidos</p>
                        </div>
                        <div class="card-body py-1">
                            <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->interesado->name}}</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header py-1">
                            <p class="small text-uppercase mb-0">Correo electrónico</p>
                        </div>
                        <div class="card-body py-1">
                            <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->interesado->email}}</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header py-1">
                            <p class="small text-uppercase mb-0">Nro de Contacto</p>
                        </div>
                        <div class="card-body py-1">
                            <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->interesado->celular}}</p>
                        </div>
                    </div>
                </div>

                <span class="mb-0 fw-bold small text-primary text-uppercase">Información de cotización</span>
                <div class="my-2">
                    <p class="text-uppercase">Tipo de servicio: <span class="badge bg-primary">{{$admin_cotizaciones_servicio->interesado->servicio->tipo->name}}</span></p>
                    <p class="text-uppercase">Servicio Requerido: <span class="badge bg-secondary">{{$admin_cotizaciones_servicio->interesado->servicio->name}}</span></p>
                </div>
                @if($admin_cotizaciones_servicio->interesado->servicio->tipo->id == 1)
                    <div class="form__alquiler">
                        <div class="card-group">
                            <div class="card mb-3">
                                <div class="card-header py-1">
                                    <p class="small text-uppercase mb-0">Empresa solicitante</p>
                                </div>
                                <div class="card-body py-1">
                                    <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->empresa_solicitante}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-group">
                            <div class="card mb-3">
                                <div class="card-header py-1">
                                    <p class="small text-uppercase mb-0">Fecha de ejecución</p>
                                </div>
                                <div class="card-body py-1">
                                    <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->fecha_ejecucion}}</p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header py-1">
                                    <p class="small text-uppercase mb-0">Horas requeridas</p>
                                </div>
                                <div class="card-body py-1">
                                    <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->horas_requeridas}} HORAS</p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header py-1">
                                    <p class="small text-uppercase mb-0">Operador de maquinaria</p>
                                </div>
                                <div class="card-body py-1">
                                    <p class="fw-normal mb-0">
                                    @if($admin_cotizaciones_servicio->operador_maquinaria == 'Si')
                                        <span class="badge bg-success">{{$admin_cotizaciones_servicio->operador_maquinaria}}</span></p>
                                    @else
                                        <span class="badge bg-danger">{{$admin_cotizaciones_servicio->operador_maquinaria}}</span></p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card-group">
                            <div class="card mb-3">
                                <div class="card-header py-1">
                                    <p class="small text-uppercase mb-0">Información adicional</p>
                                </div>
                                <div class="card-body py-1">
                                    <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->informacion_adicional}}</p>
                                </div>
                            </div>
                        </div>
                    </div>  
                @endif
                
                @if($admin_cotizaciones_servicio->interesado->servicio->tipo->id == 2)
                <div class="form_proyectos">
                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Empresa solicitante</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->empresa_solicitante}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Fecha de ejecución</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->fecha_ejecucion}}</p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Dirección</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->direccion}}</p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">departamento - provincia - distrito</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->ubigeo_id?$admin_cotizaciones_servicio->ubigeo->departamento.'-'.$admin_cotizaciones_servicio->ubigeo->provincia.'-'.$admin_cotizaciones_servicio->ubigeo->distrito:'No requerido'}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Información adicional</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->informacion_adicional}}</p>
                            </div>
                        </div>
                    </div>
                </div> 
                @endif 

                @if($admin_cotizaciones_servicio->interesado->servicio->tipo->id == 3)
                <div class="form_abastecimientodeagua">
                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Empresa solicitante</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->empresa_solicitante}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Fecha de entrega</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->fecha_ejecucion}}</p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">cantidad</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->cantidad_requerida}} LITROS</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Dirección</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->direccion}}</p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">departamento - provincia - distrito</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">{{$admin_cotizaciones_servicio->ubigeo_id?$admin_cotizaciones_servicio->ubigeo->departamento.'-'.$admin_cotizaciones_servicio->ubigeo->provincia.'-'.$admin_cotizaciones_servicio->ubigeo->distrito:'No requerido'}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif 
                <hr>

                @if($admin_cotizaciones_servicio->estado == 'Atendido')
                    <div class="row mt-3">
                        <div class="col-12 col-md-4 mb-2">
                            <label for="" class="fw-bold text-secondary">Estado</label>
                            <label for="" class="form-control fw-bold">{{$admin_cotizaciones_servicio->estado}}</label>
                        </div>
                        <div class="col-12 col-md-4 mb-2">
                            <label for="" class="fw-bold text-dark">Costo estimado por el servicio</label>
                            <label for="" class="form-control text-danger fw-bold">S/ {{$admin_cotizaciones_servicio->costo_estimado}}</label>
                        </div>   
                    </div>
                @else
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
                            <input type="decimal" name="precio_cotizado" class="form-control form-control-sm" value="{{$admin_cotizaciones_servicio->costo_estimado}}">
                        </div>   
                    </div>
                @endif
        </div>
    </div>

    <div class="py-3 text-end">
        <a href="{{url('admin-cotizaciones-servicios')}}" class="btn btn-outline-secondary">Volver</a>
        <button typé="submit" class="btn btn-primary px-5">Actualizar</button>
    </div>
    </form>
    {{-- Fin contenido --}}


@endsection

@section('js')
@endsection