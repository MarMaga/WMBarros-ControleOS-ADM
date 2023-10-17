// carrega o modal Excluir padrozinado
function CarregarExcluir(ID, nome){
    $("#id_excluir").val(ID);
    $("#nome_excluir").html(nome);
}

function CarregarExcluirDesalocar(ID, nome){
    $("#id_excluir").val(ID);
    $("#nome_excluir").html(nome);
    $("#desalocar").val('DESALOCAR');
}

function CarregarAlocacao(eqID, setorID, novoSetorID, eq){
    $("#equipamento_id").val(eqID);
    $("#setor_id").val(setorID);
    $("#novo_setor_id").val($("#" + novoSetorID).val());
    $("#nome_alocar").html(eq);
}

function CarregarInativar(ID, nome){
    $("#id_inativar").val(ID);
    $("#nome_inativar").html(nome);
}

function CarregarAtivar(ID, nome){
    $("#id_ativar").val(ID);
    $("#nome_ativar").html(nome);
}

function CarregarDadosInativo(equipamento, data, motivo){
    $("#equipamento").text(equipamento);
    $("#data").text(data);
    $("#motivo").text(motivo);
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

// SETOR
function ModalAlterarSetor(ID,nome){
    $("#id_setor_alterar").val(ID);
    $("#setor_alterar").val(nome);
    $("#setor_original_alterar").val(nome);
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
