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
                        <h3 class="card-title">Cadastre aqui os usuários</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="novo_usuario.php">
                            <div class="form-group">
                                <label>Tipo</label>
                                <select class="form-control select2" name="tipo" id="tipo" style="width: 100%;">
                                    <option selected="selected">Selecione</option>
                                    <option value="1">Produção</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Setor</label>
                                <select class="form-control select2" name="setor" id="setor" style="width: 100%;">
                                    <option value="0" selected="selected">Selecione</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Funcionário</option>
                                    <option value="3">Técnico</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control"
                                    placeholder="Digite aqui...">
                            </div>
                            <div class="form-group">
                                <label>CPF</label>
                                <input type="text" name="cpf" id="cpf" class="form-control"
                                    placeholder="Digite aqui...">
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Digite aqui...">
                            </div>
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" name="telefone" id="telefone" class="form-control"
                                    placeholder="Digite aqui...">
                            </div>
                            <div class="form-group">
                                <label>Endereço</label>
                                <input type="text" name="endereco" id="endereco" class="form-control"
                                    placeholder="Digite aqui...">
                            </div>
                            <button class="btn btn-success" name="btn_cadastrar">Cadastrar</button>
                        </form>
                    </div>
                </div>

            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

        <?php include_once PATH . 'Template/_includes/_footer.php'; ?>

    </div>
    <!-- ./wrapper -->

</body>

</html>