<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    Confirmação de
                    exclusão</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <input name="id_excluir" id="id_excluir" type="hidden" />
                Deseja excluir o registro: <b>
                    <label name="nome_excluir" id="nome_excluir"></label>
                </b> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="Excluir()" class="btn btn-primary" name="btn_excluir"
                    onclick="">Sim</button>
            </div>
        </div>
    </div>
</div>