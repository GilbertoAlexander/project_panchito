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
    <form class="form-group" method="POST" action="/admin-cotizaciones-agregados/{{$admin_cotizaciones_agregado->slug}}" enctype="multipart/form-data" autocomplete="off">      
    @csrf
    @method('put')
    <input hidden name="interesado_id" value="{{$admin_cotizaciones_agregado->interesado_id}}">
    <div class="card border-4 borde-top-primary shadow-sm h-100" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="card-body">
            <span class="mb-0 fw-bold small text-primary text-uppercase">Información del interesado</span>
            <div class="card-group">
                <div class="card mb-3">
                    <div class="card-header py-1">
                        <p class="small text-uppercase mb-0">Nombres y Apellidos</p>
                    </div>
                    <div class="card-body py-1">
                        <p class="fw-normal mb-0">{{$admin_cotizaciones_agregado->interesado->name}}</p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header py-1">
                        <p class="small text-uppercase mb-0">Correo electrónico</p>
                    </div>
                    <div class="card-body py-1">
                        <p class="fw-normal mb-0">{{$admin_cotizaciones_agregado->interesado->email}}</p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header py-1">
                        <p class="small text-uppercase mb-0">Nro de Contacto</p>
                    </div>
                    <div class="card-body py-1">
                        <p class="fw-normal mb-0">{{$admin_cotizaciones_agregado->interesado->celular}}</p>
                    </div>
                </div>
            </div>
            <hr>
            <span class="mb-0 fw-bold small text-primary text-uppercase">Información de cotización</span>
            

            <div class="my-3">
                <div class="card-group">
                    <div class="card mb-3">
                        <div class="card-header py-1">
                            <p class="small text-uppercase mb-0">Empresa solicitante</p>
                        </div>
                        <div class="card-body py-1">
                            <p class="fw-normal mb-0">{{$admin_cotizaciones_agregado->empresa_solicitante}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card mb-3">
                        <div class="card-header py-1">
                            <p class="small text-uppercase mb-0">Fecha de entrega</p>
                        </div>
                        <div class="card-body py-1">
                            <p class="fw-normal mb-0">{{$admin_cotizaciones_agregado->fecha_entrega}}</p>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header py-1">
                            <p class="small text-uppercase mb-0">Transporte del agregado</p>
                        </div>
                        <div class="card-body py-1">
                            <p class="fw-normal mb-0">
                            @if($admin_cotizaciones_agregado->transporte_agregado == 'Si')
                                <span class="badge bg-success">{{$admin_cotizaciones_agregado->transporte_agregado}}</span></p>
                            @else
                                <span class="badge bg-danger">{{$admin_cotizaciones_agregado->transporte_agregado}}</span></p>
                            @endif
                        </div>
                    </div>
                </div>
                  
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
                        </thead>
                        <tbody>
                            @php
                                $contador = 1;
                                $suma=0;
                            @endphp
                            @foreach($dt_cotizacion as $dt_cotizaciones)
                                @php
                                    $agregado = \App\Models\Agregado::where('id',$dt_cotizaciones->agregado_id)->first();
                                    $suma+=$dt_cotizaciones->cantidad*$dt_cotizaciones->precio;
                                @endphp
                                <tr class="text-center">
                                    <td class="fw-light align-middle small text-uppercase">{{$contador}}</td>
                                    <td class="fw-light align-middle small text-uppercase">{{$agregado->name}}</td>
                                    <td class="fw-light align-middle small text-uppercase">{{$dt_cotizaciones->cantidad}}</td>
                                    <td class="fw-light align-middle small text-uppercase">{{$dt_cotizaciones->precio}}</td>
                                    <td class="fw-light align-middle small text-uppercase">{{$dt_cotizaciones->cantidad*$dt_cotizaciones->precio}}</td>
                                </tr>
                            @php
                                $contador++;
                            @endphp
                            @endforeach
                        </tbody>
                        <tfooter class="text-center">
                            <th class="text-end "></th>
                            <th class="text-end "></th>
                            <th class="text-end "></th>
                            <th class="text-center ">TOTAL</th>
                            <th class="text-center ">{{$suma}}</th>
                        </tfooter>
                    </table>
                </div>
                    

                <div class="card-group">
                    <div class="card mb-3">
                        <div class="card-header py-1">
                            <p class="small text-uppercase mb-0">Dirección</p>
                        </div>
                        <div class="card-body py-1">
                            <p class="fw-normal mb-0">{{$admin_cotizaciones_agregado->direccion}}</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header py-1">
                            <p class="small text-uppercase mb-0">departamento - provincia - distrito</p>
                        </div>
                        <div class="card-body py-1">
                            <p class="fw-normal mb-0">{{$admin_cotizaciones_agregado->ubigeo_id?$admin_cotizaciones_agregado->ubigeo->departamento.'-'.$admin_cotizaciones_agregado->ubigeo->provincia.'-'.$admin_cotizaciones_agregado->ubigeo->distrito:'No requerido'}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card-group">
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Información adicional</p>
                            </div>
                            <div class="card-body py-1">
                                <p class="fw-normal mb-0">{{$admin_cotizaciones_agregado->informacion_adicional}}</p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-1">
                                <p class="small text-uppercase mb-0">Observacion adicional</p>
                            </div>
                            <div class="card-body py-1">
                                <textarea name="observacion_adicional" class="form-control" id="" rows="2">{{$admin_cotizaciones_agregado->observacion_adicional}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>    
                @if($admin_cotizaciones_agregado->estado == 'Atendido')
                    <div class="row mt-3">
                        <div class="col-12 col-md-4 mb-2">
                            <label for="" class="fw-bold text-secondary">Estado</label>
                            <label for="" class="form-control fw-bold">{{$admin_cotizaciones_agregado->estado}}</label>
                        </div>
                        <div class="col-12 col-md-4 mb-2">
                            <label for="" class="fw-bold text-dark">Costo estimado por el agregado</label>
                            <label for="" class="form-control text-danger fw-bold">S/ {{$admin_cotizaciones_agregado->costo_estimado}}</label>
                        </div>
                        <div class="col-12 col-md-4 mb-2">
                            <label for="" class="fw-bold text-dark">Costo con afectacion de impuesto</label>
                            <label for="" class="form-control text-danger fw-bold">S/ {{$admin_cotizaciones_agregado->costo_afectado}}</label>
                        </div>   
                    </div>
                @else
                <div class="row mt-3">
                    <div class="col-12 col-md-3 mb-2">
                        <label for="" class="fw-bold text-secondary fw-bold">Estado</label>
                        <select name="estado" id="estado" class="form-select form-select-sm border-2 border-secondary">
                            <option @if($admin_cotizaciones_agregado->estado == 'Por atender') selected @endif value="Por atender">Por atender</option>
                            <option @if($admin_cotizaciones_agregado->estado == 'Seguimiento') selected @endif value="Seguimiento">Seguimiento</option>
                            <option @if($admin_cotizaciones_agregado->estado == 'Atendido') selected @endif value="Atendido">Atendido</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-3 mb-2">
                        <label for="" class="fw-bold text-dark fw-bold">Costo estimado por el agregado</label>
                        <input type="decimal" name="costo_estimado" id="costo_estimado" class="form-control form-control-sm" value="{{$admin_cotizaciones_agregado->costo_estimado}}">
                    </div>
                    <div class="col-12 col-md-3 mb-2">
                        <label for="" class="fw-bold text-dark fw-bold">IGV(0.18)</label>
                        <select name="igv" id="igv__" class="form-select form-select-sm border-2 border-secondary">
                            <option value="{{$admin_cotizaciones_agregado->igv}}" hidden selected>Seleccionar una opcion</option>
                            <option value="0.18">Aplicar impuesto</option>
                            <option value="0">Exonerar impuesto</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-3 mb-2">
                        <label for="" class="fw-bold text-dark fw-bold">Costo con afectacion de impuesto</label>
                        <input type="decimal" name="costo_afectado" class="form-control form-control-sm" id="costo_afectado" value="{{$admin_cotizaciones_agregado->costo_afectado}}">
                    </div>     
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-3 text-end">
        <a href="{{url('admin-cotizaciones-agregados')}}" class="btn btn-outline-secondary">Volver</a>
        <button typé="submit" class="btn btn-primary px-5">Registrar</button>
    </div>
    </form>
    {{-- Fin contenido --}}


@endsection

@section('js')
<script>
    $(document).ready(function(){
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