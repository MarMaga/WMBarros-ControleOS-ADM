// TIPO DE EQUIPAMENTO
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

function ModalExcluirModeloEquipamento(ID,nome){
    $("#id_modelo_excluir").val(ID);
    document.getElementById('modelo_excluir').innerHTML = nome;
}

// MODELO DE EQUIPAMENTO
function ModalAlterarModeloEquipamento(ID,nome){
    $("#id_modelo_alterar").val(ID);
    $("#model_alterar").val(nome);
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

function ModalExcluirModeloEquipamento(ID,nome){
    $("#id_modelo_excluir").val(ID);
    document.getElementById('modelo_excluir').innerHTML = nome;
}