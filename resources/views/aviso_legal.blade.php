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
            <section class="w-100 pt-5" style="min-height: 550px;">
                <div class="container py-3" >
                    <div class="text-start mb-3">
                        <input type="button" class="btn btn-secondary text-white px-5" value="Volver" onClick="history.go(-1);"> 
                    </div> 
                    <div class="card border-4 borde-top-primary h-100 shadow-sm py-2">
                        <div class="card-body">
                            <h1 class="text-center fw-bold text-primary pb-3">Aviso Legal</h1>
                            <hr>
                            <h2 class="fw-bold text-secondary py-3">Identificación y Titularidad</h2>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <span class="fw-bold fs-5">Titular:</span>
                                </div>
                                <div class="col-12 col-md-9">
                                    <span class="fw-light fs-5">{{$empresa->razonsocial}}</span>
                                </div>
                                <div class="col-12 col-md-3">
                                    <span class="fw-bold fs-5">Domicilio:</span>
                                </div>
                                <div class="col-12 col-md-9">
                                    <span class="fw-light fs-5">{{$empresa->direccion}}</span>
                                </div>
                            
                                <div class="col-12 col-md-3">
                                    <span class="fw-bold fs-5">Correo electrónico:</span>
                                </div>
                                <div class="col-12 col-md-9">
                                    <span class="fw-light fs-5">{{$empresa->email}}</span>
                                </div>
                        
                                <div class="col-12 col-md-3">
                                    <span class="fw-bold fs-5">Sitio Web:</span>
                                </div>
                                <div class="col-12 col-md-9">
                                    <span class="fw-light fs-5"><a href="http://www.rentalyserviciospanchito.com/">http://www.rentalyserviciospanchito.com</a></span>
                                </div>
                            </div>
        
                            <h2 class="fw-bold text-secondary pt-5">Finalidad</h2>
                            <p class="fw-light fs-5">La finalidad del sitio Web <a href="http://www.rentalyserviciospanchito.com">http://www.rentalyserviciospanchito.com</a> es brindar una notaría moderna con el compromiso de satisfacer sus necesidades como empresa y/o como persona natural para lo cual contamos con personal altamente calificado, con lo último en tecnología de sistemas y de comunicaciones, y un software especialmente diseñado para la función notarial.</p>
                                
                            <h2 class="fw-bold text-secondary pt-5">Condiciones de Uso</h2>
                            <p class="fw-light fs-5">La utilización del sitio Web le otorga la condición de Usuario, e implica la aceptación completa de todas las cláusulas y condiciones de uso incluidas en las páginas:</p>
                            <ul>
                                <li class="fw-bold fs-5">Aviso Legal</li>
                                <li class="fw-bold fs-5">Política de Privacidad</li>
                                <li class="fw-bold fs-5">Política de Cookies</li>
                            </ul>
                            <p class="fw-light fs-5">Si no estuviera conforme con todas y cada una de estas cláusulas y condiciones absténgase de utilizar este sitio Web.</p>
                            <p class="fw-light fs-5">El acceso a este sitio Web no supone, en modo alguno, el inicio de una relación comercial con el Titular.</p>
                            <p class="fw-light fs-5">A través de este sitio Web, el Titular le facilita el acceso y la utilización de diversos contenidos que el Titular o sus colaboradores han publicadon por medio de Internet.</p>
                            <p class="fw-light fs-5">A tal efecto, usted está obligado y comprometido a NO utilizar cualquiera de los contenidos del sitio Web con fines o efectos ilícitos, prohibidos en este Aviso Legal o por la legislación vigente, lesivos de los derechos e intereses de terceros, o que de cualquier forma puedan dañar, inutilizar, sobrecargar, deteriorar o impedir la normal utilización de los contenidos, los equipos informáticos o los documentos, archivos y toda clase de contenidos almacenados en cualquier equipo informático propios o contratados por el Titular, de otros usuarios o de cualquier usuario de Internet.</p>
                            
                            <h2 class="fw-bold text-secondary pt-5">Comentarios</h2>
                            <p class="fw-light fs-5">El Titular se reserva el derecho de retirar todos aquellos comentarios que vulneren la legislación vigente, lesivos de los derechos o intereses de terceros, o que, a su juicio, no resulten adecuados para su publicación.</p>
                            <p class="fw-light fs-5">El Titular no será responsable de las opiniones vertidas por los usuarios a través del sistema de comentarios, redes sociales u otras herramientas de participación, conforme a lo previsto en la normativa de aplicación.</p>
        
                            <h2 class="fw-bold text-secondary pt-5">Medidas de seguridad</h2>
                            <p class="fw-light fs-5">Los datos personales que facilite al Titular pueden ser almacenados en bases de datos automatizadas o no, cuya titularidad corresponde en exclusiva a el Titular, que asume todas las medidas de índole técnica, organizativa y de seguridad que garantizan la confidencialidad, integridad y calidad de la información contenida en las mismas de acuerdo con lo establecido en la normativa vigente en protección de datos.</p>
                            <p class="fw-light fs-5">No obstante, debe ser consciente de que las medidas de seguridad de los sistemas informáticos en Internet no son enteramente fiables y que, por tanto el Titular no puede garantizar la inexistencia de virus u otros elementos que puedan producir alteraciones en los sistemas informáticos (software y hardware) del Usuario o en sus documentos electrónicos y ficheros contenidos en los mismos aunque el Titular pone todos los medios necesarios y toma las medidas de seguridad oportunas para evitar la presencia de estos elementos dañinos.</p>
        
                            <h2 class="fw-bold text-secondary pt-5">Datos personales</h2>
                            <p class="fw-light fs-5">Usted puede consultar toda la información relativa al tratamiento de datos personales que recoge el Titular en la página de la Política de Privacidad.</p>
                            
                            <h2 class="fw-bold text-secondary pt-5">Contenidos</h2>
                            <p class="fw-light fs-5">El Titular ha obtenido la información, el contenido multimedia y los materiales incluidos en el sitio Web de fuentes que considera fiables, pero, si bien ha tomado todas las medidas razonables para asegurar que la información contenida es correcta, el Titular no garantiza que sea exacta, completa o actualizada. El Titular declina expresamente cualquier responsabilidad por error u omisión en la información contenida en las páginas de este sitio Web.</p>
                            <p class="fw-light fs-5">Queda prohibido transmitir o enviar a través del sitio Web cualquier contenido ilegal o ilícito, virus informáticos, o mensajes que, en general, afecten o violen derechos de el Titular o de terceros.</p>
                            <p class="fw-light fs-5">Los contenidos del Sitio Web tienen únicamente una finalidad informativa y bajo ninguna circunstancia deben usarse ni considerarse como oferta de venta, solicitud de una oferta de compra ni recomendación para realizar cualquier otra operación, salvo que así se indique expresamente.</p>
                            <p class="fw-light fs-5">El Titular se reserva el derecho a modificar, suspender, cancelar o restringir el contenido del Sitio Web, los vínculos o la información obtenida a través del sitio Web, sin necesidad de previo aviso.</p>
                            <p class="fw-light fs-5">El Titular no es responsable de los daños y perjuicios que pudieran derivarse de la utilización de la información del sitio Web o de la contenida en las redes sociales del Titular.</p>
        
                            <h2 class="fw-bold text-secondary pt-5">Política de cookies</h2>
                            <p class="fw-light fs-5">En la página Política de Cookies puede consultar toda la información relativa a la política de recogida y tratamiento de las cookies.</p>
                            <p class="fw-light fs-5">El Titular sólo obtiene y conserva la siguiente información acerca de los visitantes del Sitio Web:</p>
                            <ul>
                                <li class="fw-light fs-5">El nombre de dominio del proveedor (PSI) y/o dirección IP que les da acceso a la red.</li>
                                <li class="fw-light fs-5">La fecha y hora de acceso al sitio Web.</li>
                                <li class="fw-light fs-5">La dirección de Internet origen del enlace que dirige al sitio Web.</li>
                                <li class="fw-light fs-5">El número de visitantes diarios de cada sección.</li>
                                <li class="fw-light fs-5">La información obtenida es totalmente anónima, y en ningún caso puede ser asociada a un Usuario concreto e identificado.</li>
                            </ul>
        
                            <h2 class="fw-bold text-secondary pt-5">Enlaces de interés a otros sitios Web</h2>
                            <p class="fw-light fs-5">El Titular puede proporcionarle acceso a sitios Web de terceros mediante enlaces con la finalidad de informar sobre la existencia de otras fuentes de información en Internet en las que podrá ampliar los datos ofrecidos en el sitio Web.</p>
                            <p class="fw-light fs-5">Estos enlaces a otros sitios Web no suponen en ningún caso una sugerencia o recomendación para que usted visite las páginas web de destino, que están fuera del control del Titular, por lo que Titular no es responsable del contenido de los sitios web vinculados ni del resultado que obtenga al seguir los enlaces.</p>
                            <p class="fw-light fs-5">Asimismo, el Titular no responde de los links o enlaces ubicados en los sitios web vinculados a los que le proporciona acceso.</p>
                            <p class="fw-light fs-5">El establecimiento del enlace no implica en ningún caso la existencia de relaciones entre Titular y el propietario del sitio en el que se establezca el enlace, ni la aceptación o aprobación por parte del Titular de sus contenidos o servicios.</p>
                            <p class="fw-light fs-5">Si accede a un sitio Web externo desde un enlace que encuentre en el Sitio Web usted deberá leer la propia política de privacidad del otro sitio web que puede ser diferente de la de este sitio Web.</p>
        
                            <h2 class="fw-bold text-secondary pt-5">Enlaces de Afiliados y anuncios patrocinados (opcional)</h2>
                            <p class="fw-light fs-5">El sitio Web ofrece contenidos patrocinados, anuncios y/o enlaces de afiliados.</p>
                            <p class="fw-light fs-5">La información que aparece en estos enlaces de afiliados o los anuncios insertados, son facilitados por los propios anunciantes, por lo que Titular no se hace responsable de posibles inexactitudes o errores que pudieran contener los anuncios, ni garantiza en modo alguno la experiencia, integridad o responsabilidad de los anunciantes o la calidad de sus productos y/o servicios.</p>
        
                            <h2 class="fw-bold text-secondary pt-5">Propiedad intelectual e industrial</h2>
                            <p class="fw-light fs-5">Todos los derechos están reservados.</p>
                            <p class="fw-light fs-5">Todo acceso a este sitio Web está sujeto a las siguientes condiciones: La reproducción, almacenaje permanente y la difusión de los contenidos o cualquier otro uso que tenga finalidad pública o comercial queda expresamente prohibida sin el consentimiento previo expreso y por escrito de Titular.</p>
        
                            <h2 class="fw-bold text-secondary pt-5">Limitación de responsabilidad</h2>
                            <p class="fw-light fs-5">La información y servicios incluidos o disponibles a través de este sitio Web pueden incluir incorrecciones o errores tipográficos. De forma periódica el Titular incorpora mejoras y/o cambios a la información contenida y/o los Servicios que puede introducir en cualquier momento.</p>
                            <p class="fw-light fs-5">El Titular no declara ni garantiza que los servicios o contenidos sean interrumpidos o que estén libres de errores, que los defectos sean corregidos, o que el servicio o el servidor que lo pone a disposición estén libres de virus u otros componentes nocivos sin perjuicio de que el Titular realiza todos los esfuerzos en evitar este tipo de incidentes.</p>
                            <p class="fw-light fs-5">Titular declina cualquier responsabilidad en caso de que existan interrupciones o un mal funcionamiento de los Servicios o contenidos ofrecidos en Internet, cualquiera que sea su causa. Asimismo, el Titular no se hace responsable por caídas de la red, pérdidas de negocio a consecuencia de dichas caídas, suspensiones temporales de fluido eléctrico o cualquier otro tipo de daño indirecto que te pueda ser causado por causas ajenas a el Titular.</p>
                            <p class="fw-light fs-5">Antes de tomar decisiones y/o acciones con base a la información incluida en el sitio Web, el Titular le recomienda comprobar y contrastar la información recibida con otras fuentes.</p>
        
                            <h2 class="fw-bold text-secondary pt-5">Derecho de exclusión</h2>
                            <p class="fw-light fs-5">Titular se reserva el derecho a denegar o retirar el acceso al sitio Web y los servicios ofrecidos sin necesidad de preaviso, a instancia propia o de un tercero, a aquellos usuarios que incumplan cualquiera de las condiciones de este Aviso Legal.</p>
        
                            <h2 class="fw-bold text-secondary pt-5">Jurisdicción</h2>
                            <p class="fw-light fs-5">Este Aviso Legal se rige íntegramente por la legislación peruana.</p>
                            <p class="fw-light fs-5">Siempre que no haya una norma que obligue a otra cosa, para cuantas cuestiones se susciten sobre la interpretación, aplicación y cumplimiento de este Aviso Legal, así como de las reclamaciones que puedan derivarse de su uso, las partes acuerdan someterse a los Jueces y Tribunales de la provincia de LIMA, con renuncia expresa de cualquier otra jurisdicción que pudiera corresponderles.</p>
        
                            <h2 class="fw-bold text-secondary pt-5">Contacto</h2>
                            <p class="fw-light fs-5">En caso de que usted tenga cualquier duda acerca de estas Condiciones legales o quiera realizar cualquier comentario sobre este sitio Web, puede enviar un mensaje de correo electrónico a {{$empresa->email_empresa}}</p>
        
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