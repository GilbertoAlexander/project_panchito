<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRADOR</title>
    <link rel="stylesheet" href="/css/panchito_web.css">
    <link rel="stylesheet" href="/css/administrador.css">
    <link rel="stylesheet" href="/css/datatables/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/css/datatables/select.bootstrap5.min.css">
    <link rel="stylesheet" href="/css/datatables/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

</head>
<body class="bg-light">
    <!-- sidebar -->      
        <div class="offcanvas offcanvas-start bg-white shadow-sm sidebar-nav border-0" tabindex="-1" id="offcanvasmenu" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-body pb-2 p-0">
                <div class="navbar-white">
                    <ul class="navbar-nav">
                        <li>
                            <img src="/images/LOGO_PRINCIPAL.png" class="px-3 pt-2" style="width: 100%;" alt="">
                        </li>
                        <li class="mt-3">
                            <div class="px-2">
                                <div class="card border-0">
                                    <div class="row g-0">
                                      <div class="col-3">
                                        <img src="/images/{{Auth()->user()->imagen}}" class="img-fluid rounded-3 shadow" alt="...">
                                      </div>
                                      <div class="col-9 d-flex">
                                        <div class="card-body my-0 py-0 align-self-center">
                                          <p class="fw-bold small mb-0">{{Auth()->user()->name}}</p>
                                          <p class="small fw-bold text-uppercase mb-0"><small class="text-muted">{{Auth()->user()->cargo}}</small></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </li>

                        <div class="mt-3">
                            <li>
                                <div class="text-secondary small fw-bold text-uppercase px-3">principal</div>
                            </li>
                            <li class="mx-2 my-1">
                                <a href="{{url('admin-empresa')}}" class="nav-link px-3 {{ request()->is(['admin-empresa*'])? 'active-item' : null}} menu">
                                    <span class="fw-bold">
                                        <i class="bi bi-building me-2"></i>
                                    </span>
                                    <span>
                                        Empresa
                                    </span>
                                </a>
                            </li>
                            <li class="mx-2 my-1">
                                <a href="{{url('admin-equipo')}}" class="nav-link px-3 {{ request()->is(['admin-equipo*'])? 'active-item' : null}} menu">
                                    <span class="fw-bold">
                                        <i class="bi bi-people me-2"></i>
                                    </span>
                                    <span>
                                        Equipo
                                    </span>
                                </a>
                            </li>

                            <li class="mx-2 my-1">
                                <a href="{{url('admin-clientes')}}" class="nav-link px-3 {{ request()->is(['admin-clientes*'])? 'active-item' : null}} menu">
                                    <span class="fw-bold">
                                        <i class="bi bi-person-video2 me-2"></i>
                                    </span>
                                    <span>
                                        Clientes
                                    </span>
                                </a>
                            </li>

                            <li>
                                <div class="text-secondary small fw-bold text-uppercase px-3">Cotizaciones</div>
                            </li>

                            <li class="mx-2 my-1">
                                <a href="{{url('admin-servicios')}}" class="nav-link px-3 {{ request()->is(['admin-servicios*'])? 'active-item' : null}} menu">
                                    <span class="fw-bold">
                                        <i class="bi bi-boxes me-2"></i>
                                    </span>
                                    <span>
                                    Lista de Servicios
                                    </span>
                                </a>
                            </li>

                            <li class="mx-2 my-1">
                                <a href="{{url('admin-agregados')}}" class="nav-link px-3 {{ request()->is(['admin-agregados*'])? 'active-item' : null}} menu">
                                    <span class="fw-bold">
                                        <i class="bi bi-grid me-2"></i>
                                    </span>
                                    <span>
                                        Lista de Agregados
                                    </span>
                                </a>
                            </li>
                                
                            <li class="mx-2 my-1">
                                <a href="{{url('admin-interesados')}}" class="nav-link px-3 {{ request()->is(['admin-interesados*'])? 'active-item' : null}} menu">
                                    <span class="fw-bold">
                                        <i class="bi bi-person-lines-fill me-2"></i>
                                    </span>
                                    <span>
                                        Interesados
                                    </span>
                                </a>
                            </li>

                            <li class="mx-2 my-1">
                                <a href="{{url('admin-cotizaciones-servicios')}}" class="nav-link px-3 {{ request()->is(['admin-cotizaciones-servicios*'])? 'active-item' : null}} menu">
                                    <span class="fw-bold">
                                        <i class="bi bi-clipboard-check me-2"></i>
                                    </span>
                                    <span>
                                        C. de servicios
                                    </span>
                                </a>
                            </li>

                            <li class="mx-2 my-1">
                                <a href="{{url('admin-cotizaciones-agregados')}}" class="nav-link px-3 {{ request()->is(['admin-cotizaciones-agregados*'])? 'active-item' : null}} menu">
                                    <span class="fw-bold">
                                        <i class="bi bi-folder-check me-2"></i>
                                    </span>
                                    <span>
                                        C. de agregados
                                    </span>
                                </a>
                            </li>

                            <li>
                                <div class="text-secondary small fw-bold text-uppercase px-3">Otros</div>
                            </li>
                                <li class="mx-2 my-1">
                                    <a href="{{url('admin-correos')}}" class="nav-link px-3 {{ request()->is(['admin-correos*'])? 'active-item' : null}} menu">
                                        <span class="fw-bold">
                                            <i class="bi bi-mailbox me-2"></i>
                                        </span>
                                        <span>
                                            Buzón de correo
                                        </span>
                                    </a>
                                </li>
                        </div> 
                    </ul>
                </div>
            </div>
        </div>
    <!-- fin sidebar -->
    
    <!-- contenido -->
    <main>
        <!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-2">
                <div class="container-fluid mt-1">
                    <button class="navbar-toggler navbar-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasmenu" aria-controls="offcanvasmenu">
                        <span class="navbar-toggler-icon text-white"></span>
                    </button>

                    <div class="ms-auto d-flex">
                        <div class="dropdown">
                            <button class="btn btn-primary rounded rounded-circle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="dropdownMenuButton2" style="width: 285px; font-size: 15px;">
                              <li>
                                <p class="text-center mb-1">
                                    <img src="/images/{{Auth()->user()->imagen}}" class="rounded-circle shadow" style="width: 100px; height: 100px;" alt="">
                                </p>
                                <p class="text-center mb-0 fw-bold">{{Auth()->user()->name}}</p>
                                <p class="text-center text-muted">{{Auth()->user()->email}}</p>
                              </li>
                              <li><hr class="dropdown-divider"></li>
                                <li >
                                    <a class="dropdown-item py-2 mt-2 menu" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                </li>
                              
                            </ul>
                        </div>
                    </div> 
                </div>
            </nav>
        <!-- fin navbar -->

        <!-- principal -->
            <div class="container-fluid" style="min-height: 650px;">
                @yield('content')
            </div>
        <!-- fin principal -->

        <!-- Contenido Principal -->
        <!-- Fin contenido principal -->

        <!-- footer  -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="text-end pt-3">
                    <p>Copyright © <?php echo date("Y");?> <a href="{{url('/')}}" style="text-decoration: none;" class="text-secondary fw-bold" target="_blank">Transporte y Servicios PANCHITO</a> - Todos los derechos Reservados</p>
                </div>
            </div>
        </footer>
        <!-- fin footer -->
    </main>
    <!-- fin contenido -->
        
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
    <script src="/js/datatables/jquery.dataTables.min.js"></script>
    <script src="/js/datatables/dataTables.bootstrap5.min.js"></script>
    <script src="/js/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="/js/datatables/dataTables.responsive.min.js"></script>
    @yield('js')
    @stack('scripts')
    <script>
        var nav = document.querySelector('nav');
        window.addEventListener('scroll', function(){
            if(window.pageYOffset > 30){
                nav.classList.add('bg-light', 'shadow-sm');
            }else{
                nav.classList.remove('bg-light', 'shadow-sm');
            }
        });
    </script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            $('table.display').DataTable( {
                responsive: true,
                fixedHeader: true,
                order: [[0, "desc"]],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontró nada, lo siento",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate":{
                        "next": "&raquo;",
                        "previous": "&laquo;"
                    } 
                }
            } );
        // new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
</body>
</html>