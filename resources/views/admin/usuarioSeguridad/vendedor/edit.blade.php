<div class="modal fade" id="editar-{{$i}}" style="display: none;" aria-hidden="true">
<form method="POST" action="{{url('vendedor/editar')}}" accept-charset="UTF-8" enctype="multipart/form-data">
               {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h4 class="modal-title">Tipo Denuncia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" value="{{$listaVendedor->GetObj($i)->getId()}}"  name="idVendedor">
                    <input type="hidden" value="{{$listaVendedor->GetObj($i)->getPersona()->getId()}}"  name="idPersona">
                    <input type="hidden" value="{{$listaVendedor->GetObj($i)->getPersona()->getUser()->getId()}}"  name="idUser">
                    
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="{{$listaVendedor->GetObj($i)->getPersona()->getNombre()}}" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label>Apellido:</label>
                        <input type="text" class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="{{$listaVendedor->GetObj($i)->getPersona()->getApellido()}}" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label>Genero:</label>
                        <select class="form-control" name="genero">
                            @if ($listaVendedor->GetObj($i)->getPersona()->getGenero()=="masculino")
                            <option value="masculino" selected>Masculino</option>
                            <option value="femenino">Femenino</option>
                            @else
                            <option value="masculino">Masculino</option>
                            <option value="femenino" selected>Femenino</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Seleccionar Departamento:</label>
                        <select class="form-control" name="departamento">
                            @if ($listaVendedor->GetObj($i)->getDepartamento()=="CBBA")
                            <option value="SC" >Santa Cruz</option>
                            <option value="CBBA" selected>Cochabamba</option>
                            @else
                            <option value="SC" selected>Santa Cruz</option>
                            <option value="CBBA" >Cochabamba</option>
                            @endif

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" placeholder="Maximo 255 Letras" value="{{$listaVendedor->GetObj($i)->getPersona()->getFechaNacimiento()}}" name="fechaNacimiento" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label>Introducir Contacto:</label>
                        <input type="number" class="form-control" placeholder="Maximo 255 Letras" value="{{$listaVendedor->GetObj($i)->getPersona()->getContacto()}}" name="contacto" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label>Correo:</label>
                        <input type="email" class="form-control" placeholder="Maximo 255 Letras" value="{{$listaVendedor->GetObj($i)->getPersona()->getUser()->getEmail()}}" name="correo" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label>Contraseña:</label>
                        <input type="password" class="form-control" placeholder="Maximo 255 Letras" name="password" maxlength="255" required>
                    </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Guardar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </form>
    <!-- /.modal-dialog -->
</div>