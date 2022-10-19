@extends('TEMPLATE.landing')

@section('title', 'SERVICIOS')

@section('css')
    <style>
        .banner__section
        {
            background-image: url(/images/BANNER__SECTION.png);
            background-size: cover;
            width: 100%;
            height: 350px;
        }

        .img__contacto{
            background-size: cover;
            background-image: url(/images/img_contacto.jpg);
            max-width: 100%;
            height: 540px;
        }
    </style>
@endsection
 
@section('content')
<div class="banner__section d-flex justify-content-center align-items-center">
    <div class="container text-center">
        <h1 class="text-uppercase fw-bold display-3 text-white fst-italic">Servicios</h1>
        <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde sequi libero dolore, sed itaque.</p>
    </div>
</div>

<section class="w-100" style="min-height: 500px;">
    <div class="container py-5">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active text-uppercase" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Alquiler</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link text-uppercase" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Proyectos</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link text-uppercase" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Abastecimiento de agua en cisterna</button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <!-- seccion alquiler -->
                <div class="row mb-4">
                    @foreach($servicios_alquiler as $servicio)
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="card mb-2 cardservice alto__cardproduct">  
                                <div class="card-body text-center">
                                    <img src="/images/{{$servicio->tipo->icono}}" class="" style="width: 150px; height: auto;" alt="">
                                    <!-- <i class="fa-solid fa-truck-droplet icono__servicios"></i> -->
                                    <p class="mb-0 mt-3 text-uppercase fw-bold text-secondary">{{$servicio->name}}</p>
                                    <p class="fw-light mb-2 parrafo_4" align="justify">{{$servicio->descripcion}}</p>
                                    <a href="{{url("/servicios/$servicio->slug")}}" class="btn btn-outline-secondary btn-sm">Ver detalles</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($servicios_alquiler->count() == 0)
                    
                @else
                    <div class="">
                        <p class="text-center mb-3 fs-3">TODAS NUESTRAS UNIDADES CUENTAN CON</p>
                        <div class="row justify-content-center">
                            {{-- <div class="col-6 col-sm-6 col-md-4 col-lg-2 col-xl-2 my-2 my-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                                <div class="card h-100 border-secondary shadow">
                                    <div class="card-body text-center">
                                        <div class="imagen bg-primary rounded-circle mx-auto d-flex justify-content-center align-items-center" style="width: 100px; height: 100px">
                                            <img src="/images/iconos_transporte/conductor.png" style="width: 70px; height: 70px" alt="">
                                        </div>
                                        <p class="fw-bold text-uppercase mb-0 mt-2" style="font-size:14px">Chofer capacitado</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-2 col-xl-2 my-2 my-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                                <div class="card h-100 border-secondary shadow">
                                    <div class="card-body text-center">
                                        <div class="imagen bg-primary rounded-circle mx-auto d-flex justify-content-center align-items-center" style="width: 100px; height: 100px">
                                            <img src="/images/iconos_transporte/hoja_de_papel.png" style="width: 70px; height: 70px" alt="">
                                        </div>
                                        <p class="fw-bold text-uppercase mb-0 mt-2" style="font-size:14px">Soat vigente</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-2 col-xl-2 my-2 my-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                                <div class="card h-100 border-secondary shadow">
                                    <div class="card-body text-center">
                                        <div class="imagen bg-primary rounded-circle mx-auto d-flex justify-content-center align-items-center" style="width: 100px; height: 100px">
                                            <img src="/images/iconos_transporte/aire_acondicionado.png" style="width: 70px; height: 70px" alt="">
                                        </div>
                                        <p class="fw-bold text-uppercase mb-0 mt-2" style="font-size:14px">Aire acondicionado</p>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-6 col-sm-6 col-md-4 col-lg-2 col-xl-2 my-2 my-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                                <div class="card h-100 border-secondary shadow">
                                    <div class="card-body text-center">
                                        <div class="imagen bg-primary rounded-circle mx-auto d-flex justify-content-center align-items-center" style="width: 100px; height: 100px">
                                            <img src="/images/iconos_transporte/escudo_seguro.png" style="width: 70px; height: 70px" alt="">
                                        </div>
                                        <p class="fw-bold text-uppercase mb-0 mt-2" style="font-size:14px">Seguridad</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-2 col-xl-2 my-2 my-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                                <div class="card h-100 border-secondary shadow">
                                    <div class="card-body text-center">
                                        <div class="imagen bg-primary rounded-circle mx-auto d-flex justify-content-center align-items-center" style="width: 100px; height: 100px">
                                            <img src="/images/iconos_transporte/sctr.png" style="width: 70px; height: 70px" alt="">
                                        </div>
                                        <p class="fw-bold text-uppercase mb-0 mt-2" style="font-size:14px">Personal con SCTR</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-6 col-sm-6 col-md-4 col-lg-2 col-xl-2 my-2 my-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                                <div class="card h-100 border-secondary shadow">
                                    <div class="card-body text-center">
                                        <div class="imagen bg-primary rounded-circle mx-auto d-flex justify-content-center align-items-center" style="width: 100px; height: 100px">
                                            <img src="/images/iconos_transporte/gps.png" style="width: 70px; height: 70px" alt="">
                                        </div>
                                        <p class="fw-bold text-uppercase mb-0 mt-2" style="font-size:14px">GPS</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <!-- seccion proyectos -->
                <div class="row">
                    @foreach($servicios_proyectos as $servicio)
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card mb-2 cardservice alto__cardproduct">  
                            <div class="card-body text-center">
                                <img src="/images/{{$servicio->tipo->icono}}" class="" style="width: 150px; height: auto;" alt="">
                                <!-- <i class="fa-solid fa-truck-droplet icono__servicios"></i> -->
                                <p class="mb-0 mt-3 text-uppercase fw-bold text-secondary">{{$servicio->name}}</p>
                                <p class="fw-light mb-2 parrafo_4" align="justify">{{$servicio->descripcion}}</p>
                                <a href="{{url("/servicios/$servicio->slug")}}" class="btn btn-outline-secondary btn-sm">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <!-- seccion abastecimiento de agua en cisterna -->
                <div class="row">
                    @foreach($servicios_abastecimiento as $servicio)
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card mb-2 cardservice alto__cardproduct">  
                            <div class="card-body text-center">
                                <img src="/images/{{$servicio->tipo->icono}}" class="" style="width: 150px; height: auto;" alt="">
                                <!-- <i class="fa-solid fa-truck-droplet icono__servicios"></i> -->
                                <p class="mb-0 mt-3 text-uppercase fw-bold text-secondary">{{$servicio->name}}</p>
                                <p class="fw-light mb-2 parrafo_4" align="justify">{{$servicio->descripcion}}</p>
                                <a href="{{url("/servicios/$servicio->slug")}}" class="btn btn-outline-secondary btn-sm">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
          </div>
    </div>
</section>
@endsection

@section('js')
@endsection