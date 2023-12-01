function verificarEmailDuplicado(email) {

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

function CadastrarUsuario(formID) {
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
                alert(ret);
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