function BASE_URL_DATAVIEW(dataview) {
    return '../../Resource/dataview/' + dataview + '.php';
}

function LimparNotificacoes(formID) {

    $("#" + formID + " input, #" + formID + " textarea, #" + formID + " select").each(function () {
        $(this).val('');
        $(this).removeClass("is-invalid").removeClass("is-valid");
    });
}

function NotificarCampos(formID) {

    let ret = true;

    $("#" + formID + " input, #" + formID + " textarea, #" + formID + " select").each(function () {

        if ($(this).hasClass("obg")) {

            if ($(this).val() == "") {

                $(this).addClass("is-invalid");
                ret = false;

            } else {

                $(this).removeClass("is-invalid").addClass("is-valid");

            }
        }
    });

    if (!ret) {
        MostrarMensagem(0);
    }

    return ret;
}

function VerificaCampoVazio(id) {

    if ($("#" + id).val() == "") {
        $("#" + id).removeClass("is-valid").addClass("is-invalid");
    } else {
        $("#" + id).removeClass("is-invalid").addClass("is-valid");
    }
}

function Maiuscula(id) {
    var campo = document.getElementById(id);

    campo.value = campo.value.toUpperCase();
}

function AjustarMenu(titulo, menu, item) {
    document.title = "ControleOS | " + titulo;
    $("#" + menu).addClass("menu-open");
    $("#" + item).addClass("active");
}

function TratarEnterAlteracaoTipo() {
    $(document.body).on('keypress', function (e) {
        //o 13 é o Codigo do ENTER
        if (e.keyCode === 13) {

            e.keyCode = ''; // limpa a tecla clicada porque chama o clique do botão mais de uma vez
            $("#tipo_alterar").focus();
            //e.preventDefault();
            //GravarAlteracaoTipoEquipamento();
            //$("#btn_alterar").click();
            //document.getElementById("btn_alterar").click();
        }
    });
}

function TratarEnterCadastroTipo() {
    $(document.body).on('keypress', function (e) {
        //o 13 é o Codigo do ENTER
        if (e.keyCode === 13) {

            e.keyCode = ''; // limpa a tecla clicada porque chama o clique do botão mais de uma vez
            e.preventDefault();
            MouseClick("btn_cadastrar");

            //var btn = document.getElementById("btn_cadastrar");
            //btn.onclick.call(btn);
            //CadastrarTipoEquipamento('formTipo');
            //document.getElementById("btn_cadastrar").click();
        }
    });
}

function MouseClick(ID){
    $("#" + ID).click();
    //var clickEvent = new MouseEvent("click", {
    //    "view": window,
    //    "bubbles": true,
    //    "cancelable": false
    //});

    //$("#" + ID).dispatchEvent(clickEvent);
}
// TIPO DE EQUIPAMENTO
function AlterarTipoEquipamento(id, nome) {
    $("#novo").val("N");
    $("#h_id_alt").val(id);
    $("#h_tipo").val(nome);
    $("#tipo").val(nome);
    $("#tipo").focus();

    return false;
}

function LimparFiltroTipoEquipamento() {
    if ($("#filtroTipo").val() == "") {
        $("#tipo").focus();
        return false;
    }
}

// MODELO DE EQUIPAMENTO
function AlterarModeloEquipamento(id, nome) {
    $("#novo").val("N");
    $("#h_id_alt").val(id);
    $("#h_modelo").val(nome);
    $("#model").val(nome);
    $("#modelo").focus();

    return false;
}

function LimparFiltroModeloEquipamento() {
    if ($("#filtroModelo").val() == "") {
        $("#modelo").focus();
        return false;
    }
}

function FocarInputModal(IDModal, IDInput) {
    $(document).ready(function () {
        $(document).on('shown.bs.modal', '#' + IDModal, function () {
            //$('#' + IDInput).trigger('focus');
            $('#' + IDInput).focus();
        });
    });
}
