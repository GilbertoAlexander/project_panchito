<!DOCTYPE html>
<html lang="en">
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
    
    
    {{-- Contenido --}}
    <!-- Primer Contenido -->
    <section class="w-100 d-flex justify-content-center align-items-center pt-5" style="min-height: 550px;">
        <div class="container py-3" >
                    <div class="text-start mb-3">
                        <input type="button" class="btn btn-secondary text-white px-5" value="Volver" onClick="history.go(-1);"> 
                    </div> 
                    <div class="card border-4 borde-top-primary h-100 shadow-sm py-2">
                        <div class="card-body">
                            <h1 class="text-center fw-bold text-primary pb-3">Política de Cookies</h1>
                            <hr>
                            
                            <h3 class="fw-bold text-secondary pt-5">Política de cookies</h3>
                            <p class="fw-light fs-5">{{$empresa->razonsocial}} informa acerca del uso de las cookies en su página web: <a href="http://www.rentalyserviciospanchito.com/"></a>http://www.rentalyserviciospanchito.com/</p>
            
                            <h3 class="fw-bold text-secondary pt-5">¿Qué son las cookies?</h3>
                            <p class="fw-light fs-5">Las cookies son archivos que se pueden descargar en su equipo a través de las páginas web. Son herramientas que tienen un papel esencial para la prestación de numerosos servicios de la sociedad de la información. Entre otros, permiten a una página web almacenar y recuperar información sobre los hábitos de navegación de un usuario o de su equipo y, dependiendo de la información obtenida, se pueden utilizar para reconocer al usuario y mejorar el servicio ofrecido.</p>
            
                            <h3 class="fw-bold text-secondary pt-5">Tipos de cookies</h3>
                            <p class="fw-light fs-5">Según quien sea la entidad que gestione el dominio desde donde se envían las cookies y trate los datos que se obtengan se pueden distinguir dos tipos:</p>
            
                            <ul>
                                <li class="fw-light fs-5"><span class="fw-bold">Cookies propias: </span>aquéllas que se envían al equipo terminal del usuario desde un equipo o dominio gestionado por el propio editor y desde el que se presta el servicio solicitado por el usuario.</li>
                                <li class="fw-light fs-5"><span class="fw-bold">Cookies de terceros: </span>aquéllas que se envían al equipo terminal del usuario desde un equipo o dominio que no es gestionado por el editor, sino por otra entidad que trata los datos obtenidos través de las cookies.</li>
                            </ul>
            
                            <p class="fw-light fs-5">En el caso de que las cookies sean instaladas desde un equipo o dominio gestionado por el propio editor pero la información que se recoja mediante éstas sea gestionada por un tercero, no pueden ser consideradas como cookies propias.</p>
                            <p class="fw-light fs-5">Existe también una segunda clasificación según el plazo de tiempo que permanecen almacenadas en el navegador del cliente, pudiendo tratarse de:</p>
            
                            <ul>
                                <li class="fw-light fs-5"><span class="fw-bold">Cookies de sesión: </span>diseñadas para recabar y almacenar datos mientras el usuario accede a una página web. Se suelen emplear para almacenar información que solo interesa conservar para la prestación del servicio solicitado por el usuario en una sola ocasión (p.e. una lista de productos adquiridos).</li>
                                <li class="fw-light fs-5"><span class="fw-bold">Cookies persistentes: </span>Los datos siguen almacenados en el terminal y pueden ser accedidos y tratados durante un periodo definido por el responsable de la cookie, y que puede ir de unos minutos a varios años.</li>
                            </ul>
                            
                            <p class="fw-light fs-5">Por último, existe otra clasificación con cinco tipos de cookies según la finalidad para la que se traten los datos obtenidos:</p>
            
                            <ul>
                                <li class="fw-light fs-5"><span class="fw-bold">Cookies técnicas: </span>Aquellas que permiten al usuario la navegación a través de una página web, plataforma o aplicación y la utilización de las diferentes opciones o servicios que en ella existan como, por ejemplo, controlar el tráfico y la comunicación de datos, identificar la sesión, acceder a partes de acceso restringido, recordar los elementos que integran un pedido, realizar el proceso de compra de un pedido, realizar la solicitud de inscripción o participación en un evento, utilizar elementos de seguridad durante la navegación, almacenar contenidos para la difusión de vídeos o sonido o compartir contenidos a través de redes sociales.</li>
                                <li class="fw-light fs-5"><span class="fw-bold">Cookies de personalización: </span>Permiten al usuario acceder al servicio con algunas características de carácter general predefinidas en función de una serie de criterios en el terminal del usuario como por ejemplo serian el idioma, el tipo de navegador a través del cual accede al servicio, la configuración regional desde donde accede al servicio, etc.</li>
                                <li class="fw-light fs-5"><span class="fw-bold">Cookies de análisis: </span>Permiten al responsable de las mismas, el seguimiento y análisis del comportamiento de los usuarios de los sitios web a los que están vinculadas. La información recogida mediante este tipo de cookies se utiliza en la medición de la actividad de los sitios web, aplicación o plataforma y para la elaboración de perfiles de navegación de los usuarios de dichos sitios, aplicaciones y plataformas, con el fin de introducir mejoras en función del análisis de los datos de uso que hacen los usuarios del servicio.</li>
                                <li class="fw-light fs-5"><span class="fw-bold">Cookies publicitarias: </span>Permiten la gestión, de la forma más eficaz posible, de los espacios publicitarios.</li>
                                <li class="fw-light fs-5"><span class="fw-bold">Cookies de publicidad comportamental: </span>Almacenan información del comportamiento de los usuarios obtenida a través de la observación continuada de sus hábitos de navegación, lo que permite desarrollar un perfil específico para mostrar publicidad en función del mismo.</li>
                                <li class="fw-light fs-5"><span class="fw-bold">Cookies de redes sociales externas: </span>Se utilizan para que los visitantes puedan interactuar con el contenido de diferentes plataformas sociales (facebook, youtube, twitter, linkedIn, etc..) y que se generen únicamente para los usuarios de dichas redes sociales. Las condiciones de utilización de estas cookies y la información recopilada se regula por la política de privacidad de la plataforma social correspondiente.</li>
                            </ul>
            
                            <h3 class="fw-bold text-secondary pt-5">Desactivación y eliminación de cookies</h3>
                            <p class="fw-light fs-5">Tienes la opción de permitir, bloquear o eliminar las cookies instaladas en tu equipo mediante la configuración de las opciones del navegador instalado en su equipo. Al desactivar cookies, algunos de los servicios disponibles podrían dejar de estar operativos. La forma de deshabilitar las cookies es diferente para cada navegador, pero normalmente puede hacerse desde el menú Herramientas u Opciones. También puede consultarse el menú de Ayuda del navegador dónde puedes encontrar instrucciones. El usuario podrá en cualquier momento elegir qué cookies quiere que funcionen en este sitio web.</p>
                            <p class="fw-light fs-5">Puede usted permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuración de las opciones del navegador instalado en su ordenador:</p>
            
                            <ul>
                                <li class="fw-light fs-5">Microsoft Internet Explorer o Microsoft Edge: http://windows.microsoft.com/es-es/windows-vista/Block-or-allow-cookies</li>
                                <li class="fw-light fs-5">Mozilla Firefox: http://support.mozilla.org/es/kb/impedir-que-los-sitios-web-guarden-sus-preferencia</li>
                                <li class="fw-light fs-5">Chrome: https://support.google.com/accounts/answer/61416?hl=es</li>
                                <li class="fw-light fs-5">Safari: http://safari.helpmax.net/es/privacidad-y-seguridad/como-gestionar-las-cookies/</li>
                                <li class="fw-light fs-5">Opera: http://help.opera.com/Linux/10.60/es-ES/cookies.html</li>
            
                                <p class="fw-light fs-5">Además, también puede gestionar el almacén de cookies en su navegador a través de herramientas como las siguientes:</p>
            
                                <li class="fw-light fs-5">Ghostery: www.ghostery.com/</li>
                                <li class="fw-light fs-5">Your online choices: www.youronlinechoices.com/es/</li>
                            </ul>
            
                            <h3 class="fw-bold text-secondary pt-5">Cookies utilizadas</h3>
                            <p class="fw-light fs-5">Cookies utilizadas en <a href="http://www.rentalyserviciospanchito.com/">http://www.rentalyserviciospanchito.com/</a> a continuación se identifican las cookies que están siendo utilizadas en este portal así como su tipología y función:</p>
                                <ul>
                                    <li class="fw-light fs-5"><span class="fw-bold">Cookies de análisis: </span>Son aquéllas que bien tratadas por nosotros o por terceros, nos permiten cuantificar el número de usuarios y así realizar la medición y análisis estadístico de la utilización que hacen los usuarios del servicio ofertado. Para ello se analiza su navegación en nuestra página web con el fin de mejorar la oferta de productos o servicios que le ofrecemos.</li>
                                    <li class="fw-light fs-5"><span class="fw-bold">Cookies de personalización: </span>Son aquellas que permiten al usuario acceder al servicio con algunas características de carácter general predefinidas en función de una serie de criterios en el terminal del usuario como por ejemplo serian el idioma o el tipo de navegador a través del cual se conecta al servicio.</li>
                                </ul>
            
                            <h3 class="fw-bold text-secondary pt-5">Aceptación de la Política de cookies</h3>
                            <p class="fw-light fs-5"><a href="http://www.rentalyserviciospanchito.com/">http://www.rentalyserviciospanchito.com/</a> asume que usted acepta el uso de cookies. No obstante, muestra información sobre su Política de cookies en la parte inferior de cualquier página del portal con cada inicio de sesión con el objeto de que usted sea consciente.</p>
                            <p class="fw-light fs-5">Ante esta información es posible llevar a cabo las siguientes acciones:</p>
            
                            <ul>
                                <li class="fw-light fs-5">Aceptar cookies. No se volverá a visualizar este aviso al acceder a cualquier página del portal durante la presente sesión.</li>
                                <li class="fw-light fs-5">Cerrar. Se oculta el aviso en la presente página.</li>
                                <li class="fw-light fs-5">Modificar su configuración. Podrá obtener más información sobre qué son las cookies, conocer la Política de cookies del Sitio Web y modificar la configuración de su navegación. Pero esto no evitará que se muestre el aviso sobre cookies al acceder a nuevas páginas del portal.</li>
                            </ul>
            
                        </div>
                    </div>
                </div>
            </section>
        <!-- End Primer COntenido -->
    {{-- Fin contenido --}}

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
</body>
</html>