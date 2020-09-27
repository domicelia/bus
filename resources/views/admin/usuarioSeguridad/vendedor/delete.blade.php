<div class="modal fade" id="eliminar-{{$i}}" style="display: none;" aria-hidden="true">
  <form method="POST" action="{{url('vendedor/eliminar')}}" accept-charset="UTF-8" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <!-- ides -->
        <input type="hidden" value="{{$listaVendedor->GetObj($i)->getId()}}" name="idVendedor">
        <input type="hidden" value="{{$listaVendedor->GetObj($i)->getPersona()->getId()}}" name="idPersona">
        <input type="hidden" value="{{$listaVendedor->GetObj($i)->getPersona()->getUser()->getId()}}" name="idUser">

        <div class="modal-header">
          <h4 class="modal-title">Eliminar Tipo Denuncia</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Esta seguro de eliminar el Tipo de Denuncia</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-outline-light">Confirmar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
  </form>
  <!-- /.modal-dialog -->
</div>