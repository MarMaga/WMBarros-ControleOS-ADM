<div class="modal fade" id="alterarSetor">
    <div class="modal-dialog">
        <div class="modal-content bg-warning">
            <div class="modal-header">
                <h4 class="modal-title">Alterar tipo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <label>Setor</label>
                <input name="id_setor_alterar" id="id_setor_alterar" type="hidden">
                <input class="form-control obg" name="setor_alterar" id="setor_alterar" style="width: 100%">
                <input name="setor_original_alterar" id="setor_original_alterar" style="width: 100%" type="hidden">
            </div>
            <div class="modal-footer justify-content-between">
                <button name="btn_cancelar" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="AlterarSetorAJAX()" name="btn_alterar" id="btn_alterar"
                    class="btn btn-outline-dark">Gravar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->