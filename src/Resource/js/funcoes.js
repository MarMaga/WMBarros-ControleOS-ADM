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

function TratarEnter(FormOuModal) {

    $(FormOuModal).on('keypress', function (e) {
        //o 13 é o Codigo do ENTER
        if (e.keyCode === 13) {
 
            e.preventDefault();
            e.keyCode = ''; // limpa a tecla clicada porque chama o clique do botão mais de uma vez

            if (FormOuModal == document){
                CadastrarTipoEquipamentoAJAX('formTipo');
            } else if (FormOuModal == '#alterarTipo'){
                AlterarTipoEquipamentoAJAX('formAlt');
            }
        }
    });
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
