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

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            /* height: 100%; */
            object-fit: cover;
        }

        .swiper {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .mySwiper2 {
            height: auto;
            width: 100%;
        }

        .mySwiper {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .mySwiper .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

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
            <div class="pt-2 pt-md-0" data-aos="fade-right"
            data-aos-duration="1000" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{url('agregados')}}">Agregados</a></li>
                    <li class="breadcrumb-item" aria-current="page">Arena Fina</li>
                </ol>
            </div>  

            <div class="row">
                <div class="col-12 col-md-5">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/images/arena__fina.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/images/arena__fina__2.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/images/arena__fina__3.jpeg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/images/arena__fina__4.jpg" />
                            </div>
                        </div>
                        <div class="swiper-button-next nav__btn"></div>
                        <div class="swiper-button-prev nav__btn"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/images/arena__fina.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/images/arena__fina__2.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/images/arena__fina__3.jpeg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/images/arena__fina__4.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <p class="text-primary fw-bold small text-uppercase fs-2">Arena Fina</p>
                    <p class="text-muted fw-light" align="justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum corporis vel, alias, labore iusto facere itaque unde sunt blanditiis sint mollitia ab officiis corrupti numquam optio porro nam reprehenderit aliquid!</p>
                    <p class="fw-light">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, necessitatibus et. Rem, suscipit ut distinctio voluptates tempora itaque illo, ex placeat deleniti quis laudantium dolor mollitia accusamus porro maiores consectetur.
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi sint odio, nihil ad nesciunt dolorum debitis autem fugit expedita numquam facilis illo sed pariatur ab quibusdam voluptate voluptatem? Laborum, odio!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam illo qui id fugiat quos repellat, quisquam, corrupti omnis obcaecati veniam et, quibusdam eos est repellendus. Ab nostrum iste odio commodi!

                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, molestias saepe! Ducimus quam impedit, fugit molestias magnam a laborum. Adipisci cum nesciunt vitae minima eum error odit impedit repudiandae veniam!
                    </p>
                </div>
                <div class="col-12 col-md-2">
                    <p class="small text-muted text-uppercase fw-bold mt-2">Te puede interesar</p>
                        <!-- @foreach ($servicios as $servicio) -->
                            <a class="text-decoration-none" href="">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="text-center">
                                    <img src="/images/arena__fina.jpg" class="img-fluid rounded-top" alt="">
                                </div>
                                <div class="card-body">
                                    <p class="mb-0 small text-center text-uppercase fw-bold text-secondary">Arena Gruesa</p>
                                    <p class="parrafo_3 fw-light text-dark" align="justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi nostrum exercitationem corrupti eum nesciunt omnis illum saepe nobis illo doloribus amet maiores minus perferendis animi distinctio earum qui, tenetur accusamus.</p>
                                </div>
                            </div></a>
                        <!-- @endforeach -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
        });
    </script>
@endsection