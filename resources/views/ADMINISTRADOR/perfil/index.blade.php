@extends('TEMPLATE.administrador')

@section('title', 'MI PERFIL')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
@endsection

@section('content')
<!-- Encabezado -->
<div class="row pt-5">
    <div class="col-lg-9 pt-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h1 class="text-primary h3 text-uppercase fw-bold mb-0">Mi perfil</h1>
        <p class="text-muted">Se muestra el detalle de la información del usuario</p>
    </div>
    <div class="col-lg-3 d-flex">
        <a href="" class="btn btn-secondary w-100 align-self-center text-white mb-2 mb-md-0">
            <i class="bi bi-pencil-square me-2"></i>
            Actualizar registro
        </a>
    </div>
</div>
<!-- fin encabezado -->

<!-- Contenido -->

<!-- Fin contenido -->
@endsection

@section('js')
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".urbanizacion-slider", {
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