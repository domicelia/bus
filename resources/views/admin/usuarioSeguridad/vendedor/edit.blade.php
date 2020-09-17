<div class="modal fade" id="modal-editar1-1" style="display: none;" aria-hidden="true">
    <form method="POST" action="index.php?controlador=FormularioDenuncia&action=editar" accept-charset="UTF-8" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h4 class="modal-title">Tipo Denuncia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    <!-- <input type="hidden" value="" id="id" name="id">
                    <input type="hidden" value="" id="nameDocument" name="nameDocument"> -->
                    <div class="form-group">
                        <label>Introduce el Nombre Denunciante:</label>
                        <input type="text" class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="prueba" name="nombreDenunciante" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Introduce el Ci Denunciante:</label>
                            <input type=number class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="prueba" name="ciDenunciante" required>
                        </div>
                        <div class="col-sm-6">
                            <label>Introduce el Contacto Denunciante:</label>
                            <input type="number" class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="prueba" name="contactoDenunciante" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 15px">Introduce el Nombre Acusado:</label>
                        <input type="text" class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="prueba" name="nombreAcusado" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Introduce el Ci Acusado:</label>
                            <input type="number" class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="prueba" name="ciAcusado" required>
                        </div>
                        <div class="col-sm-6">
                            <label>Introduce el Contacto Acusado:</label>
                            <input type="number" class="form-control" placeholder="Maximo 255 Letras" maxlength="255" value="prueba"  name="contactoAcusado" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 15px">Nota de Denuncia que deseea Realizar:</label>
                        <textarea class="form-control" name="nota" placeholder="Maximo 1024 Letras" maxlength="1024" required>preuba</textarea>
                    </div>
                    <div class="form-group">
                        <label class="">Documento:</label>

                    </div>
                    <div class="form-group">
                        <input type="file" accept=".pdf" name="documento">
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