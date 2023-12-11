function verificarEmailDuplicado(email)
{
    if (validarEmail(email)) {
        $.ajax({
            beforeSend: function () {
                Load();
            },
            type: 'post',
            url: BASE_URL_DATAVIEW('usuarioDV'),
            data: {
                verificar_email_duplicado: 'ajx',
                email: email
            },
            success: function (ret) {
                if (ret) {
                    MostrarMensagem(-9);
                    $("#email").val('');
                }
            },
            complete: function () {
                RemoverLoad();
            }

        })
    }
}

function CadastrarUsuario(formID)
{
    if (NotificarCampos(formID)) {

        let tipo = $('#tipo').val();

        $.ajax({
            beforeSend: function () {
                Load();
            },
            type: 'post',
            url: BASE_URL_DATAVIEW('UsuarioDV'),
            data: {
                btn_cadastrar: 'ajx',
                tipo: tipo,
                nome_empresa: tipo == 3 ? $('#empresa').val() : '',
                setor: tipo == 2 ? $('#idSetor').val() : '',
                nome: $('#nome').val(),
                email: $('#email').val(),
                cpf: $('#cpf').val(),
                telefone: $('#telefone').val(),
                rua: $('#rua').val(),
                bairro: $('#bairro').val(),
                cep: $('#cep').val(),
                cidade: $('#cidade').val(),
                estado: $('#estado').val()
            },
            success: function (ret) {
                if (ret == 1) {
                    CarregarCamposUsuario(0);
                }
            },
            complete: function () {
                RemoverLoad();
                MostrarMensagem(1);
            }
        })
    }
}

function AlterarUsuario(formID) {
    if (NotificarCampos(formID)) {

        let tipo_usuario = $("#tipo_usuario").val();
        let id_usuario = $("#id_usuario").val();
        let id_endereco = $("#id_endereco").val();

        if (NenhumDadoUsuarioAlterado()) {
            MostrarMensagem(-2);
        } else {

            $.ajax({
                beforeSend: function () {
                    Load();
                },
                type: 'post',
                url: BASE_URL_DATAVIEW('UsuarioDV'),
                data: {
                    btn_alterar: 'ajx',
                    tipo_usuario: tipo_usuario,
                    id_usuario: id_usuario,
                    id_endereco: id_endereco,
                    nome_empresa: tipo == 3 ? $('#empresa').val() : '',
                    setor: tipo == 2 ? parseInt($('#idSetor').val()) : '',
                    nome: $('#nome').val(),
                    email: $('#email').val(),
                    cpf: $('#cpf').val().replace(".", "").replace(".", "").replace("-", ""),
                    telefone: $('#telefone').val().replace("(", "").replace(")", "").replace(" ", "").replace("-", ""),
                    rua: $('#rua').val(),
                    bairro: $('#bairro').val(),
                    cep: $('#cep').val().replace("-", ""),
                    cidade: $('#cidade').val(),
                    estado: $('#estado').val()
                },
                success: function (ret) {
                    alert(ret);
                    MostrarMensagem(ret);
                    Redirecionar("consultar_usuario.php", 5);
                },
                complete: function () {
                    RemoverLoad();
                }
            })
        }
    }
}

function NenhumDadoUsuarioAlterado() {
    let nenhumDadoAlterado = true;

    if ($("#nome").val().trim() != $("#nomeOriginal").val() ||
        $("#telefone").val().replace("(", "").replace(")", "").replace(" ", "").replace("-", "") != $("#telefoneOriginal").val() ||
        $("#email").val().trim() != $("#emailOriginal").val() ||
        $("#cpf").val().replace(".", "").replace(".", "").replace("-", "") != $("#cpfOriginal").val() ||
        $("#cep").val().replace("-", "") != $("#cepOriginal").val() ||
        $("#rua").val().trim() != $("#ruaOriginal").val() ||
        $("#bairro").val().trim() != $("#bairroOriginal").val() ||
        $("#estado").val().trim() != $("#estadoOriginal").val() ||
        $("#cidade").val().trim() != $("#cidadeOriginal").val())
        nenhumDadoAlterado = false;

    if (tipo_usuario == 2 && $("#idSetor").val() != $("#idSetorOriginal").val() && nenhumDadoAlterado)
        nenhumDadoAlterado = false;

    if (tipo_usuario == 3 && $("#nome_empresa").val().trim() != $("#nomeEmpresaOriginal").val() && nenhumDadoAlterado)
        nenhumDadoAlterado = false;

    if (nenhumDadoAlterado) {
        return false;
    } else {
        return true;
    }
}

function FiltrarUsuario() {

    let nome = document.getElementById("nome_filtro").value;

    if (nome != "") {
        if (nome.length > 2) {
            $.ajax({
                beforeSend: function () {
                    Load();
                },
                type: "post",
                url: BASE_URL_DATAVIEW("UsuarioDV"),
                data: {
                    filtrar_usuario: "ajx",
                    nome_filtro: nome
                },
                success: function (dados) {
                    if (dados == 0) {
                        $("#tableResult").html("");
                        $("#divResult").hide();
                        MostrarMensagem(2);
                    } else {
                        $("#divResult").show();
                        $("#tableResult").html(dados);
                        // $("#toast-container").hide();
                    }
                },
                complete: function () {
                    RemoverLoad();
                }
            })
        }
    } else {
        $("#tableResult").html("");
        $("#divResult").hide();
    }
}

function AlterarStatusUsuario(id, status) {

    $.ajax({
        beforeSend: function () {
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('UsuarioDV'),
        data: {
            alterar_status_usuario: 'ajx',
            id_user: id,
            status_user: status
        },
        success: function (ret) {
            MostrarMensagem(ret);

            if (ret == 1)
                FiltrarUsuario();
        },
        complete: function () {
            RemoverLoad();
        }
    })
}

function Logar(formID) {

    if (NotificarCampos(formID)) {

        let login = $("#login").val();
        let senha = $("#senha").val();

        $.ajax({
            before: function () {
                Load();
            },
            type: 'post',
            url: BASE_URL_DATAVIEW('UsuarioDV'),
            data: {
                btn_logar: 'ajx',
                login_usuario: login,
                senha_usuario: senha
            },
            success: function (ret) {
                MostrarMensagem(ret);
                if (ret == 3)
                    Redirecionar('inicial_adm.php', 2);
            },
            complete: function () {
                RemoverLoad();
            }
        })
    }
}