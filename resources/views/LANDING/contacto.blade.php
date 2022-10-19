@extends('TEMPLATE.landing')

@section('title', 'CONTACTO')

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
            <h1 class="text-uppercase fw-bold display-3 text-white fst-italic">CONTACTO</h1>
            <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde sequi libero dolore, sed itaque.</p>
        </div>
    </div>

    <section class="w-100" style="min-height: 450px;">
        <div class="container py-5">
            <h1 class="text-primary fw-bold text-center text-uppercase">Escríbenos un mensaje</h1>
            <p class="fw-light fs-5 text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias impedit ipsum aliquam at minus sapiente autem. Ducimus, eos iure quos est, explicabo quaerat ipsam laboriosam non necessitatibus quidem, ipsa ex!</p>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-5">
                    <form class="form-group" method="POST" action="contacto/store" autocomplete="off">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name_lastname_id" class="form-label">Nombres y Apellidos</label>
                            <input type="text" id="name_lastname_id" value="" name="name_lastname" class="form-control form-control-sm">
                            
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email_id" class="form-label">Correo eletrónico</label>
                                    <input type="email" id="email_id" value="" name="email" class="form-control form-control-sm">
                                    
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="celular_id" class="form-label">Nro de celular</label>
                                    <input type="number" id="celular_id" value="" name="celular" class="form-control form-control-sm">
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="asunto_id" class="form-label">Asunto</label>
                            <input type="text" id="asunto_id" name="asunto" value="" class="form-control form-control-sm">
                            
                        </div>
                        <div class="form-group mb-3">
                            <label for="mensaje_id" class="form-label">Mensaje</label>
                            <textarea class="form-control" name="mensaje" id="mensaje_id" rows="4"></textarea>
                            
                        </div>
                        <div class="text-center d-grid">
                            <button type="submit" class="btn btn-primary text-white text-uppercase fw-bold text-center">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-6 col-lg-7">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d285.33805083984333!2d-70.94578001902148!3d-17.198556448809814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9fc05d3a372082b1!2zMTfCsDExJzU0LjkiUyA3MMKwNTYnNDQuNyJX!5e0!3m2!1ses!2spe!4v1666145541350!5m2!1ses!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<!--sweet alert actualizar-->
    @if(session('addcorreo') == 'ok')
    <script>
        Swal.fire({
        icon: 'success',
        confirmButtonColor: '#2533AD',
        title: '¡Éxito!',
        text: 'Correo enviado correctamente',
        })
    </script>
    @endif
    @if(session('update') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#1C3146',
            title: '¡Actualizado!',
            text: 'Registro actualizado correctamente',
            })
        </script>
    @endif

    <!--sweet alert eliminar-->
    @if(session('delete') == 'ok')
        <script>
        Swal.fire({
            icon: 'success',
            confirmButtonColor: '#1C3146',
            title: '¡Eliminado!',
            text: 'Registro eliminado correctamente',
            })
        </script>
    @endif
    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1C3146',
            cancelButtonColor: '#FF9C00',
            confirmButtonText: '¡Sí, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                
            this.submit();
            }
            })

        });
    </script>
@endsection