<div class="modal fade" id="visualizar-{{$i}}" . style="display: none;" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content bg-primary">
         <div class="modal-header">
            <h4 class="modal-title">Tipo Denuncia</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">
            <div class="form-group">
               <label>Nombre:</label>
               <input type="text" class="form-control" disabled="" placeholder="Maximo 255 Letras" maxlength="255" value="{{$listaVendedor->GetObj($i)->getPersona()->getNombre()}}" name="nombre" required>
            </div>
            <div class="form-group">
               <label>Apellido:</label>
               <input type="text" class="form-control" disabled="" placeholder="Maximo 255 Letras" maxlength="255" value="{{$listaVendedor->GetObj($i)->getPersona()->getApellido()}}" name="apellido" required>
            </div>
            <div class="form-group">
               <label>Genero:</label>
               <input type="text" class="form-control" disabled="" placeholder="Maximo 255 Letras" maxlength="255" value="{{$listaVendedor->GetObj($i)->getPersona()->getGenero()}}" name="genero" required>
            </div>
            <div class="form-group">
               <label>Departamento:</label>
               <input type="text" class="form-control" disabled="" placeholder="Maximo 255 Letras" maxlength="255" value="{{$listaVendedor->GetObj($i)->getDepartamento()}}" name="departamento" required>
            </div>
            <div class="form-group">
               <label>Fecha de Nacimiento:</label>
               <input type="text" class="form-control" disabled="" placeholder="Maximo 255 Letras" maxlength="255" value="{{$listaVendedor->GetObj($i)->getPersona()->getFechaNacimiento()}}" name="fechaNacimiento" required>
            </div>
            <div class="form-group">
               <label>Contacto:</label>
               <input type="text" class="form-control" disabled="" placeholder="Maximo 255 Letras" maxlength="255" value="{{$listaVendedor->GetObj($i)->getPersona()->getContacto()}}" name="contacto" required>
            </div>
            <div class="form-group">
               <label>Correo:</label>
               <input type="email" class="form-control" disabled="" placeholder="Maximo 255 Letras" maxlength="255" value="{{$listaVendedor->GetObj($i)->getPersona()->getUser()->getEmail()}}" name="correo" required>
            </div>

         </div>
         <div class="modal-footer right-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal" style="padding-right: 15px; padding-left: 15px">Ok</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>