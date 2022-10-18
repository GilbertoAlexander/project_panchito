@extends('TEMPLATE.administrador')

@section('title', 'EMPRESA')

@section('css')
@endsection

@section('content')
<!-- Encabezado -->
<div class="row pt-5">
    <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Empresa</h1>
        <p class="text-muted">Se muestra el detalle de la información de la empresa</p>
    </div>
    <div class="col-lg-3 d-flex">
        <a href="{{url("admin-empresa/$admin_empresa->slug/edit")}}" class="btn btn-secondary w-100 align-self-center text-white mb-2 mb-md-0">
            <i class="bi bi-pencil-square me-2"></i>
            Actualizar registro
        </a>
    </div>
</div>
<!-- fin encabezado -->

<!-- Contenido -->
        <span class="mb-0 fw-bold text-primary text-uppercase">Banner principal</span>
        <div class="swiper portada-slider pb-3">
            <div class="swiper-wrapper">
                @foreach($admin_empresa->images as $image)  
                    <div class="swiper-slide card shadow-sm">  
                        <img src="{{$image->url}}" class="card-img slider" style="height:190px;width:100%;" alt="...">
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next text-secondary"></div>
            <div class="swiper-button-prev text-secondary"></div>
        </div>

        <div class="row">
            <div class="col-12 my-2">
                <span class="mb-0 fw-bold text-primary text-uppercase">Portada</span>
                <img src="/images/empresa/{{$admin_empresa->img_portada}}" class="rounded portada" style="width:100%; height: 400px;" alt="">
            </div>
        </div>

        <p class="mt-3 mb-0 fw-bold text-primary text-uppercase">Detalles de la empresa</p>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-3 col-lg-2 d-flex">
                        <img src="/images/empresa/{{$admin_empresa->logo}}" class="align-self-center" style="width:100%" alt="">
                    </div>
                    <div class="col-12 col-md-9 col-lg-10">
                        <h5 class="card-title text-uppercase text-center text-lg-start">{{$admin_empresa->razonsocial}}</h5>
                        <div class="row">
                            <div class="col-12 col-lg-6 my-2">
                                <span class="text-muted">R.U.C. {{$admin_empresa->ruc}}</span>
                            </div>
                            <div class="col-12 col-lg-6 my-2">
                                <span class="float-center float-lg-end  ">
                                    <a target="_blank" class="p-2 rounded bg-facebook text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook" href="{{$admin_empresa->url_facebook}}"><i class="bi bi-facebook"></i></a>
                                    <a target="_blank" class="p-2 rounded bg-whatsapp text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Whatsapp" href="https://wa.me/{{$admin_empresa->nro_whatsapp}}"><i class="bi bi-whatsapp"></i></a>
                                    <a target="_blank" class="p-2 rounded bg-instagram text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram" href="{{$admin_empresa->url_instagram}}"><i class="bi bi-instagram"></i></a>
                                </span>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-12 col-md-4">
                                <span class="text-primary text-uppercase">Correo:</span>
                                <p class="">{{$admin_empresa->email}}</p>
                            </div>
                            <div class="col-12 col-md-4">
                                <span class="text-primary text-uppercase">Telefono:</span>
                                <p class="">{{$admin_empresa->telefono}}</p>
                            </div>
                            <div class="col-12 col-md-4">
                                <span class="text-primary text-uppercase">Celular:</span>
                                <p class="">{{$admin_empresa->celular}}</p>
                            </div>
                            <div class="col-12 col-md-4">
                                <span class="text-primary text-uppercase">Departamento/Provincia/Distrito:</span>
                                <p class="">{{$admin_empresa->ubigeo->departamento.'/'.$admin_empresa->ubigeo->provincia.'/'.$admin_empresa->ubigeo->distrito}}</p>
                            </div>
                            <div class="col-12 col-md-4">
                                <span class="text-primary text-uppercase">Dirección:</span>
                                <p class="">{{$admin_empresa->direccion}}</p>
                            </div>
                            <div class="col-12 col-md-4">
                                <span class="text-primary text-uppercase">Referencia:</span>
                                <p class="">{{$admin_empresa->referencia}}</p>
                            </div>
                            <div class="col-12 col-md-4">
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-12 col-md-4">
                <div class="card mb-3 border-0 rounded-0 bg-transparent">
                    <div class="card-body text-center">
                        <h5 class="card-title">Misión</h5>
                        <p class="card-text">{{$admin_empresa->mision}}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card mb-3 border-0 rounded-0 bg-transparent">
                    <div class="card-body text-center">
                        <h5 class="card-title">Visión</h5>
                        <p class="card-text">{{$admin_empresa->vision}}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card mb-3 border-0 rounded-0 bg-transparent">
                    <div class="card-body text-center">
                        <h5 class="card-title">¿Quienes Somos?</h5>
                        <p class="card-text">{{$admin_empresa->nosotros}}</p>
                    </div>
                </div>
            </div>
        </div>
<!-- Fin contenido -->
@endsection

@section('js')
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".portada-slider", {
        //   slidesPerView: 1,
        loop:true,
        spaceBetween: 15,
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
            slidesPerView: 2,
            //   spaceBetween: 20,
            },
            768: {
            slidesPerView: 3,
            //   spaceBetween: 40,
            },
            1024: {
            slidesPerView: 4,
            //  spaceBetween: 50,
            },
        },
        });
    </script>

    <!--sweet alert actualizar-->
    @if(session('update') == 'ok')
    <script>
        Swal.fire({
        icon: 'success',
        confirmButtonColor: '#0048A4',
        title: '¡Actualizado!',
        text: 'Registro actualizado correctamente',
        })
    </script>
    @endif
@endsection