<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Eliminar Pagina</h4>
      </div>

      <div class="modal-body">

        Desea eliminar la pagina: <strong><span id="nombre"></span></strong> ?
        
      </div>

      <div class="modal-footer">
        <form action="" method="POST" id="form-delete">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            @csrf
            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>

        </form>

      </div>
    </div>
  </div>
</div>