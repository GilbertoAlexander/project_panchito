<div class="modal fade" id="view_email{{$admin_correo->slug}}"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-start">
                <p>
                    {{$admin_correo->fecha}}
                </p>
                <div class="py-1">
                    <label for="name_id" class="form-label fw-bold">Remitente</label>
                    <p>
                        {{$admin_correo->name_lastname}}
                    </p>
                </div>

                <div class="py-1">
                    <label for="" class="form-label fw-bold">Mensaje</label>
                    <p>
                        {{$admin_correo->mensaje}}
                    </p>
                </div>    
                <div class="py-1">
                    <label for="" class="form-label fw-bold">Responder a través de:</label>
                    <br>
                    <a href="https://api.whatsapp.com/send?phone={{$admin_correo->celular}}&text=Hola%20{{$admin_correo->name_lastname}},%20te%20saluda%20{{ Auth::user()->name }}%20de%20Getex.%20Recibimos%20tu%20mensaje%20y%20quisiera%20brindarte%20información." class="btn bg-whatsapp text-white" target="_blank"><i class="bi bi-whatsapp me-2"></i>Whatsapp</a>
                    <a href="mailto:{{$admin_correo->email}}" target="_blank" class="btn bg-dark text-white"><i class="bi bi-envelope me-2"></i>Correo electrónico</a>
                </div>                           
                <div class="text-center pt-4">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button> 
                </div>  
            </div>
        </div>
    </div>
</div>