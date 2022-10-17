@extends('TEMPLATE.landing')

@section('title', 'AGREGADOS')

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
            <h1 class="text-uppercase fw-bold display-3 text-white fst-italic">Agregados</h1>
            <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde sequi libero dolore, sed itaque.</p>
        </div>
    </div>

    <section class="w-100" style="min-height: 500px;">
        <div class="container py-5">
            <div class="row mb-3">
                <div class="col-12 col-md-6">
                    <form action="">
                        <div class="input-group input-group-sm mb-3">
                            <input type="search"  name="buscarpor" class="form-control border-0 rounded-0 border-bottom" placeholder="Buscar agregado" aria-label="Search">
                            <button class="btn  border-bottom" type="submit" id="button-addon2">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <div class="float-end d-none d-md-block">
                        <div aria-label="Page navigation example">
                            <ul class="pagination pagination-sm">
                            <div aria-label="...">
                                    <div class="row">
                                        {{$agregados->links() }}
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-secondary text-uppercase text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Quiero una cotización
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white py-2">
                        <span class="modal-title text-uppercase small" id="staticBackdropLabel">Solicitar Cotización</span>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-secondary fw-bold text-center pt-4" data-aos="fade-up"data-aos-duration="500">Te damos un presupuesto con solo unas preguntas</h4>
                        <p class="text-center text-dark  fs-5" data-aos="fade-up" data-aos-duration="500">1. ¡Hola! Somos RENTAL Y SERVICIOS PANCHITO. Cuéntanos a cerca de tu necesidad de servicio para hacer una cotización a tu medida</p>
                        <form method="POST" action="agregados/cotizacion"  enctype="multipart/form-data" autocomplete="off" >
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group py-1">
                                        <label for="nameapp" class="form-label text-dark">Nombres y Apellidos</label>
                                        <input type="text" id="id_nameapp" required name="name" class="form-control form-control-sm rounded-0 bg-transparent text-primary border-0 border-bottom">
                                        
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label text-dark">Correo eletrónico</label>
                                        <input type="email" id="id_email" required name="email" class="form-control form-control-sm rounded-0 bg-transparent text-primary border-0 border-bottom">
                                        
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="id_servicio" class="form-label text-dark">Celular - (Whatsapp)</label>
                                        <input type="number" id="id_servicio" required name="celular" class="form-control form-control-sm rounded-0 bg-transparent text-primary border-0 border-bottom">
                                         @error('celular')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" id="boton" class="btn btn-primary text-center col-6">Comenzar</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>

            <div class="row mt-3">
                @foreach($agregados as $agregado)
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card mb-2 cardproduct alto__cardproduct">  
                            <img src="/images/agregados/{{$agregado->imagen}}" class="img-fluid"  style="height:170px;" alt="">
                            <div class="card-body text-center">
                                <p class="mb-0 text-uppercase fw-bold text-primary">Arena Fina</p>
                                <p class="fw-light mb-2 parrafo_4" align="justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore exercitationem ipsum tempore nam? Numquam, alias laboriosam nihil quidem ducimus incidunt excepturi non et quaerat mollitia at velit voluptate. Ut, voluptate!</p>
                                <a href="#" class="btn btn-outline-primary btn-sm">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection