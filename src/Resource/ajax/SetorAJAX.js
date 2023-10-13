function CadastrarSetorAJAX(formID) {

    if (NotificarCampos(formID)) {

        let nome = $("#setor").val().toUpperCase();

        $.ajax({
            beforeSend: function(){
                Load();
            },
            type: "post",
            url: BASE_URL_DATAVIEW('SetorDV'),
            data: {
                setor: nome,
                btn_cadastrar: 'ajx'
            },
            success: function (ret) {
                MostrarMensagem(ret);
                ConsultarSetor();
                LimparNotificacoes(formID);
                $("#setor").focus();
            },
            complete: function(){
                RemoverLoad();
            }
        })
    }
}

function ConsultarSetor() {

    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: "post",
        url: BASE_URL_DATAVIEW('SetorDV'),
        data: {
            consultar_setor: 'ajx'
        },
        success: function (setores) {
            if (setores == 'NADA') {
                $("#barraTituloFiltro").addClass("d-block").removeClass("d-none").addClass("bg-warning").removeClass("bg-info").removeClass("bg-success").removeClass("bg-danger");
                $("#tituloFiltro").html("Nenhum setor cadastrado");
                $("#pesquisa").hide();
                $("#AltereOuExclua").addClass("d-none").removeClass("d-block");
                $("#tableResult").hide();
            } else {
                $("#filtroTipo").val('');
                $("#barraTituloFiltro").addClass("d-block").removeClass("d-none").addClass("bg-info").removeClass("bg-warning").removeClass("bg-success").removeClass("bg-danger");
                $("#tituloFiltro").html("Setores cadastrados");
                $("#pesquisa").show();
                $("#AltereOuExclua").addClass("d-block").removeClass("d-none");
                $("#tableResult").show();
                $("#tableResult").html(setores);
            }
        },
        complete: function(){
            RemoverLoad();
        }
    })
}

function TabelaFiltrada() {

    let filtro = $("#filtroSetor").val();

    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: "post",
        url: BASE_URL_DATAVIEW('SetorDV'),
        data: {
            btn_filtrar: 'ajx',
            filtroSetor: filtro
        },
        success: function (setores) {
            if (filtro == '') {
                ConsultarSetor();
            } else if (setores == 'NADA') {
                $("#barraTituloFiltro").addClass("bg-danger").removeClass("bg-warning").removeClass("bg-success").removeClass("bg-info");
                $("#tituloFiltro").html("A pesquisa não retornou resultados");
                $("#pesquisa").show();
                $("#AltereOuExclua").addClass("d-none").removeClass("d-block");
                $("#tableResult").hide();
            } else {
                $("#barraTituloFiltro").addClass("bg-success").removeClass("bg-warning").removeClass("bg-danger").removeClass("bg-info");
                $("#tituloFiltro").html("Setores filtrados");
                $("#pesquisa").show();
                $("#AltereOuExclua").addClass("d-block").removeClass("d-none");
                $("#tableResult").show();
                $("#tableResult").html(setores);
            }
        },
        complete: function(){
            RemoverLoad();
        }
    })
}

function AlterarSetorAJAX(formID) {

    if (NotificarCampos(formID)) {
        let id = $("#id_setor_alterar").val();
        let setor = $("#setor_alterar").val().toUpperCase();
        let setor_original = $("#setor_original_alterar").val();

        $.ajax({
            beforeSend: function(){
                Load();
            },
            type: 'post',
            url: BASE_URL_DATAVIEW('SetorDV'),
            data: {
                btn_alterar: 'ajx',
                id_setor_alterar: id,
                setor_alterar: setor,
                setor_original_alterar: setor_original
            },
            success: function (ret) {
                MostrarMensagem(ret);
                if (ret == -2) {
                    $("#setor_alterar").focus();
                } else {
                    LimparNotificacoes(formID);
                    ConsultarSetor();
                    $("#alterarSetor").modal("hide");
                }
            },
            complete: function(){
                RemoverLoad();
            }
        })
    }
}

function Excluir() {

    let id = $("#id_excluir").val();

    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('SetorDV'),
        data: {
            btn_excluir: 'ajx',
            id_excluir: id
        },
        success: function (ret) {
            MostrarMensagem(ret);
            ConsultarSetor();
            $("#modalExcluir").modal("hide");
        },
        complete: function(){
            RemoverLoad();
        }
    })
}

function Filtrar() {

    let filtro = $('#filtroSetor').val();

    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('SetorDV'),
        data: {
            btn_filtrar: 'ajx',
            filtroSetor: filtro
        },
        success: function (filtroAtivado) {
            if (filtroAtivado == false) {
                ConsultarSetor();
            } else {
                TabelaFiltrada();
            }
        },
        complete: function(){
            RemoverLoad();
        }
    })
}