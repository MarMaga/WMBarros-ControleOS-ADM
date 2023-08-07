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
        MostrarMensagem(-2);
        return false;
    }
}

function ModalExcluirTipoEquipamento(ID,nome){
    $("#id_tipo_excluir").val(ID);
    document.getElementById('tipo_excluir').innerHTML = nome;
}