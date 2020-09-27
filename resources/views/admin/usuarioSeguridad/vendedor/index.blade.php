@extends('admin.layout')

@section('content')

<!-- Content Waper -->

<div class="content-wrapper">

  <div class="row">

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
        <h1 class="m-0 text-dark">Voluntarios</h1>
      </div><!-- /.col -->

    </div><!-- /.row -->

    <div class="col-sm-12">
      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">Vendedor</h3>
        </div>
        <div class="card-body">
        <form method="POST" action="{{url('vendedor/registrar')}}" accept-charset="UTF-8" enctype="multipart/form-data">
               {{ csrf_field() }}
            <div class="row">

              <div class="col-sm-6">

                <div class="form-group">
                  <label>Nombre:</label>
                  <input type="text" class="form-control" placeholder="Maximo 255 Letras" name="nombre" maxlength="255" required>
                </div>

                <div class="form-group">
                  <label>Genero:</label>
                  <select class="form-control" name="genero">
                    <option value="masculino" selected>Masculino</option>
                    <option value="femenino">Femenino</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Seleccionar Departamento:</label>
                  <select class="form-control" name="departamento">
                    <option value="SC" selected>Santa Cruz</option>
                    <option value="CBBA">Cochabamba</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Correo:</label>
                  <input type="email" class="form-control" placeholder="Maximo 255 Letras" name="correo" maxlength="255" required>
                </div>

              </div>

              <div class="col-sm-6">

                <div class="form-group">
                  <label>Apellido:</label>
                  <input type="text" class="form-control" placeholder="Maximo 255 Letras" name="apellido" maxlength="255" required>
                </div>

                <div class="form-group">
                  <label>Fecha de Nacimiento:</label>
                  <input type="date" class="form-control" placeholder="Maximo 255 Letras" name="fechaNacimiento" maxlength="255" required>
                </div>
                <div class="form-group">
                  <label>Introducir Contacto:</label>
                  <input type="number" class="form-control" placeholder="Maximo 255 Letras" name="contacto" maxlength="255" required>
                </div>
                <div class="form-group">
                  <label>Contraseña:</label>
                  <input type="password" class="form-control" placeholder="Maximo 255 Letras" name="password" maxlength="255" required>
                </div>

                <button type="submit" class="btn btn-primary" style="float: right; margin-top: 10px">Agregar</button>

              </div>

            </div>
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
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Departamento</th>
                      <th>Correo</th>
                      <th>Detalle</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $cont = $listaVendedor->Size();
                    ?>
                    @for ($i = 0; $i < $listaVendedor->Size(); $i++)

                      <tr>
                        <td>
                          {{$cont}}
                        </td>
                        <td>
                          {{$listaVendedor->GetObj($i)->getPersona()->getNombre()}}
                        </td>
                        <td>
                          {{$listaVendedor->GetObj($i)->getPersona()->getApellido()}}
                        </td>
                        <td>
                          {{$listaVendedor->GetObj($i)->getDepartamento()}}
                        </td>
                        <td>
                          {{$listaVendedor->GetObj($i)->getPersona()->getUser()->getEmail()}}
                        </td>
                        <td class="td-actions ">
                          <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target="#visualizar-{{$i}}">
                            <i class="nav-icon fas fa-eye"></i>
                          </button>
                        </td>
                        <td class="td-actions ">
                          <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#editar-{{$i}}">
                            <i class="nav-icon fas fa-pen"></i>
                          </button>
                        </td>
                        <td class="td-actions ">
                          <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#eliminar-{{$i}}">
                            <i class="nav-icon fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                      @include('admin.usuarioSeguridad.vendedor.show')
                      @include('admin.usuarioSeguridad.vendedor.edit')
                      @include('admin.usuarioSeguridad.vendedor.delete')

                      <?php $cont--; ?>
                      @endfor
                  </tbody>
                </table>

              </div>

            </div>
          </div>

          <!-- Fin Main content -->

        </div>

      </div>
    </div>




  </div>
  <!-- /.content-header -->



  <!--Fin Content Waper -->
</div>



@endsection