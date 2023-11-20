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

function AtivaInativaBotaoAlocacao(btnID, setorDoEq, selectID, col1) {
    // ativa o botão Alterar somente se houver alteração de setor

    selectEscolhido = $("#" + selectID).val();

    if (setorDoEq == selectEscolhido) {
        $("#" + col1).show();
        $("#" + btnID).attr("hidden", true);
    } else {
        $("#" + col1).hide();
        $("#" + btnID).removeAttr("hidden");
    }
}

function CarregarCamposUsuario(tipo) {

    $("#divUsuarioFuncionario").hide();
    $("#divUsuarioTecnico").hide();

    $("#idSetor").removeClass("obg");
    $("#empresa").removeClass("obg");

    // limpa os campos
    LimparNotificacoes("formCad");
    // volta o tipo depois de limpá-lo
    $("#tipo").val(tipo);

    switch (tipo) {

        case '1': // administrador
            $("#divDadosUsuario").show();
            $("#divDadosEndereco").show();
            $("#btn_cadastrar").show();
            break;

        case '2': // funcionário
            $("#divDadosUsuario").show();
            $("#divDadosEndereco").show();
            $("#divUsuarioFuncionario").show();
            $("#btn_cadastrar").show();

            $("#idSetor").addClass("obg");

            $("#renderizar").val("OPTION");
            ConsultarSetor();
            break;

        case '3': // técnico
            $("#divDadosUsuario").show();
            $("#divDadosEndereco").show();
            $("#divUsuarioTecnico").show();
            $("#btn_cadastrar").show();

            $("#empresa").addClass("obg");
            break;

        default: // selecione
            $("#divDadosUsuario").hide();
            $("#divDadosEndereco").hide();
            $("#btn_cadastrar").hide();
            break;
    }
}

function validarCpf(strCPF) {
    strCPF = strCPF.replace(/\.|-/gm,''); 
    // strCPF = strCPF.replace('.','');
    // strCPF = strCPF.replace('.','');
    // strCPF = strCPF.replace('-','');
    
    let Soma;
    let Resto;

    Soma = 0;
    for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10))) {
        $("#cpf").val('');

        MostrarMensagem(-7); // CPF inválido
        return false;
    }
    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11))) {
        $("#cpf").val('');
        MostrarMensagem(-7); // CPF inválido
        return false;
    }
    return true;
}

function validarEmail(strEmail) {
    let usuario = strEmail.substring(0, strEmail.indexOf("@"));
    let dominio = strEmail.substring(strEmail.indexOf("@") + 1, strEmail.length);
    let emailValido = true;

    if ((usuario.length == 0) ||
        (dominio.length < 3) ||
        (usuario.search("@") != -1) ||
        (dominio.search("@") != -1) ||
        (usuario.search(" ") != -1) ||
        (dominio.search(" ") != -1) ||
        (dominio.search(".") == -1) ||
        (dominio.indexOf(".") == -1) ||
        (dominio.lastIndexOf(".") == dominio.length -1)) {
        MostrarMensagem(-8);
        emailValido = false;
    }
    return emailValido;
}

function ajustaMascaraFone(fone){

    if (fone.length < 15){
        $("#telefone").mask('(00) 0000-00000');
    } else {
        $("#telefone").mask('(00) 00000-0000');
    }
}
