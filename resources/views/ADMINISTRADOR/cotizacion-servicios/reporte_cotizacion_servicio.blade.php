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
                                    <a href="#" class="text-decoration-none">
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
                            <p class="text-center mb-2  py-1">{{$admin_cotizaciones_servicio->codigo}}</p>
                        </div>
                    </td>
                </tr>
            </table>
            <p class="text-end">{{$admin_cotizaciones_servicio->created_at->isoFormat('dddd D \d\e MMMM \d\e\l Y')}}</p>
            <p class="fw-bold text-uppercase">Solicitante:</p>
            <table class="table" style="width: 100%; font-size:14px">
                <tr>
                    <td class="py-2" style="width: 30%">
                        <p class="mb-0">NOMBRES Y APELLIDOS:</p>
                    </td>
                    <td class="py-2" style="width: 70%">
                        <span>{{$admin_cotizaciones_servicio->interesado->name}}</span>
                    </td>
                </tr>

                <tr>
                    <td class="py-2" style="width: 30%">
                        <p class="mb-0">EMAIL:</p>
                    </td>
                    <td class="py-2" style="width: 70%">
                        <span>{{$admin_cotizaciones_servicio->interesado->email}}</span>
                    </td>
                </tr>

                <tr>
                    <td class="py-2" style="width: 30%">
                        <p class="mb-0">CELULAR:</p>
                    </td>
                    <td class="py-2" style="width: 70%">
                        <span>{{$admin_cotizaciones_servicio->interesado->celular}}</span>
                    </td>
                </tr>
                <tr>
                    <td class="py-2" style="width: 30%">
                        <p class="mb-0">SERVICIO REQUERIDO:</p>
                    </td>
                    <td class="py-2" style="width: 70%">
                        <span>{{$admin_cotizaciones_servicio->interesado->servicio->name}}</span>
                    </td>
                </tr>
            </table>
            @if($admin_cotizaciones_servicio->interesado->servicio->tipo->id == 1)
                <p class="fw-bold text-uppercase">Información de cotización:</p>
                <table class="table" style="width: 100%; font-size:14px">
                    <tr>
                        <td class="border border-end-0 border-primary px-2 py-2" style="width: 30%">
                            <p class="mb-0">EMPRESA</p>
                        </td>
                        <td class="border border-start-0 border-primary px-2 py-2" style="width: 70%">
                            <span>{{$admin_cotizaciones_servicio->empresa_solicitante}}</span>
                        </td>
                    </tr>
                </table>
                <table class="table" style="width: 100%; font-size:14px">
                    <tr>
                        <td class="ps-2 py-2 border border-end-0 border-primary" style="width: 18%">
                            <p class="mb-0">FEC. EJECUCIÓN:</p>
                        </td>
                        <td class="ps-2 py-2 border border-start-0 border-primary" style="width: 15%">
                            <span>{{$admin_cotizaciones_servicio->fecha_ejecucion}}</span>
                        </td>

                        <td class="ps-2 py-2 border border-end-0 border-primary" style="width: 18%">
                            <p class="mb-0">H. REQUERIDAS:</p>
                        </td>
                        <td class="ps-2 py-2 border border-start-0 border-primary" style="width: 15%">
                            <span>{{$admin_cotizaciones_servicio->horas_requeridas}} HORAS</span>
                        </td>

                        <td class="ps-2 py-2 border border-end-0 border-primary" style="width: 18%">
                            <p class="mb-0">OP. MAQUINARIA:</p>
                        </td>
                        <td class="ps-2 py-2 border border-start-0 border-primary" style="width: 15%">
                            <span>{{$admin_cotizaciones_servicio->operador_maquinaria}}</span>
                        </td>
                    </tr>
                </table>

                <p class="fw-bold text-uppercase">Descripción:</p>
                <p class="fw-bold text-secondary mb-1 text-uppercase">{{$admin_cotizaciones_servicio->interesado->servicio->name}}</p>
                <p class="">{!!$admin_cotizaciones_servicio->interesado->servicio->contenido!!}</p>

                <p class="fw-bold text-uppercase">Información adicional:</p>
                <p class="">{{$admin_cotizaciones_servicio->informacion_adicional}}</p>
            @endif
            @if($admin_cotizaciones_servicio->interesado->servicio->tipo->id == 2)
                <p class="fw-bold text-uppercase">Información de cotización:</p>
                <table class="table" style="width: 100%; font-size:14px">
                    <tr>
                        <td class="border border-end-0 border-primary px-2 py-2" style="width: 15%">
                            <p class="mb-0">EMPRESA</p>
                            <p class="mb-0"><span>{{$admin_cotizaciones_servicio->empresa_solicitante}}</span></p>
                        </td>
                        
                        <td class="border border-end-0 border-primary px-2 py-2" style="width: 15%">
                            <p class="mb-0">DIRECCION</p>
                            <span>{{$admin_cotizaciones_servicio->direccion}}</span>
                        </td>
                        
                        <td class="ps-2 py-2 border border-end-0 border-primary" style="width: 15%">
                            <p class="mb-0">FEC. EJECUCIÓN:</p>
                            <span class="">{{$admin_cotizaciones_servicio->fecha_ejecucion}}</span>
                        </td>
                        <td class="ps-2 py-2 border border-start-0 border-primary" style="width: 1%">
                        </td>
                    </tr>
                </table>
                <table class="table" style="width: 100%; font-size:14px">
                    <tr>
                        

                        <td class="ps-2 py-2 border border-end-0 border-primary" style="width: 18%">
                            <p class="mb-0">DEPARTAMENTO - PROVINCIA - DISTRITO:</p>
                        </td>
                        <td class="ps-2 py-2 border border-start-0 border-primary" style="width: 15%">
                            <span>{{$admin_cotizaciones_servicio->ubigeo_id?$admin_cotizaciones_servicio->ubigeo->departamento.'-'.$admin_cotizaciones_servicio->ubigeo->provincia.'-'.$admin_cotizaciones_servicio->ubigeo->distrito:'No requerido'}}</span>
                        </td>
                    </tr>
                </table>
                <p class="fw-bold text-uppercase">Descripción:</p>
                <p class="fw-bold text-secondary mb-1 text-uppercase">{{$admin_cotizaciones_servicio->interesado->servicio->name}}</p>
                <p class="">{!!$admin_cotizaciones_servicio->interesado->servicio->contenido!!}</p>

                <p class="fw-bold text-uppercase">Información adicional:</p>
                <p class="">{{$admin_cotizaciones_servicio->informacion_adicional}}</p>
            @endif
            @if($admin_cotizaciones_servicio->interesado->servicio->tipo->id == 3)
                <p class="fw-bold text-uppercase">Información de cotización:</p>
                <table class="table" style="width: 100%; font-size:14px">
                    <tr>
                        <td class="border border-end-0 border-primary px-2 py-2" style="width: 30%">
                            <p class="mb-0">EMPRESA</p>
                        </td>
                        <td class="border border-start-0 border-primary px-2 py-2" style="width: 70%">
                            <span>{{$admin_cotizaciones_servicio->empresa_solicitante}}</span>
                        </td>
                    </tr>
                </table>
                <table class="table" style="width: 100%; font-size:14px">
                    <tr>
                        <td class="ps-2 py-2 border border-end-0 border-primary" style="width: 13%">
                            <p class="mb-0">FEC. ENTREGA:</p>
                        </td>
                        <td class="ps-2 py-2 border border-start-0 border-primary" style="width: 10%">
                            <span>{{$admin_cotizaciones_servicio->fecha_ejecucion}}</span>
                        </td>

                        <td class="ps-2 py-2 border border-end-0 border-primary" style="width: 18%">
                            <p class="mb-0">CANTIDAD:</p>
                        </td>
                        <td class="ps-2 py-2 border border-start-0 border-primary" style="width: 15%">
                            <span>{{$admin_cotizaciones_servicio->cantidad_requerida}} Litros</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-2 py-2 border border-end-0 border-primary" style="width: 13%">
                            <p class="mb-0">DIRECCION</p>
                        </td>
                        <td class="ps-2 py-2 border border-start-0 border-primary" style="width: 10%">
                            <span>{{$admin_cotizaciones_servicio->direccion}}</span>
                        </td>

                        <td class="ps-2 py-2 border border-end-0 border-primary" style="width: 18%">
                            <p class="mb-0">DEPARTAMENTO - PROVINCIA - DISTRITO:</p>
                        </td>
                        <td class="ps-2 py-2 border border-start-0 border-primary" style="width: 15%">
                            <span>{{$admin_cotizaciones_servicio->ubigeo_id?$admin_cotizaciones_servicio->ubigeo->departamento.'-'.$admin_cotizaciones_servicio->ubigeo->provincia.'-'.$admin_cotizaciones_servicio->ubigeo->distrito:'No requerido'}}</span>
                        </td>
                    </tr>
                </table>

                <p class="fw-bold text-uppercase">Descripción:</p>
                <p class="fw-bold text-secondary mb-1 text-uppercase">{{$admin_cotizaciones_servicio->interesado->servicio->name}}</p>
                <p class="">{!!$admin_cotizaciones_servicio->interesado->servicio->contenido!!}</p>
            @endif
        </div>
    </body>
    </html>