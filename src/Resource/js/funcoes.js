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

function VerificaDigitacaoTipoEquipamento() {

    if ($("#h_tipo").val() == $("#tipo").val()) {
        MostrarMensagem(-2);
        return false;
    }

    NotificarCampos('formTipo');
}

function VerificaCampoVazio(id) {

    if ($("#" + id).val() == "") {
        $("#" + id).removeClass("is-valid").addClass("is-invalid");
    } else {
        $("#" + id).removeClass("is-invalid").addClass("is-valid");
    }
}

function Maiuscula() {
    var tipo = document.getElementById("tipo");

    tipo.value = tipo.value.toUpperCase();
}

function NovoTipo() {
    $("#novo").val("S");
    $("#h_id_alt").val("");
    $("#h_tipo").val("");
    $("#tipo").val("");
    $("#tipo").focus();
    return false;
}
function AlterarTipoEquipamento(id, nome) {
    $("#novo").val("N");
    $("#h_id_alt").val(id);
    $("#h_tipo").val(nome);
    $("#tipo").val(nome);
    $("#tipo").focus();
    return false;
}

function AjustaMenu(titulo, menu, item) {
    document.title = "ControleOS | " + titulo;
    $("#" + menu).addClass("menu-open");
    $("#" + item).addClass("active");
}