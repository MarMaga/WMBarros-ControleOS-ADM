// carrega o modal Excluir padrozinado
function CarregarExcluir(ID, nome){
    $("#id_excluir").val(ID);
    $("#nome_excluir").html(nome);
}

// TIPO DE EQUIPAMENTO
function ModalAlterarTipoEquipamento(ID,nome){
    $("#id_tipo_alterar").val(ID);
    $("#tipo_alterar").val(nome);
    $("#tipo_original_alterar").val(nome);
}

// MODELO DE EQUIPAMENTO
function ModalAlterarModeloEquipamento(ID,nome){
    $("#id_modelo_alterar").val(ID);
    $("#modelo_alterar").val(nome);
    $("#modelo_original_alterar").val(nome);
}

function GravarAlteracaoModeloEquipamento(){
    if(!NotificarCampos('formAlt')){
        return false;
    }

    if($("#modelo_alterar").val() == $("#modelo_original_alterar").val()){
        MostrarMensagem(-2);
        return false;
    }
}
