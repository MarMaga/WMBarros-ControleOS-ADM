function CadastrarTipoEquipamento(formID) {
    if (NotificarCampos(formID)) {

        let nome = $("#tipo").val();

        $.ajax({
            type: "post",
            url: BASE_URL_DATAVIEW('TipoEquipamentoDV'),
            data: {
                tipo: nome,
                btn_cadastrar: 'ajx'
            },
            success: function (ret) {
                MostrarMensagem(ret);
                ConsultarTipo();
                LimparNotificacoes(formID);
            }
        })
    }
}

function ConsultarTipo() {

    $.ajax({
        type: "post",
        url: BASE_URL_DATAVIEW('TipoEquipamentoDV'),
        data: {
            consultar_tipo: 'ajx'
        },
        success: function (tipos) {
            if (tipos == 'NADA') {
                $("#barraTituloFiltro").addClass("bg-warning").removeClass("bg-info").removeClass("bg-success").removeClass("bg-danger");
                $("#tituloFiltro").html("Nenhum tipo cadastrado");
                $("#pesquisa").hide();
                $("#AltereOuExclua").hide();
                $("#tableResult").hide();
            } else {
                $("#filtroTipo").val('');
                $("#barraTituloFiltro").addClass("bg-info").removeClass("bg-warning").removeClass("bg-success").removeClass("bg-danger");
                $("#tituloFiltro").html("Tipos cadastrados");
                $("#pesquisa").show();
                $("#AltereOuExclua").show();
                $("#tableResult").show();
                $("#tableResult").html(tipos);
            }
        }
    })
}

function TabelaFiltrada() {

    let filtro = $("#filtroTipo").val();

    $.ajax({
        type: "post",
        url: BASE_URL_DATAVIEW('TipoEquipamentoDV'),
        data: {
            btn_filtrar: 'ajx',
            filtroTipo: filtro
        },
        success: function (tipos) {
            if (filtro == '') {
                ConsultarTipo();
            } else if (tipos == 'NADA') {
                $("#barraTituloFiltro").addClass("bg-danger").removeClass("bg-warning").removeClass("bg-success").removeClass("bg-info");
                $("#tituloFiltro").html("A pesquisa não retornou resultados");
                $("#pesquisa").show();
                $("#AltereOuExclua").hide();
                $("#tableResult").hide();
            } else {
                $("#barraTituloFiltro").addClass("bg-success").removeClass("bg-warning").removeClass("bg-danger").removeClass("bg-info");
                $("#tituloFiltro").html("Tipos filtrados");
                $("#pesquisa").show();
                $("#AltereOuExclua").show();
                $("#tableResult").show();
                $("#tableResult").html(tipos);
            }
        }
    })
}

function AlterarTipoEquipamento(formID) {

    if (NotificarCampos(formID)) {
        let id = $("#id_tipo_alterar").val();
        let tipo = $("#tipo_alterar").val();
        let tipo_original = $("#tipo_original_alterar").val();

        $.ajax({
            type: 'post',
            url: BASE_URL_DATAVIEW('TipoEquipamentoDV'),
            data: {
                btn_alterar: 'ajx',
                id_tipo_alterar: id,
                tipo_alterar: tipo,
                tipo_original_alterar: tipo_original
            },
            success: function (ret) {
                MostrarMensagem(ret);
                if (ret == -2) {
                    $("#tipo_alterar").focus();
                } else {
                    LimparNotificacoes(formID);
                    ConsultarTipo();
                    $("#alterarTipo").modal("hide");
                }
            }
        })
    }
}

function Excluir() {

    let id = $("#id_excluir").val();

    $.ajax({
        type: 'post',
        url: BASE_URL_DATAVIEW('TipoEquipamentoDV'),
        data: {
            btn_excluir: 'ajx',
            id_excluir: id
        },
        success: function (ret) {
            MostrarMensagem(ret);
            ConsultarTipo();
            $("#modalExcluir").modal("hide");
        }
    })
}

function Filtrar() {

    Maiuscula('filtroTipo');

    let filtro = $('#filtroTipo').val();

    $.ajax({
        type: 'post',
        url: BASE_URL_DATAVIEW('TipoEquipamentoDV'),
        data: {
            btn_filtrar: 'ajx',
            filtroTipo: filtro
        },
        success: function (filtroAtivado, tipos) {
            if (filtroAtivado == false) {
                ConsultarTipo();
            } else {
                TabelaFiltrada();
            }
            //alert(tipos.length);
            //if(tipos.length == 0){
            //$("#barraTituloFiltro").addclass("bg-danger");
            //$("#tituloFiltro").val('A pesquisa retornou vazia');
            //} elseif(tipos.length > 0){
            //$("#barraTituloFiltro").addclass("bg-success");
            //$("#tituloFiltro").val('Tipos filtrados');
            //}
        }
    })
}