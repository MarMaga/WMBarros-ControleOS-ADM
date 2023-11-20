<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/NovoUsuarioDV.php';
?>

<!DOCTYPE html>
<html>

<head>
    <?php require_once PATH . 'Template/_includes/_head.php'; ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php
        include_once PATH . 'Template/_includes/_topo.php';
        include_once PATH . 'Template/_includes/_menu.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h2 class="text-primary">Novo usuário</h2>
                            <a>Aqui você insere um novo usuário</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastre aqui um novo usuário</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="novo_usuario.php" id="formCad">
                            <input type="hidden" id="renderizar" value="OPTION">
                            <div class="form-group">
                                <label>Escolha o tipo de usuário</label>
                                <select class="form-control select2" name="tipo" id="tipo" style="width: 100%;"
                                    onchange="CarregarCamposUsuario(this.value)">
                                    <option selected="selected">Selecione</option>
                                    <option value="<?= USUARIO_ADM ?>">Administrador</option>
                                    <option value="<?= USUARIO_FUNCIONARIO ?>">Funcionário</option>
                                    <option value="<?= USUARIO_TECNICO ?>">Técnico</option>
                                </select>
                            </div>
                            <div id="divDadosUsuario" style="display: none">
                                <div class="row">
                                    <div class="form-group col-md-9">
                                        <label>Nome</label>
                                        <input type="text" name="nome" id="nome" class="form-control obg"
                                            placeholder="Digite aqui o nome">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" id="telefone"
                                            class="form-control num cel obg" onkeyup="ajustaMascaraFone(this.value)"
                                            placeholder="Digite aqui o telefone">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>CPF/CNPJ</label>
                                        <input type="text" name="cpfcnpj" id="cpfcnpj" class="form-control num"
                                            placeholder="Digite aqui o CPF ou o CNPJ">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-9">
                                        <label>E-mail</label>
                                        <input onchange="verificarEmailDuplicado(this.value)" type="text" name="email"
                                            id="email" class="form-control obg" placeholder="Digite aqui o e-mail">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>CPF</label>
                                        <input onchange="validarCpf(this.value)" type="text" name="cpf" id="cpf"
                                            class="form-control num cpf obg" placeholder="Digite aqui o CPF">
                                    </div>
                                </div>
                            </div>
                            <div id="divUsuarioFuncionario" style="display: none">
                                <div class="form-group">
                                    <label>Setor</label>
                                    <select class="form-control select2 obg" name="idSetor" id="idSetor"
                                        style="width: 100%;">
                                        <option value="" selected="selected">Selecione</option>

                                    </select>
                                </div>
                            </div>
                            <div id="divUsuarioTecnico" style="display: none">
                                <div class="form-group">
                                    <label>Nome da empresa</label>
                                    <input type="text" name="empresa" id="empresa" class="form-control obg"
                                        placeholder="Digite aqui o nome da empresa">
                                </div>
                            </div>
                            <div id="divDadosEndereco" style="display: none">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input onblur="pesquisaCep(this.value)" type="text" name="cep" id="cep"
                                        class="form-control num cep obg" placeholder="Digite aqui o CEP">
                                </div>
                                <div class="form-group">
                                    <label>Rua</label>
                                    <input type="text" name="rua" id="rua" class="form-control obg"
                                        placeholder="Digite aqui a rua">
                                </div>
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input type="text" name="bairro" id="bairro" class="form-control obg"
                                        placeholder="Digite aqui o bairro">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Estado</label>
                                        <input type="text" name="estado" id="estado" disabled class="form-control obg"
                                            placeholder="Digite aqui o CEP (preenchimento automático)">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Cidade</label>
                                        <input type="text" name="cidade" id="cidade" disabled class="form-control obg"
                                            placeholder="Digite aqui o CEP (preenchimento automático)">
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success" name="btn_cadastrar" id="btn_cadastrar"
                                style="display: none" onclick="CadastrarUsuario('formCad')">Cadastrar</button>
                        </form>
                    </div>
                </div>

            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

        <?php include_once PATH . 'Template/_includes/_footer.php'; ?>

        <script src="../../Resource/js/buscar_cep.js"></script>
        <script src="../../Resource/ajax/usuarioAJAX.js"></script>
        <script src="../../Resource/ajax/setorAJAX.js"></script>
        <script>
            $("#cpfcnpj").keydown(function () {
                try {
                    $("#cpfcnpj").unmask();
                } catch (e) { }

                if ($("#cpfcnpj").val().length < 11) {
                    $("#cpfcnpj").mask("999.999.999-99");
                } else {
                    $("#cpfcnpj").mask("99.999.999/9999-99");
                }

                // ajustando foco
                var elem = this;
                setTimeout(function () {
                    // mudo a posição do seletor
                    elem.selectionStart = elem.selectionEnd = 10000;
                }, 0);
                // reaplico o valor para mudar o foco
                var currentValue = $(this).val();
                $(this).val('');
                $(this).val(currentValue);
            });
        </script>
    </div>
    <!-- ./wrapper -->

</body>

</html>