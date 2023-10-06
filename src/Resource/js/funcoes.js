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

function Maiuscula(ID) {
    var campo = $("#" + ID);
    campo.val(campo.val().toUpperCase());
}

function AjustarMenu(titulo, menu, item) {
    document.title = "ControleOS | " + titulo;
    $("#" + menu).addClass("menu-open");
    $("#" + item).addClass("active");
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

function FecharModal(modal) {
    $(modal).modal("hide");
}

// converte tudo o que for digitado para maiúscula
// ao invés da função abaixo, todo input que deve ser
// em maiúscula contém style="text-transform: uppercase"
// document.addEventListener('keyup', (e) => {
//     // não atua nos campos de data
//     if (e.target.type != 'date')
//         e.target.value = e.target.value.toUpperCase();
// })

function Load() {
    $(".loader").addClass("is-active");
}

function RemoverLoad() {
    $(".loader").removeClass("is-active");
}

function AtivaInativaBotaoAlocacao(btnID, setorDoEq, selectID){
    // ativa o botão Alterar somente se houver alteração de setor

    selectEscolhido = $("#" + selectID).val();

    if (setorDoEq == selectEscolhido){
        $("#" + btnID).attr("hidden", true);
    } else {
        $("#" + btnID).removeAttr("hidden");
    }
}
