<div class="modal fade" id="editequipo{{$admin_equipo->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Actualizacion de datos</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            {{-- contenido --}}
            <form class="form-group" method="POST" action="/admin-equipo/{{$admin_equipo->slug}}" enctype="multipart/form-data" autocomplete="off">      
                @csrf
                @method('put')
                <div class="row">
                    <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                    <div class="col-12 col-md-6">
                        <div class="pb-3">
                            <label for="" class="form-label">Foto</label>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="card text-center imagecard rounded mb-0" style="width: 160px; height: 160px">  
                                    <label for="uploadImage{{$admin_equipo->id}}" class="">
                                        <img for="uploadImage{{$admin_equipo->id}}" id="uploadPreview{{$admin_equipo->id}}" name="imagen" alt="" class=" rounded" width="100%" height="158" src="/images/equipos/{{$admin_equipo->imagen}}">   
                                    </label>
                                </div>
                            </div>
                            
                            <input id="uploadImage{{$admin_equipo->id}}" type="file" name="imagen" id="previewImage2{{$admin_equipo->id}}" data-id="{{$admin_equipo->id}}" onchange="previewImage2({{$admin_equipo->id}});" hidden/>
                            @error('imagen')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="pb-3">
                            <label for="titulo_id" class="form-label">Nombre<span class="text-danger">*</span></label>
                            <input type="text" name="name" id="titulo_id" value="{{$admin_equipo->name}}" class="form-control form-control-sm" maxLength="100">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>  
                        <div class="pb-3">
                            <label for="titulo_id" class="form-label">Cargo<span class="text-danger">*</span></label>
                            <input type="text" name="cargo" id="titulo_id" value="{{$admin_equipo->cargo}}" class="form-control form-control-sm" maxLength="100">
                            @error('cargo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="row pb-3 justify-content-center">
                            <button type="submit" class="btn btn-primary w-50 my-2 my-md-0 text-white">Actualizar</button>
                        </div> 
                    </div>                       
                </div>
            </form>
            {{-- fin contenido --}}
      </div>
    </div>
  </div>
</div>
@section('fotoedit')
    <script>
        var nb = $('#uploadImage').data("id");
        function previewImage2(nb) {
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
        reader.onload = function (e) {             
            document.getElementById('uploadPreview'+nb).src = e.target.result;         
        };     
        }
    </script>
@endsection