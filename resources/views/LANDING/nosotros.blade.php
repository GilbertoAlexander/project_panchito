@extends('TEMPLATE.landing')

@section('title', 'NOSOTROS')

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
            <h1 class="text-uppercase fw-bold display-3 text-white fst-italic">Nosotros</h1>
            <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde sequi libero dolore, sed itaque.</p>
        </div>
    </div>

    <section class="w-100 bg-light" style="min-height: 150px;">
        <div class="container py-5">
            <div class="text-center">
                <p class="display-5 text-secondary text-uppercase fw-bold">¿Quienes <span class="text-primary">Somos?</span></p>
                <p class="text__parrafo fw-light text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil distinctio molestiae, sequi quas rem repudiandae ducimus quae nesciunt animi delectus tempora! Dignissimos similique tenetur rerum, nostrum dicta nobis maxime suscipit!</p>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <div class="card border-0 card-cuantica h-100 shadow-sm mb-3 d-flex justify-content-center align-items-center">
                        <div class="row g-0">
                        <div class="col-4 d-flex">
                            <div class="text-center align-self-center">
                                <img src="/images/ICONO_MISION.png" class="img-fluid rounded-start p-3" alt="...">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                            <h5 class="card-title text-center text-uppercase fw-bold text-secondary">Misión</h5>
                            <p class="card-text description__cuantica" align="justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum id, at autem consectetur, recusandae consequatur non eaque porro repellat soluta nisi quia alias qui cupiditate quam asperiores doloribus error odit!</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <div class="card border-0 card-cuantica h-100 shadow-sm mb-3 d-flex justify-content-center align-items-center" ">
                        <div class="row g-0">
                        <div class="col-4 d-flex">
                            <div class="text-center align-self-center">
                                <img src="/images/ICONO_VISION.png" class="img-fluid rounded-start p-3" alt="...">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                            <h5 class="card-title text-center text-uppercase fw-bold text-secondary">Visión</h5>
                            <p class="card-text description__cuantica" align="justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed minima iure similique quaerat quasi, alias molestiae itaque veritatis dolores esse hic nihil perferendis ducimus facere quis labore, voluptatibus magni officia.</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-100 d-flex bg__equipo justify-content-center align-items-center" style="min-height: 400px;">
        <div class="container py-5">
            <p class="display-5 text-secondary text-uppercase fw-bold text-center">Nuestro <span class="text-primary">Equipo</span></p>
            <div class="row">         
                <div class="col-12 col-md-4 my-2" data-aos="fade-up" data-aos-duration="500">
                    <div class="card border-4 borde-right-primary shadow-sm rounded">
                        <div class="row">
                            <div class="col-4">
                                <img src="images/FOTO_TRABAJADOR.png" class="rounded-start" width="100" height="100" alt="">
                            </div>
                            <div class="col-8 d-flex">
                                <div class="align-self-center">
                                    <span class="d-block fw-bold text-uppercase">Diego César Torres Tasaico</span>
                                    <span class="d-block text-uppercase text-muted">Chofer de volquete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
@endsection

@section('js')
@endsection