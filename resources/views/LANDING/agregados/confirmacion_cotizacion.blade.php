@extends('TEMPLATE.landing')

@section('title', 'COTIZACION AGREGADOS')

@section('css')
    
@endsection
 
@section('content')
    <section class="w-100" style="min-height: 360px;">
        <div class="container py-5 py-md-0">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-center align-items-center">
                    <div class="">
                        <p class="text-primary fw-bold text-uppercase text-center fs-3 pt-4">¡Tu cotización fue enviada!</p>
                        <p class="text-center text-dark fw-light  fs-4">Nuestro personal revisará tu solicitud y se pondrá en contacto con usted a la brevedad posible. ¡Muchas gracias!</p>
                        <div class="text-center">
                            <a href="" class="btn btn-secondary text-white text-uppercase">
                                <i class="bi bi-download me-2"></i>
                                Descargar cotización
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <img src="/images/confirm_cotizacion.gif" alt="">
                </div>
            </div>

            
        </div>
    </section>
@endsection

@section('js')
@endsection