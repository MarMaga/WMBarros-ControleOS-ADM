<div class="modal fade" id="modalAloc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    Confirmação de
                    alteração da alocação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <input name="equipamento_id" id="equipamento_id" type="hidden" />
                <input name="setor_id" id="setor_id" type="hidden" />
                <input name="novo_setor_id" id="novo_setor_id" type="hidden" />
                <strong>Confirma a alteração da alocação do equipamento abaixo?</strong>
                <b><label class="text-info" name="nome_alocar" id="nome_alocar"></label></b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="InserirAlterarAlocacao()" class="btn btn-primary" name="btn_ativar"
                    onclick="">Sim</button>
            </div>
        </div>
    </div>
</div>