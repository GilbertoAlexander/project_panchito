<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URB. LAS PALMERAS | INICIAR SESIÓN</title>
    <link rel="stylesheet" href="/css/panchito_web.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="icon" href="/images/LOGO-MIN.png">
</head>
<style>
    .img-1{
        background-image: url(/images/carousel-1.jpg);
        background-size: cover;
        background-position: center;
        min-height: 100vh;
    }

    .img-2{
        background-image: url(/images/carousel-2.jpg);
        background-size: cover;
        background-position: center;
        min-height: 100vh;
    }
</style>
<body class="">   
     <section>
         <div class="row g-0">
            <div class="col-12 col-md-5 col-lg-4 vh-100 d-flex">
                <div class="card border-0 bg-transparent align-self-center">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="/images/LOGO_PRINCIPAL.png" class="img-fluid px-3 px-lg-4 px-xl-5" alt="">
                        </div>
                        <div class="py-4 text-center">
                            <h3 class="fw-bold">Iniciar Sesión</h3>
                            <span class="fw-light text-center">Por favor inicie sesión en su cuenta</span>         
                        </div>
                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf
                            <div class="pb-3">
                                <label for="email_id" class="form-label">Correo Electronico</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                  
                            </div>
                            <div class="pb-3">
                                <label for="password_id" class="form-label">Contraseña</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="pb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="exampleCheck1">Recordar</label>
                            </div>
        
                            <div class="pb-3">
                                <span><a href="#">Olvidé mi contraseña</a></span>
                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="w-100 btn btn-primary">Iniciar Sesion</button>
                            </div>
                        </form>
                        <div class="pt-3 pb-2 text-center">
                            <small>Copyright © <?php echo date("Y");?>  <a href="{{url('/')}}" class="text-decoration-none text-secondary fw-bold">PANCHITO</a> - Todos los derechos reservados</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-8 d-none d-md-block">
                <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item img-1 active">
                            <!-- <img src="/images/1.jpg" class="d-block w-100" alt="..."> -->
                            {{-- <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div> --}}
                        </div>
                      <div class="carousel-item img-2">
                            <!-- <img src="/images/1.jpg" class="d-block w-100" alt="..."> -->
                            {{-- <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div> --}}
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>            
        </div>
     </section>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
