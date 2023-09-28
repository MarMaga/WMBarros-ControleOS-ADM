function CarregarTipos() {
    $.ajax({
        beforeSend: function () {
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('EquipamentoDV'),
        data: {
            consultar_tipo: 'ajx',
            tipo_id: $("#idTipo").val()
        },
        success: function (tipos) {
            $("#tipo").html(tipos)
        },
        complete: function () {
            RemoverLoad();
        }
    })
}

function CarregarModelos() {
    $.ajax({
        beforeSend: function () {
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('EquipamentoDV'),
        data: {
            consultar_modelo: 'ajx',
            modelo_id: $("#idModelo").val()
        },
        success: function (modelos) {
            $("#modelo").html(modelos)
        },
        complete: function () {
            RemoverLoad();
        }
    })
}

function GravarEquipamento(formID) {

    if (NotificarCampos(formID)) {

        let idEquipamento = $("#idEquipamento").val();
        let tipo = $("#tipo").val();
        let modelo = $("#modelo").val();
        let identificacao = $("#identificacao").val();
        let descricao = $("#descricao").val();

        $.ajax({
            beforeSend: function () {
                Load();
            },
            type: "post",
            url: BASE_URL_DATAVIEW("EquipamentoDV"),
            data: {
                id: idEquipamento,
                tipo: tipo,
                modelo: modelo,
                identificacao: identificacao,
                descricao: descricao,
                btn_gravar: $("#idEquipamento").val() == '' ? 'cadastrar' : 'alterar'
            },
            success: function (ret) {
                MostrarMensagem(ret);
                eqId = '';
                if (ret == 1) {
                    eqId = $("#idEquipamento").val();
                    LimparNotificacoes(formID);
                }
                if (eqId == '') {
                    $("#tipo").focus();
                } else {
                    window.location.href = "consultar_equipamento.php";
                }
            },
            complete: function () {
                RemoverLoad();
            }
        })
    }
}

function FiltrarEquipamentos() {

    let idTipo = $("#tipo").val();
    let idModelo = $("#modelo").val();

    $.ajax({
        beforeSend: function () {
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('equipamentoDV'),
        data: {
            filtrar_equipamentos: 'ajx',
            tipo: idTipo,
            modelo: idModelo
        },
        success: function (dados) {
            $("#tableResult").html(dados);
        },
        complete: function () {
            RemoverLoad();
        }
    })
}

function Excluir(){
    let equipamentoID = $("#id_excluir").val();

    $.ajax({
        beforeSend: function () {
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('equipamentoDV'),
        data: {
            btn_excluir: 'ajx',
            equipamentoID: equipamentoID
        },
        success: function(ret){
            MostrarMensagem(ret);
            FiltrarEquipamentos();
            $("#modalExcluir").modal("hide");
        },
        complete: function () {
            RemoverLoad();
        }
    })
}
