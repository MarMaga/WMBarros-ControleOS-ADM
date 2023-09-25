function CarregarTipos(){
    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('EquipamentoDV'),
        data: {
            consultar_tipo: 'ajx'
        },
        success: function(tipos){
            $("#tipo").html(tipos)
        },
        complete: function(){
            RemoverLoad();
        }
    })
}

function CarregarModelos(){
    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('EquipamentoDV'),
        data: {
            consultar_modelo: 'ajx'
        },
        success: function(modelos){
            $("#modelo").html(modelos)
        },
        complete: function(){
            RemoverLoad();
        }
    })
}

function GravarEquipamento(formID){

    if(NotificarCampos(formID)){
       
        let idEquipamento = $("#idEquipamento").val();
        let tipo = $("#tipo").val();
        let modelo = $("#modelo").val();
        let identificacao = $("#identificacao").val();
        let descricao = $("#descricao").val();

        $.ajax({
            beforeSend: function(){
                Load;
            },
            type: "post",
            url: BASE_URL_DATAVIEW("EquipamentoDV"),
            data:{
                id: idEquipamento,
                tipo: tipo,
                modelo: modelo,
                identificacao: identificacao,
                descricao: descricao,
                btn_gravar: $("#equipamentoID").val() == '' ? 'cadastrar' : 'alterar'
            },
            success: function(ret){
                MostrarMensagem(ret);
                if(ret == 1){
                    LimparNotificacoes(formID);
                }
                $("#tipo").focus();
            }
        })
    }
}

function FiltrarEquipamentos(){

    let idTipo = $("#tipo").val();
    let idModelo = $("#modelo").val();

    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('equipamentoDV'),
        data: {
            filtrar_equipamentos: 'ajx',
            tipo: idTipo,
            modelo: idModelo
        },
        success: function(dados){
            $("#tableResult").html(dados);
        },
        complete: function(){
            RemoverLoad();
        }
    })
}
