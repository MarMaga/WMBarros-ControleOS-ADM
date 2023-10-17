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
        let identificacao = $("#identificacao").val().toUpperCase();
        let descricao = $("#descricao").val().toUpperCase();

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

function FiltrarEquipamentosPorSetor(idSetor) {

    if (idSetor == '') {

        $("#divResultado").hide();

    } else {

        $("#divResultado").show();

        $.ajax({
            beforeSend: function () {
                Load();
            },
            type: 'post',
            url: BASE_URL_DATAVIEW('equipamentoDV'),
            data: {
                filtrar_equipamentos_por_setor: 'ajx',
                idSetor: idSetor
            },
            success: function (equipamentos) {
                $("#tableResult").html(equipamentos);
            },
            complete: function () {
                RemoverLoad();
            }
        })
    }
}

function Excluir() {
    let equipamentoID = $("#id_excluir").val();
    // desalocar = '' quando o registro deve ser excluído
    // desalocar = DESALOCAR quando o equipamento deve ser desalocado do setor
    let desaloc = $("#desalocar").val();

    if (desaloc == '')
        desaloc = 'ajx';

    $.ajax({
        beforeSend: function () {
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('equipamentoDV'),
        data: {
            btn_excluir: desaloc,
            equipamentoID: equipamentoID
        },
        success: function (ret) {
            MostrarMensagem(ret);

            if (desaloc == 'DESALOCAR') {

                ConsultarSetoresComEquipamentos();
                $("#divResultado").hide();

            } else {

                FiltrarEquipamentos();
            }

            $("#modalExcluir").modal("hide");
        },
        complete: function () {
            RemoverLoad();
        }
    })
}

function InativarEquipamento(formID) {

    if (NotificarCampos(formID)) {

        $.ajax({
            beforeSend: function () {
                Load();
            },
            type: 'post',
            url: BASE_URL_DATAVIEW('equipamentoDV'),
            data: {
                btn_inativar: 'ajx',
                dataInativar: $("#dataInativar").val(),
                motivoInativar: $("#motivoInativar").val(),
                equipamentoID: $("#id_inativar").val()
            },
            success: function (ret) {
                MostrarMensagem(ret);
                FiltrarEquipamentos();
                FecharModal("#modalInativar");
            },
            complete: function () {
                RemoverLoad();
            }
        })
    }
}

function AtivarEquipamento() {

    $.ajax({
        beforeSend: function () {
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('equipamentoDV'),
        data: {
            btn_ativar: 'ajx',
            equipamentoID: $("#id_ativar").val()
        },
        success: function (ret) {
            MostrarMensagem(ret);
            FiltrarEquipamentos();
            $("#modalAtivar").modal("hide");
        },
        complete: function () {
            RemoverLoad();
        }
    })
}

function ListarEquipamentos() {

    $.ajax({
        beforeSend: function () {
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('EquipamentoDV'),
        data: {
            selecionar_equipamentos_nao_alocados: 'ajx',
        },
        success: function (equipamentos) {
            console.log(equipamentos);
            $("#equipamento").html(equipamentos);
        },
        complete: function () {
            RemoverLoad();
        }
    })
}

function AlocarEquipamento(formID) {

    if (NotificarCampos(formID)) {

        let eqID = $("#equipamento").val();
        let setorID = $("#idSetor").val();

        $.ajax({
            beforeSend: function () {
                Load();
            },
            type: 'post',
            url: BASE_URL_DATAVIEW('EquipamentoDV'),
            data: {
                alocar_equipamento: 'ajx',
                equipamentoID: eqID,
                setorID: setorID,
            },
            success: function (ret) {
                MostrarMensagem(ret);
                ListarEquipamentos();
                LimparNotificacoes();
            },
            complete: function () {
                RemoverLoad();
            }
        })
    }
}