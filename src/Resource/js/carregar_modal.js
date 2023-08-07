function ModalAlterarTipoEquipamento(ID,nome){
    $("#id_tipo_alterar").val(ID);
    $("#tipo_alterar").val(nome);
    $("#tipo_original_alterar").val(nome);
}

function GravarAlteracaoTipoEquipamento(){
    if(!NotificarCampos('formAlt')){
        return false;
    }

    if($("#tipo_alterar").val() == $("#tipo_original_alterar").val()){
        return false;
    }
}