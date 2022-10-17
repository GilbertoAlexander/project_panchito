@extends('TEMPLATE.landing')

@section('title', 'INICIO')

@section('css')
    
@endsection
 
@section('content')
    <div id="carouselExampleFade" class="carousel slide carrousel__principal carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/carousel-1.jpg" class="img__slider d-block w-100" alt="...">
            </div>
        <div class="carousel-item">
            <img src="/images/carousel-2.jpg" class="img__slider d-block w-100" alt="...">
        </div>
            <div class="carousel-item">
                <img src="/images/carousel-3.jpg" class="img__slider d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container texto__banner d-flex justify-content-center align-items-center">
        <div class="text-center">
            <p class="text-center text-white h1 fw-bold text-uppercase">Transporte y Servicios Panchito S.R.L.</p>  
            <p class="text-white text-center mb-1 d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla recusandae, dolorem rem excepturi autem a, culpa architecto minus facilis, esse reiciendis est laborum nisi dolor dignissimos eius corrupti in accusantium.</p>
            <a href="#" class="btn btn-secondary text-center text-white">Conoce más de nosotros</a>
        </div>       
    </div>

    <section class="w-100 d-flex justify-content-center align-items-center" style="min-height: 500px;">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xl-3 d-flex">
                    <div class="titulo__section align-self-center border-start border-3 border-dark mb-4">
                        <p class="ms-3 fs-4 text-uppercase fw-bold text-secondary pb-0 mb-0">Nuestros</p>
                        <p class="ms-3 display-5 text-uppercase mt-0 mb-0 text-primary fw-bold">Servicios</p>  
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12 col-xl-9" style="min-height: 300px;">
                    <div class="swiper productos-slider px-3 py-3">
                        <div class="swiper-wrapper">
                            @foreach ($servicios as $servicio)
                                <div class="swiper-slide card mb-2 cardservice alto__cardproduct">  
                                    <div class="card-body text-center">
                                        <img src="/images/{{$servicio->tipo->icono}}" class="" style="width: 150px; height: auto;" alt="">
                                        <!-- <i class="fa-solid fa-truck-droplet icono__servicios"></i> -->
                                        <p class="mb-0 mt-3 text-uppercase fw-bold text-secondary">{{$servicio->name}}</p>
                                        <p class="fw-light mb-2 parrafo_4" align="justify">{{$servicio->descripcion}}</p>
                                        <a href="{{url("/servicios/$servicio->slug")}}" class="btn btn-outline-secondary btn-sm">Ver detalles</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        
                        <div class="swiper-button-next nav__btn"></div>
                        <div class="swiper-button-prev nav__btn"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-100 d-flex justify-content-center align-items-center bg-light" style="min-height: 500px;">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3 d-flex">
                    <div class="titulo__section align-self-center border-start border-3 border-dark mb-4">
                        <p class="ms-3 fs-4 text-uppercase fw-bold text-secondary pb-0 mb-0">Variedad de</p>
                        <p class="ms-3 display-5 text-uppercase mt-0 mb-0 text-primary fw-bold">Agregados</p>  
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-9" style="min-height: 300px;">
                    <div class="swiper productos-slider px-3 py-2">
                        <div class="swiper-wrapper">
                            @foreach ($agregados as $agregado)
                            <div class="swiper-slide card mb-2 cardproduct alto__cardproduct">  
                                <img src="/images/agregados/{{$agregado->imagen}}" class="img-fluid"  style="height:220px;" alt="">
                                <div class="card-body text-center">
                                    <p class="mb-0 text-uppercase fw-bold text-primary">{{$agregado->name}}</p>
                                    <p class="fw-light mb-2 parrafo_4" align="justify">{{$agregado->descripcion}}</p>
                                    <a href="{{url("agregado/$agregado->slug")}}" class="btn btn-outline-primary btn-sm">Ver detalles</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <div class="swiper-button-next nav__btn"></div>
                        <div class="swiper-button-prev nav__btn"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-100 d-flex justify-content-center align-items-center" style="min-height: 500px;">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-6 d-flex">
                    <div class="align-self-center">
                        <div class="titulo__section align-self-center border-start border-3 border-dark mb-4">
                            <p class="ms-3 fs-4 text-uppercase fw-bold text-dark pb-0 mb-0">Por que elegir</p>
                            <p class="ms-3 display-5 text-uppercase mt-0 mb-0 text-primary fw-bold">
                                <img src="/images/LOGO_PRINCIPAL.png" class="img__empresa" alt="">
                            </p>  
                        </div>
                        <p class="fw-light fs-5" align="justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit, debitis! Laudantium, consequuntur facilis? Facilis, aliquid culpa? Totam, velit? Provident minima dicta repellendus porro deleniti delectus sit ratione ipsa, sapiente aliquam?</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <img src="/images/seccion__empresa.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="w-100 d-flex justify-content-center align-items-center bg-light" style="min-height: 400px;">
        <div class="container py-5">
            <div class="titulo__section border-start border-3 border-dark mb-4">
                <p class="ms-3 fs-5 text-uppercase fw-bold text-secondary pb-0 mb-0">Nuestros</p>
                <p class="ms-3 display-6 text-uppercase mt-0 mb-0 text-primary fw-bold">Clientes</p>  
            </div>

            <div class="swiper clientes-slider px-3 py-3">
                <div class="swiper-wrapper">
                    @foreach($clientes as $cliente)
                        <div class="swiper-slide card mb-2 cardservice">  
                            <img src="/images/clientes/{{$cliente->imagen}}" style="width: 100%; height: 140px;" class="img__servicio rounded" alt="...">
                        </div>
                    @endforeach
                </div>
                
                <div class="swiper-button-next nav__btn"></div>
                <div class="swiper-button-prev nav__btn"></div>
            </div>
        </div>
    </section>

    <section class="w-100 d-flex justify-content-center align-items-center" style="min-height: 500px;">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-7 order-2 order-md-1 mb-3 mb-md-0">
                    <img src="/images/proximo_proyecto.jpg" class="img-fluid rounded shadow" alt="">
                </div>

                <div class="col-12 col-md-5 order-1 order-md-2 mb-3 mb-md-0 d-flex">
                    <div class="text-center align-self-center" data-aos="fade-left" data-aos-duration="1000">
                        <p class="fw-bold fs-1 text-secondary">TRABAJEMOS JUNTOS EN SU PRÓXIMO PROYECTO</p>
                        <p class="text-dark fs-4">Un equipo de profesionales siempre estará disponible para orientarte en las decisiones de tus proyectos tecnológicos.</p>
                        <a href="{{url('contactenos')}}" class="btn btn-primary px-5">¡VAMOS!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection