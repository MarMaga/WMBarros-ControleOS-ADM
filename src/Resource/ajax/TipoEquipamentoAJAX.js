function CadastrarTipoEquipamento(formID)
{
    if(NotificarCampos(formID)){

        let nome = $("#tipo").val();

        $.ajax({
            type: "post",
            url: BASE_URL_DATAVIEW('TipoEquipamentoDV'),
            data: {
                tipo: nome,
                btn_cadastrar: 'ajx'
            },
            success: function(ret){
                MostrarMensagem(ret);
                ConsultarTipo();
                LimparNotificacoes(formID);
            }
        })
    }
}

function ConsultarTipo(){

    $.ajax({
        type: "post",
        url: BASE_URL_DATAVIEW('TipoEquipamentoDV'),
        data: {
            consultar_tipo: 'ajx'
        },
        success: function(dados){
            $("#tableResult").html(dados);
        }
    })
}