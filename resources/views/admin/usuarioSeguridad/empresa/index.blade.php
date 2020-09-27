@extends('admin.layout')

@section('content')

<!-- Content Waper -->

<div class="content-wrapper">

  <div class="row" >

    @if ($message = Session::get('success'))
    <div class="col-sm-12">
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
    </div>
    @endif

  </div>

  <!-- Content Header (Page header) -->
  <div class="content-header">

    <div class="row mb-2 ml-4">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Empresa</h1>
      </div><!-- /.col -->

    </div><!-- /.row -->

    <div class="col-sm-12">
      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">Datos de {{$empresa->getNombre()}}</h3>
        </div>
        <div class="card-body">
          <div class="row">

           
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-12 text-center" id="imgactualpropuesta">
                  <!-- AQUI FOTO -->
                  <img src="{{asset($empresa->getLogo())}}" class="card-img-top mt-2" alt="..." style="width: 60%; height: 80%;">
                </div>

                <div class="col-sm-12 text-center" id="imgnuevopropuesta" style="display: none;">
                  <div id="file-preview-zoneP">
                  </div>

                </div>
              </div>
              <form method="POST" action="{{url('empresa/editar')}}" accept-charset="UTF-8" enctype="multipart/form-data">
               {{ csrf_field() }}
                <div class="row" style="margin-bottom: 10px; margin-top: 10px">
                  <div class="col-sm-12 text-center">
                   
                    <span class="btn btn-info btn-file">
                      <label for="imageP">Subir Logo </label>
                      <i class="fas fa-camera"></i> <input type="file" class="form-control" id="imageP" name="logo" >
                    </span>
                  </div>
                </div>
            </div>

            <input type="hidden" value="{{$empresa->getId()}}" id="id" name="id">

            <div class="col-sm-6">
              <div class="form-group">
                <label>Direccion:</label>
                <input type="text" class="form-control" placeholder="Maximo 255 Letras" value="{{$empresa->getDireccion()}}" name="direccion" maxlength="255" required>
              </div>

              <div class="form-group" style="margin-top: 15px">
                <label style="margin-bottom: 15px">Slogan:</label>

                <textarea class="form-control" rows="2" placeholder="Maximo 1024 Letras" name="slogan" maxlength="1024" required>{{$empresa->getSlogan()}}</textarea>



              </div>

            </div>
          </div>
          <div class="row">

            <div class="col-sm-6">

              <div class="form-group" style="margin-top: 15px">
                <label style="margin-bottom: 15px">Mision:</label>

                <textarea class="form-control" rows="2" placeholder="Maximo 1024 Letras" name="mision" maxlength="1024" required>{{$empresa->getMision()}}</textarea>

              </div>

              <div class="form-group">
                <label>Contacto:</label>
                <input type="text" class="form-control" placeholder="Maximo 255 Letras" value="{{$empresa->getContacto()}}" name="contacto" maxlength="255" required>
              </div>


            </div>
            <div class="col-sm-6">


              <div class="form-group" style="margin-top: 15px">
                <label style="margin-bottom: 15px">Vision:</label>

                <textarea class="form-control" rows="2" placeholder="Maximo 1024 Letras" name="vision" maxlength="1024" required>{{$empresa->getVision()}}</textarea>


              </div>
              <div class="form-group">
                <label>Correo:</label>
                <input type="text" class="form-control" placeholder="Maximo 255 Letras" value="{{$empresa->getCorreo()}}" name="correo" maxlength="255" required>
              </div>


              <button type="submit" class="btn btn-primary" style="float: right; margin-top: 10px">Editar</button>


            </div>
          </div>
          </form>
        </div>
      </div>
    </div>

  

  </div>
  <!-- /.content-header -->


  <!--Fin Content Waper -->
</div>


<script>
             
             function updateImg() {
                 console.log(89)
                 
                 $('#editnoticia').hide();
                 $('#imgnoticia').show();
             }

             function oncloseimg() {
                 $('#editnoticia').show();
                 $('#imgnoticia').hide();
             }
           

         var fileUploadP = document.getElementById('imageP');
         fileUploadP.onchange = function (e) {
             readFileP(e.srcElement);
         }

         function readFileP(input) {
                 if (input.files && input.files[0]) {
                     var reader = new FileReader();
         
                     reader.onload = function (e) {
                         $('#file-preview-zoneP').html('');
                         var filePreview = document.createElement('img');
                         filePreview.id = 'file-previewP';
                         filePreview.style = 'width: 60%; height: 240px';
                         //e.target.result contents the base64 data from the image uploaded
                         filePreview.src = e.target.result;

                         $('#imgnuevopropuesta').show();
                         $('#imgactualpropuesta').hide();
         
                         var previewZone = document.getElementById('file-preview-zoneP');
                         previewZone.appendChild(filePreview);
                     }
         
                     reader.readAsDataURL(input.files[0]);
                 }
             }

          
         function resetearImgP() {
             $('#imgnuevonoticia').hide();
             $('#imgactualnoticia').show();
             $('#file').val('');
         }

         
         </script>   



@endsection