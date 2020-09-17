@extends('admin.layout')

@section('content')

<!-- Content Waper -->

<div class="content-wrapper">

  <div class="row" style="margin: 20px">

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
        <h1 class="m-0 text-dark">Formulario de Denuncia</h1>
      </div><!-- /.col -->

    </div><!-- /.row -->

  </div>
  <!-- /.content-header -->



  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">

        <form method="POST" action="index.php?controlador=FormularioDenuncia&action=registrar" accept-charset="UTF-8" enctype="multipart/form-data">
          <p class="card-text">


            <div class="form-group text-center pt-2">
              <h5><b>Crear Nuevo Formulario de Denuncia</b></h5>
            </div>
            <div class="form-group">
              <label>Introduce el Nombre Denunciante:</label>
              <input type="text" class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="" name="nombreDenunciante" required>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label>Introduce el Ci Denunciante:</label>
                <input type="number" class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="" name="ciDenunciante" required>
              </div>
              <div class="col-sm-6">
                <label>Introduce el Contacto Denunciante:</label>
                <input type="number" class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="" name="contactoDenunciante" required>
              </div>
            </div>
            <div class="form-group">
              <label style="margin-top: 15px">Introduce el Nombre Acusado:</label>
              <input type="text" class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="" name="nombreAcusado" required>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label>Introduce el Ci Acusado:</label>
                <input type="number" class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="" name="ciAcusado" required>
              </div>
              <div class="col-sm-6">
                <label>Introduce el Contacto Acusado:</label>
                <input type="number" class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="" name="contactoAcusado" required>
              </div>
            </div>
            <div class="form-group">
              <label style="margin-top: 15px">Nota de Denuncia que deseea Realizar:</label>
              <textarea class="form-control" name="nota" placeholder="Maximo 1024 Letras" maxlength="1024" required></textarea>
            </div>
            <div class="form-group">
              <label class="">Documento:</label>

            </div>
            <div class="form-group">
              <input type="file" accept=".pdf" name="documento">
            </div>





            <div class="form-group" style="float:right">
              <button type="submit" class="btn btn-success">Crear</button>
              <!-- <button type="button" class="btn btn-secondary" >Cancelar</button>-->
            </div>
          </p>

        </form>
      </div>

    </div>
  </div>






  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">


        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">


            <div class="form-group text-center pt-2">
              <h5><b>Lista de Tipos de Denuncias</b></h5>
            </div>

            <div class="card-body table-responsive ">

              <table id="example" class="table table-bordered" style="width: 100%">
                <thead>
                  <tr>
                    <!-- <th style="width: 10px">Nro.</th>-->
                    <th>Nro</th>
                    <th>Denunciante</th>
                    <th>Acusado</th>
                    <th>Estado</th>
                    <th style="width: 220px">Accion</th>
                  </tr>
                </thead>
                <tbody>


                  <tr>

                    <td>prueba</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>

                      <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#modal-info1-1" style="margin-right: 10px; padding-right: 15px; padding-left: 15px">
                        <i class="fas fa-eye"></i><br>ver
                      </button>
                      <button type="button" class="btn bg-gradient-info btn-sm" data-toggle="modal" data-target="#modal-editar1-1" style="margin-right: 10px; padding-right: 15px; padding-left: 15px">
                        <i class="fas fa-edit"></i><br>Editar
                      </button>
                      <button type="button" class="btn bg-gradient-danger btn-sm" data-toggle="modal" data-target="#modal-delete1-1" style="padding-right: 15px; padding-left: 15px">
                        <i class="fas fa-trash"></i><br>Eliminar
                      </button>

                    </td>
                  </tr>
                  @include('admin.usuarioSeguridad.vendedor.show')
                  @include('admin.usuarioSeguridad.vendedor.edit')
                  @include('admin.usuarioSeguridad.vendedor.delete')


                </tbody>
              </table>

            </div>

          </div>
        </div>

        <!-- Fin Main content -->

      </div>

    </div>
  </div>

  <!--Fin Content Waper -->
</div>



@endsection