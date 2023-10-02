<div class="modal fade" id="modalInativar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    Confirmação de
                    inativação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="formInativarEq" action="inativar_equipamento.php" method="post">
                <div class="modal-body">
                    <input name="id_inativar" id="id_inativar" type="hidden" />
                        <strong><a>Equipamento:</a></strong>
                        <br>
                        <b><label class="text-info" name="nome_inativarr" id="nome_inativar"></label></b>
                    <div class="form-group">
                        <strong><a>Data da inativação:</a></strong>
                        <input name="dataInativar" id="dataInativar" type="date" class="form-control data obg"
                            data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="">
                    </div>
                    <div class="form-group">
                        <strong><a>Motivo da inativação:</a></strong>
                        <textarea maxlength="100" name="motivoInativar" id="motivoInativar" class="form-control obg"
                            rows="3" style="text-transform: uppercase" placeholder="Digite o motivo ..."></textarea>
                    </div>
                    <div class="formgroup">
                        <strong>Confirma a inativação do equipamento?</strong><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="InativarEquipamento('formInativarEq')" class="btn btn-primary"
                        name="btn_inativar" onclick="">Sim</button>
                </div>
            </form>
        </div>
    </div>
</div>