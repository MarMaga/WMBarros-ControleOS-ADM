<?php

use Src\_Public\Util;

include_once dirname(__DIR__, 2) . '/Resource/dataview/UsuarioDV.php';
include_once dirname(__DIR__, 2) . '/Resource/dataview/SetorDV.php';
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
                            <h2 class="text-primary">Alterar usuário</h2>
                            <a>Aqui você altera o usuário</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Altere aqui o usuário</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="alterar_usuario.php" id="formCad">
                            <input type="hidden" id="tipo_usuario" value="<?= $dados['tipo_usuario'] ?>">
                            <input type="hidden" id="id_usuario" value="<?= $dados['id_usuario'] ?>">
                            <input type="hidden" id="id_endereco" value="<?= $dados['id_endereco'] ?>">
                            <div class="form-group">
                                <input type="hidden" id="tipo" value="<?= $dados['tipo_usuario'] ?>">
                                <label>Tipo de usuário: </label>
                                <label class="text-primary">
                                    <?= Util::MostrarTipoUsuario($dados['tipo_usuario']) ?>
                                </label>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-9">
                                    <input type="hidden" id="nomeOriginal" value="<?= $dados['nome_usuario'] ?>">
                                    <label>Nome</label>
                                    <input type="text" name="nome" id="nome" class="form-control obg"
                                        placeholder="Digite aqui o nome" value="<?= $dados['nome_usuario'] ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="hidden" id="telefoneOriginal" value="<?= $dados['tel_usuario'] ?>">
                                    <label>Telefone</label>
                                    <input type="text" name="telefone" id="telefone" class="form-control num cel obg"
                                        value=<?= $dados['tel_usuario'] ?> onkeyup="ajustaMascaraFone(this.value)"
                                        placeholder="Digite aqui o telefone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-9">
                                    <input type="hidden" id="emailOriginal" value="<?= $dados['email_usuario'] ?>">
                                    <label>E-mail</label>
                                    <input onchange="verificarEmailDuplicado(this.value)" type="text" name="email"
                                        id="email" class="form-control obg" placeholder="Digite aqui o e-mail"
                                        value=<?= $dados['email_usuario'] ?>>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="hidden" id="cpfOriginal" value="<?= $dados['cpf_usuario'] ?>">
                                    <label>CPF</label>
                                    <input onchange="validarCpf(this.value)" type="text" name="cpf" id="cpf"
                                        class="form-control num cpf obg" placeholder="Digite aqui o CPF"
                                        value="<?= $dados['cpf_usuario'] ?>">
                                </div>
                            </div>
                            <?php if ($dados['tipo_usuario'] == USUARIO_FUNCIONARIO) { ?>
                                <div class="form-group">
                                    <input type="hidden" id="idSetorOriginal" value="<?= $dados['id_setor'] ?>">
                                    <label>Setor</label>
                                    <select class="form-control select2 obg" name="idSetor" id="idSetor"
                                        style="width: 100%;">
                                    <?php foreach($setores as $item){ ?>
                                        <option <?= $dados['id_setor'] == $item['id'] ? 'selected' : '' ?> value="<?= $item['id'] ?>"><?= $item['nome_setor'] ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            <?php } else if ($dados['tipo_usuario'] == USUARIO_TECNICO) { ?>
                                <div class="form-group">
                                    <input type="hidden" id="nomeEmpresaOriginal" value="<?= $dados['nome_empresa'] ?>">
                                    <label>Nome da empresa</label>
                                    <input type="text" name="empresa" id="empresa" class="form-control obg"
                                        placeholder="Digite aqui o nome da empresa" value="<?= $dados['nome_empresa'] ?>">
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <input type="hidden" id="cepOriginal" value="<?= $dados['cep'] ?>">
                                <label>CEP</label>
                                <input onblur="pesquisaCep(this.value)" type="text" name="cep" id="cep"
                                    class="form-control num cep obg" placeholder="Digite aqui o CEP"
                                    value="<?= $dados['cep'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="ruaOriginal" value="<?= $dados['rua'] ?>">
                                <label>Rua</label>
                                <input type="text" name="rua" id="rua" class="form-control obg"
                                    placeholder="Digite aqui a rua" value="<?= $dados['rua'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="bairroOriginal" value="<?= $dados['bairro'] ?>">
                                <label>Bairro</label>
                                <input type="text" name="bairro" id="bairro" class="form-control obg"
                                    placeholder="Digite aqui o bairro" value="<?= $dados['bairro'] ?>">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" id="estadoOriginal" value="<?= $dados['sigla_estado'] ?>">
                                    <label>Estado</label>
                                    <input type="text" name="estado" id="estado" disabled class="form-control obg"
                                        placeholder="Digite aqui o CEP (preenchimento automático)"
                                        value="<?= $dados['sigla_estado'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="hidden" id="cidadeOriginal" value="<?= $dados['nome_cidade'] ?>">
                                    <label>Cidade</label>
                                    <input type="text" name="cidade" id="cidade" disabled class="form-control obg"
                                        placeholder="Digite aqui o CEP (preenchimento automático)"
                                        value="<?= $dados['nome_cidade'] ?>">
                                </div>
                            </div>
                            <button type="button" class="btn btn-success" name="btn_alterar" id="btn_alterar"
                                onclick="AlterarUsuario('formCad')">Alterar</button>
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

        <!-- <script>
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
        </script> -->
    </div>
    <!-- ./wrapper -->

</body>

</html>