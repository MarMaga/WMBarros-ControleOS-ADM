function CadastrarModeloEquipamentoAJAX(formID) {

    if (NotificarCampos(formID)) {

        let nome = $("#modelo").val().toUpperCase();

        $.ajax({
            type: "post",
            url: BASE_URL_DATAVIEW('ModeloEquipamentoDV'),
            data: {
                modelo: nome,
                btn_cadastrar: 'ajx'
            },
            success: function (ret) {
                MostrarMensagem(ret);
                ConsultarModelo();
                LimparNotificacoes(formID);
                $("#modelo").focus();
            }
        })
    }
}

function ConsultarModelo() {

    $.ajax({
        type: "post",
        url: BASE_URL_DATAVIEW('ModeloEquipamentoDV'),
        data: {
            consultar_modelo: 'ajx'
        },
        success: function (modelos) {
            if (modelos == 'NADA') {
                $("#barraTituloFiltro").addClass("d-block").removeClass("d-none").addClass("bg-warning").removeClass("bg-info").removeClass("bg-success").removeClass("bg-danger");
                $("#tituloFiltro").html("Nenhum modelo cadastrado");
                $("#pesquisa").hide();
                $("#AltereOuExclua").addClass("d-none").removeClass("d-block");
                $("#tableResult").hide();
            } else {
                $("#filtroModelo").val('');
                $("#barraTituloFiltro").addClass("d-block").removeClass("d-none").addClass("bg-info").removeClass("bg-warning").removeClass("bg-success").removeClass("bg-danger");
                $("#tituloFiltro").html("Modelos cadastrados");
                $("#pesquisa").show();
                $("#AltereOuExclua").addClass("d-block").removeClass("d-none");
                $("#tableResult").show();
                $("#tableResult").html(modelos);
            }
        }
    })
}

function TabelaFiltrada() {

    let filtro = $("#filtroModelo").val();

    $.ajax({
        type: "post",
        url: BASE_URL_DATAVIEW('ModeloEquipamentoDV'),
        data: {
            btn_filtrar: 'ajx',
            filtroModelo: filtro
        },
        success: function (modelos) {
            if (filtro == '') {
                ConsultarModelo();
            } else if (modelos == 'NADA') {
                $("#barraTituloFiltro").addClass("bg-danger").removeClass("bg-warning").removeClass("bg-success").removeClass("bg-info");
                $("#tituloFiltro").html("A pesquisa não retornou resultados");
                $("#pesquisa").show();
                $("#AltereOuExclua").addClass("d-none").removeClass("d-block");
                $("#tableResult").hide();
            } else {
                $("#barraTituloFiltro").addClass("bg-success").removeClass("bg-warning").removeClass("bg-danger").removeClass("bg-info");
                $("#tituloFiltro").html("Modelos filtrados");
                $("#pesquisa").show();
                $("#AltereOuExclua").addClass("d-block").removeClass("d-none");
                $("#tableResult").show();
                $("#tableResult").html(modelos);
            }
        }
    })
}

function AlterarModeloEquipamentoAJAX(formID) {

    if (NotificarCampos(formID)) {
        let id = $("#id_modelo_alterar").val();
        let modelo = $("#modelo_alterar").val().toUpperCase();
        let modelo_original = $("#modelo_original_alterar").val();

        $.ajax({
            type: 'post',
            url: BASE_URL_DATAVIEW('ModeloEquipamentoDV'),
            data: {
                btn_alterar: 'ajx',
                id_modelo_alterar: id,
                modelo_alterar: modelo,
                modelo_original_alterar: modelo_original
            },
            success: function (ret) {
                MostrarMensagem(ret);
                if (ret == -2) {
                    $("#modelo_alterar").focus();
                } else {
                    LimparNotificacoes(formID);
                    ConsultarModelo();
                    $("#alterarModelo").modal("hide");
                }
            }
        })
    }
}

function Excluir() {

    let id = $("#id_excluir").val();

    $.ajax({
        type: 'post',
        url: BASE_URL_DATAVIEW('ModeloEquipamentoDV'),
        data: {
            btn_excluir: 'ajx',
            id_excluir: id
        },
        success: function (ret) {
            MostrarMensagem(ret);
            ConsultarModelo();
            $("#modalExcluir").modal("hide");
            $("#filtroModelo").val('');
        }
    })
}

function Filtrar() {

    let filtro = $('#filtroModelo').val();

    $.ajax({
        type: 'post',
        url: BASE_URL_DATAVIEW('ModeloEquipamentoDV'),
        data: {
            btn_filtrar: 'ajx',
            filtroModelo: filtro
        },
        success: function (filtroAtivado) {
            if (filtroAtivado == false) {
                ConsultarModelo();
            } else {
                TabelaFiltrada();
            }
        }
    })
}