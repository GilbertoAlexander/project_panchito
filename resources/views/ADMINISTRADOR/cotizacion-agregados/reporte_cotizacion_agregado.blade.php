<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PANCHITO | SOLICITUD DE COTIZACIÓN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
      <style>
            @page {
                 margin: 0cm 0cm;
            }

            @font-face {
                font-family: 'Oleo Script Swash Caps';
                font-style: cursive;
                font-weight: 100;
                src: local('Oleo Script Swash Caps'), local('Oleo Script Swash Caps'), url(https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap) format('truetype');
            }

            body{
                font-family: Cairo, sans-serif !important;
                background-image: url(images/fondo_reporte.png);
                background-repeat: no-repeat;
                background-size: 100% 100%;
                background-attachment: fixed;
                margin-top: 3.9cm;
                margin-bottom: 3.9cm;
            }

            .text-primary
            {
                color: #0048A4 !important;
            }

            .text-secondary
            {
                color: #FF4A17 !important;
            }

            .bg-primary
            {
                background-color: #0048A4 !important;
            }

            .border-primary
            {
                border-color: #0048A4 !important;
            }

            .content{
                /* margin-top: 3.9cm; */
                margin-left: 1.0cm;
                margin-right: 1.0cm;
                /* margin-bottom: 3.9cm; */
            }

            header {
                background-image: url(images/cabecera_panchito.png);
                background-repeat: no-repeat;
                background-size: 100% 100%;
                position: fixed; 
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3.9cm;
            }

            footer {
                background-image: url(images/pie_panchito.png);
                background-repeat: no-repeat;
                background-size: 100% 100%;
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 3.9cm;
            }

            .codigo
            {
                background-color: #4589e277;
                color: #FFFFFF;
                border-radius: 3%;
            }

            .info_empresa
            {
                margin-top: 45px;
            }

            .detalle_empresa
            {
                font-size: 10px;
            }
            
            .info_1
            {
                margin-top: 110px;
                margin-bottom: 5px;
            }

            .info_1,
            .info_2
            {
                color: #FFFFFF;
            }

            .direccion a{
                color: #FFFFFF;
                font-size: 12px;
            }

            .icono_i
            {
                width: 20px;
                height: 20px;
            }

            .icono_in
            {
                width: 10px;
                height: 10px;
                margin-left: 1.0cm;
            }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            
        </header>

        <footer>
            @php
                $empresa = \App\Models\Empresa::find(1);
            @endphp
            <table style="width: 100%;">
                <tr>
                    <td style="width: 40%;">
                        <div class="detalle_empresa">
                            <div class="info_1">
                                <img src="images/right.png" class="icono_in" alt="">
                                <span class="text-uppercase">Alquiler de camiones grúas</span>
                            </div>
                            <div class="info_2">
                                <img src="images/right.png" class="icono_in" alt="">
                                <span class="text-uppercase">Alquiler de maquinarias y equipos</span>
                            </div>
                        </div>
                    </td>
                    <td style="width: 20%;">

                    </td>
                    <td style="width: 40%;">
                        <div class="footer">
                            <div class="info_empresa">
                                <div class="direccion">
                                    <img src="images/icono_direccion.png" class="icono_i" alt="">
                                    <a href="https://www.google.com/maps/place/17%C2%B011'54.9%22S+70%C2%B056'44.7%22W/@-17.1985564,-70.94578,20.74z/data=!4m5!3m4!1s0x0:0x9fc05d3a372082b1!8m2!3d-17.1985815!4d-70.9457375?hl=es" class="text-decoration-none">
                                        <span>{{$empresa->direccion}}</span>
                                    </a>
                                </div>
                                <div class="direccion my-3">
                                    <img src="images/icono_whatsapp.png" class="icono_i" alt="">
                                    <a class="text-decoration-none" href="https://api.whatsapp.com/send?phone={{$empresa->nro_whatsapp}}">
                                        <span>{{$empresa->nro_whatsapp}}</span>
                                    </a>
                                </div>
                                <div class="direccion">
                                    <img src="images/icono_correo.png" class="icono_i" alt="">
                                    <a href="mailto:{{$empresa->email}}" class="text-decoration-none">
                                        <span>{{$empresa->email}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </footer>
        
        <div class="content">
            <table style="width: 100%">
                <tr>
                    <td style="width: 30%">
                        <span class="text-white" style="color: #FFFFFF">ssa</span>
                    </td>
                    <td style="width: 40%">
                        <p class="text-center fw-bold text-primary mb-2" style="font-size: 20px">
                            SOLICITUD DE COTIZACIÓN
                        </p>
                    </td>
                    <td style="width: 30%">
                        <div class="codigo">
                            <p class="text-center mb-2  py-1">{{$admin_cotizaciones_agregado->codigo}}</p>
                        </div>
                    </td>
                </tr>
            </table>
            <p class="text-end">{{$admin_cotizaciones_agregado->updated_at->isoFormat('dddd D \d\e MMMM \d\e\l Y')}}</p>
            <p class="fw-bold text-uppercase mb-1 text-secondary">Solicitante:</p>
            <table class="table" style="width: 100%; font-size:14px">
                <tr>
                    <td class="py-2" style="width: 30%">
                        <p class="mb-0 fw-bold">NOMBRES Y APELLIDOS:</p>
                    </td>
                    <td class="py-2" style="width: 70%">
                        <span>{{$admin_cotizaciones_agregado->interesado->name}}</span>
                    </td>
                </tr>

                <tr>
                    <td class="py-2" style="width: 30%">
                        <p class="mb-0 fw-bold">EMAIL:</p>
                    </td>
                    <td class="py-2" style="width: 70%">
                        <span>{{$admin_cotizaciones_agregado->interesado->email}}</span>
                    </td>
                </tr>

                <tr>
                    <td class="py-2" style="width: 30%">
                        <p class="mb-0 fw-bold">CELULAR:</p>
                    </td>
                    <td class="py-2" style="width: 70%">
                        <span>{{$admin_cotizaciones_agregado->interesado->celular}}</span>
                    </td>
                </tr>
            </table>
            <p class="fw-bold text-uppercase text-secondary">Información de cotización:</p>
            <table class="table mb-3" style="width: 100%; font-size:14px">
                <thead class="bg-primary border border-primary border-bottom-0" style="color: #FFFFFF">
                    <th class="py-1 px-2 border-end border-light">
                        EMPRESA
                    </th>
                    <th class="py-1 px-2">
                        FECHA DE ENTREGA
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-primary px-2 py-1" style="width: 60%">
                            <span>{{$admin_cotizaciones_agregado->empresa_solicitante}}</span>
                        </td>
                        <td class="border border-start-0 border-primary px-2 py-1" style="width: 40%">
                            <span>{{$admin_cotizaciones_agregado->fecha_entrega}}</span>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table" style="width: 100%; font-size:14px">
                <thead class="bg-primary border border-primary border-bottom-0" style="color: #FFFFFF">
                    <th class="py-1 px-2 border-end border-light" style="width: 5%">
                        N°
                    </th>
                    <th class="py-1 px-2" style="width: 50%">
                        AGREGADOS
                    </th>
                    <th class="py-1 px-2" style="width: 25%">
                        CANTIDAD (M<sup>3</sup>)
                    </th>
                    <th class="py-1 px-2" style="width: 10%">
                        PRECIO
                    </th>
                    <th class="py-1 px-2" style="width: 10%">
                        SUBTOTAL
                    </th>
                </thead>
                <tbody>
                    @php
                        $contador = 1;
                        $suma=0;
                        $dt_cotizacion = \App\Models\Detallecotizacionagregado::where('cotizacionagregado_id',$admin_cotizaciones_agregado->id)->get();
                    @endphp
                    @foreach($dt_cotizacion as $dt_cotizaciones)
                    @php
                        $agregado = \App\Models\Agregado::where('id',$dt_cotizaciones->agregado_id)->first();
                        $suma+=$dt_cotizaciones->cantidad*$dt_cotizaciones->precio;
                    @endphp
                        <tr>
                            <td class="border border-primary px-2 py-1" >
                                <span>{{$contador}}</span>
                            </td>
                            <td class="border border-start-0 border-primary px-2 py-1" >
                                <span>{{$agregado->name}}</span>
                            </td>
                            <td class="border border-start-0 border-primary px-2 py-1" >
                                <span>{{$dt_cotizaciones->cantidad}}</span>
                            </td>
                            <td class="border border-start-0 border-primary px-2 py-1" >
                                <span>{{$dt_cotizaciones->precio}}</span>
                            </td>
                            <td class="border border-start-0 border-primary px-2 py-1" >
                                <span>{{$dt_cotizaciones->cantidad*$dt_cotizaciones->precio}}</span>
                            </td>
                        </tr>
                        @php
                            $contador++;
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="border border-primary px-2 py-1" colspan="3">
                            <span style="color: transparent;"></span>
                        </td>
                        <td class="border border-start-0 border-primary px-2 py-1" style="width: 10%">
                            SUBTOTAL
                        </td>
                        <td class="border border-start-0 border-primary px-2 py-1" style="width: 10%">
                            {{$suma}}
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-primary px-2 py-1" colspan="3">
                            <span style="color: transparent;"></span>
                        </td>
                        <td class="border border-start-0 border-primary px-2 py-1" style="width: 10%">
                            I.G.V.
                        </td>
                        <td class="border border-start-0 border-primary px-2 py-1" style="width: 10%">
                            @if($admin_cotizaciones_agregado->igv == 0.18)
                                {{$suma*0.18}}
                            @else
                                0.00
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-primary px-2 py-1" colspan="3">
                            <span style="color: transparent;"></span>
                        </td>
                        <td class="border border-start-0 border-primary px-2 py-1" style="width: 10%">
                            TOTAL
                        </td>
                        <td class="border border-start-0 border-primary px-2 py-1" style="width: 10%">
                            {{$admin_cotizaciones_agregado->costo_afectado}}
                        </td>
                    </tr>
                </tfoot>
            </table>

            <table class="table" style="width: 100%; font-size:14px">
                <tr>
                    <td class="py-2" style="width: 30%">
                        <p class="mb-0">DIRECCIÓN:</p>
                    </td>
                    <td class="py-2" style="width: 70%">
                        <span>{{$admin_cotizaciones_agregado->direccion}}</span>
                    </td>
                </tr>

                <tr>
                    <td class="py-2" style="width: 30%">
                        <p class="mb-0">D.P.D:</p>
                    </td>
                    <td class="py-2" style="width: 70%">
                        <span>{{$admin_cotizaciones_agregado->ubigeo->departamento.' - '.$admin_cotizaciones_agregado->ubigeo->provincia.' - '.$admin_cotizaciones_agregado->ubigeo->distrito}}</span>
                    </td>
                </tr>

                <tr>
                    <td class="py-2" style="width: 30%">
                        <p class="mb-0">TRANSPORTE:</p>
                    </td>
                    <td class="py-2" style="width: 70%">
                        <span>{{$admin_cotizaciones_agregado->transporte_agregado}}</span>
                    </td>
                </tr>
            </table>

            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td class="border-top border-primary py-3">
                            @if($admin_cotizaciones_agregado->igv == 0.18)
                            NOTA: Nuestra oferta de precio incluye IGV (18%).
                            @else
                            NOTA: Nuestra oferta de precio no incluye IGV.
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="fw-bold text-uppercase">Información adicional:</p>
                            <p class="">{{$admin_cotizaciones_agregado->observacion_adicional}}</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 100%">
                <tr>
                    <td style="width: 30%">

                    </td>
                    <td class="text-center" style="width: 40%">
                        <img src="images/firma.png" style="width: 140px" alt="">
                        <p class="border-top border-dark">Atentamente</p>
                    </td>
                    <td style="width: 30%">

                    </td>
                </tr>
            </table>
        </div>
    </body>
    </html>