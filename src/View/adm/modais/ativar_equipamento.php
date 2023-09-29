<div class="modal fade" id="modalAtivar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    Confirmação de
                    ativação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <input name="id_ativar" id="id_ativar" type="hidden" />
                <strong>Confirma a ativação do equipamento abaixo?</strong>
                <b><label class="text-info" name="nome_ativar" id="nome_ativar"></label></b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="AtivarEquipamento()" class="btn btn-primary" name="btn_ativar"
                    onclick="">Sim</button>
            </div>
        </div>
    </div>
</div>