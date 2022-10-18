<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PANCHITO | @yield('title')</title>
    <link rel="icon" href="/images/icon.png">
    <link rel="stylesheet" href="/css/panchito_web.css">
    <link rel="stylesheet" href="/css/landing.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    @yield('css')
    @stack('meta')
    <style>
        .nav__btn
        {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            /* transform: translateY(10px); */
            background-color: rgba(0, 0, 0, 0.5);
            transition: 0.2s;
        }

        .nav__btn:hover{
            background-color: rgba(0, 0, 0, 0.8);
        }

        .nav__btn::after,
        .nav__btn::before{
            font-size: 20px;
            color: #FFFFFF;
        }
    </style>
</head>
<body>
    @php
        $admin_empresa = \App\Models\Empresa::find(1);
    @endphp
    <nav class="navbar navbar-expand-lg navbar-light bg__menu__nav shadow-sm fixed-top py-3">
        <div class="container">
            <button class="navbar-toggler navbar-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="logo">
                <a class="navbar-brand text-primary fw-bold px-md-2" href="{{url('/')}}">
                    <img src="/images/LOGO_PRINCIPAL.png" class="logo___principal" alt="">
                </a>
            </div>
           
            <div class="d-flex d-lg-none">
                <a class="nav-link menu-redes lead" href="{{url('admin-empresa')}}">
                    <i class="bi bi-person-circle border rounded border-secondary py-1 px-2"></i>
                </a>
            </div>
            
           
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-3 {{ request()->is(['nosotros*'])? 'active-menu' : null}} menu-item mx-0 mx-md-1 text-center text-md-start mt-3 mt-md-0" href="{{url('nosotros')}}">Sobre nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3 {{ request()->is(['servicios*'])? 'active-menu' : null}} menu-item mx-0 mx-md-1 text-center text-md-start mt-3 mt-md-0" href="{{url('servicios')}}">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3 {{ request()->is(['agregados*'])? 'active-menu' : null}} menu-item mx-0 mx-md-1 text-center text-md-start mt-3 mt-md-0" href="{{url('agregados')}}">Agregados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3 {{ request()->is(['contacto*'])? 'active-menu' : null}} menu-item mx-0 mx-md-1 text-center text-md-start mt-3 mt-md-0" href="{{url('contacto')}}">Contacto</a>
                    </li>
                    <li class="nav-item d-flex justify-content-center d-lg-none">
                        <a target="_blank" class="nav-link px-2 me-2 align-self-center border rounded border-secondary text-secondary" href="{{$admin_empresa->url_facebook}}">
                            <i class="bi bi-facebook me-2"></i>
                            Facebook
                        </a>
                        <a target="_blank" class="nav-link px-2 ms-2 align-self-center border rounded border-secondary text-secondary" href="{{$admin_empresa->url_instagram}}">
                            <i class="bi bi-instagram me-2"></i>
                            Instagram
                        </a>
                    </li>   
                </ul>
                <li class="nav-item d-lg-flex ps-3 align-self-center justify-content-between d-none">
                    <a target="_blank" class="nav-link px-2 menu-redes align-self-center" href="{{$admin_empresa->url_facebook}}">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a target="_blank" class="nav-link px-2 menu-redes align-self-center" href="{{$admin_empresa->url_instagram}}">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a class="nav-link px-2 menu-redes align-self-center" href="{{url('logueo')}}">
                        <i class="bi bi-person-circle"></i>
                    </a>
                    
                </li>
            </div>
        </div>
    </nav>
    <div class="height__menu bg-secondary" style="min-height: 84px;"></div>

    @yield('content')

     <!-- Footer -->
     <footer class="bg-primary text-white">
        <div class="container py-4">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-4 mb-5 mb-md-0 d-flex align-self-center">
                    <img src="/images/LOGO_WHITE_H.png" class=" ms-3" style="width: 100%; height: auto;" alt="">
                </div>
                <div class="col-6 col-md-3 col-lg-2 mb-3 mb-md-0">
                    <h5 class="text-uppercase mb-4 fw-bold text-white small">Políticas</h5>
                    <p class="small text-light">
                        <a href="{{url('aviso_legal')}}" target="_bank" class="text-white" style="text-decoration:none;">Aviso Legal</a>
                    </p>
                    <p class="small text-light">
                        <a href="{{url('politica_de_privacidad')}}" target="_bank" class="text-white" style="text-decoration:none;">Política de Privacidad</a>
                    </p>
                    <p class="small text-light">
                        <a href="{{url('politica_de_cookies')}}" target="_bank" class="text-white" style="text-decoration:none;">Políticas de Cookies</a>
                    </p>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-3 mb-md-0 mb-4">
                    <h5 class="text-uppercase mb-4 fw-bold text-white small">Nuestras Redes</h5>
                    <div class="buttons__redes">
                        <div class="d-flex">
                            <div class="card btn__facebook">
                                <a href="{{$admin_empresa->url_facebook}}" target="_blank" class="stretched-link"><i class="bi bi-facebook icono__redes"></i></a>
                            </div>
                            <div class="card btn__instagram">
                                <a href="{{$admin_empresa->url_instagram}}" target="_blank" class="stretched-link"><i class="bi bi-instagram icono__redes"></i></a>
                            </div>
                            <div class="card btn__twitter">
                                <a href="{{$admin_empresa->url_twitter}}" target="_blank" class="stretched-link"><i class="bi bi-twitter icono__redes"></i></a>
                            </div>
                            <div class="card btn__linkedin">
                                <a href="{{$admin_empresa->url_linkedin}}" target="_blank" class="stretched-link"><i class="bi bi-linkedin icono__redes"></i></a>
                            </div>
                        </div>
                        <hr>
                        <div class="card btn__corporativo">
                            <a href="https://google.com" target="_blank" class="stretched-link"><i class="bi bi-mailbox2 icono__redes"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4 mb-3 mb-md-0">
                    <h5 class="text-uppercase mb-4 fw-bold text-white small">Contáctenos</h5>
                    <p class="text-white" align="justify"><i class="bi bi-house-door-fill me-3"></i> {{$admin_empresa->direccion}}</p>
                    <p class="text-white"><i class="bi bi-envelope-fill me-3"></i> {{$admin_empresa->email}}</p>
                    <p class="text-white"><i class="bi bi-telephone-fill me-3"></i> {{$admin_empresa->telefono}} - {{$admin_empresa->celular}}</p>
                </div>
            </div>
        </div>
        <hr class="my-0 text-white">
        <div class="container-fluid">
            <div class="row py-2">
                <div class="col-12 col-md-6 d-none d-md-block">
                    <small class="text-white text-uppercase">Desarrollado Por <a href="https://cuanticagroup.com/welcome" class="text-decoration-none text-white" target="_bank">Cuantica <span class="text-white text-capitalize">Group</span></a></small>
                </div>
                <div class="col-12 col-md-6 text-center text-md-end">
                    <span class="float-end text-white">Copyright © <?php echo date("Y");?>  <a href="{{url('/')}}" class="text-decoration-none text-white fw-bold" target="bank">TRANSPORTE Y SERVICIOS PANCHITO</a> - Todos los derechos Reservados - <small class="text-white">version 1.0 <small class="d-block d-md-none">Desarrollado por <a href="https://cuanticagroup.com" target="_bank" class="text-decoration-none text-white">CUANTICA Group</a></small></small></span>
                </div>
                
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    
    

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
    @yield('js')
    @stack('scripts')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script>
        AOS.init();
    </script>
    <script>
        var swiper = new Swiper(".productos-slider", {
        //   slidesPerView: 1,
        loop:true,
        spaceBetween: 20,
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
            slidesPerView: 1,
            //   spaceBetween: 20,
            },
            600: {
            slidesPerView: 2,
            //   spaceBetween: 40,
            },
            1024: {
            slidesPerView: 3,
            //  spaceBetween: 50,
            },
            1200: {
            slidesPerView: 3,
            //  spaceBetween: 50,
            },
        },
        });
    </script>
    <script>
        var swiper = new Swiper(".clientes-slider", {
        //   slidesPerView: 1,
        loop:true,
        spaceBetween: 20,
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
            1200: {
            slidesPerView: 5,
            //  spaceBetween: 50,
            },
        },
        });
    </script>
</body>
</html>