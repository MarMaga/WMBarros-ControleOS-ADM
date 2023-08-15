<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/ModeloEquipamentoDV.php';
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
                            <h2 class="text-primary">Gerenciar modelo de equipamento</h2>
                            <a>Aqui você gerencia todos os modelos de equipamentos</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastre um novo modelo de equipamento</h3>
                    </div>
                    <div class="card-body">
                        <form id="formModelo" method="post" action="gerenciar_modeloequipamento.php">
                            <div class="form-group">
                                <label>Modelo de equipamento</label>
                                <input class="form-control obg" name="modelo" id="modelo" onkeyup="Maiuscula('modelo')"
                                    placeholder="Digite aqui...">
                            </div>
                            <button onclick="return NotificarCampos('formModelo')" class="btn btn-success"
                                name="btn_cadastrar">Cadastrar</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <form action="gerenciar_modeloequipamento.php" method="post">
                        <?php if ($filtroAtivado == false && count($modelos) == 0) { ?>
                            <div class="card-header bg-warning">
                                <h3 class="card-title">Nenhum modelo cadastrado</h3>
                            <?php } else if ($filtroAtivado == false && count($modelos) > 0) { ?>
                                    <div class="card-header bg-info">
                                        <h3 class="card-title">Modelos cadastrados</h3>
                                    <?php } else if ($filtroAtivado == true && count($modelos) == 0) { ?>
                                            <div class="card-header bg-danger">
                                                <h3 class="card-title">A pesquisa retornou vazia</h3>
                                            <?php } else if ($filtroAtivado == true && count($modelos) > 0) { ?>
                                                    <div class="card-header bg-success">
                                                        <h3 class="card-title">Modelos filtrados</h3>
                                                    <?php } ?>
                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 200px;">
                                                <input type="hidden" name="filtroAtivado"
                                                    value="<?php $filtroAtivado ?>">
                                                <?php if (count($modelos) > 0 || $filtroAtivado == true) { ?>
                                                    <input type="text" name="filtroModelo" id="filtroModelo"
                                                        onkeyup="Maiuscula('filtroModelo')" class="form-control float-right"
                                                        placeholder="Pesquise por..." value="<?= $filtro ?>">
                                                    <div class="input-group-append">
                                                        <button name="btn_filtrar" id="btn_filtrar" title="Pesquisar"
                                                            onclick="return FiltrarModeloEquipamento()"
                                                            class="btn btn-default btn-sm"><i
                                                                class="fas fa-search"></i></button>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button <?php echo ($filtroAtivado == false && count($modelos) == 0) ? 'type="hidden"' : '' ?> name="btn_limparFiltro"
                                                            class="btn btn-info btn-sm" title="Limpar filtro"
                                                            onclick="return LimparFiltroModeloEquipamento()"><i
                                                                class="fas fa-times"></i></button>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                    </form>
                    <?php if (count($modelos) > 0) { ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Altere ou exclua os registros</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Ação</th>
                                                        <th>Modelo de equipamento</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php for ($i = 0; $i < count($modelos); $i++) { ?>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    onclick="return ModalAlterarModeloEquipamento('<?= $modelos[$i]['id'] ?>', '<?= $modelos[$i]['nome_modelo'] ?>')"
                                                                    class="btn btn-warning btn-xs" data-toggle="modal"
                                                                    data-target="#alterarModelo">Alterar</a>
                                                                <a href="#"
                                                                    onclick="return CarregarExcluir('<?= $modelos[$i]['id'] ?>', '<?= $modelos[$i]['nome_modelo'] ?>')"
                                                                    class="btn btn-danger btn-xs" data-toggle="modal"
                                                                    data-target="#modalExcluir">Excluir</a>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="id" id="id"
                                                                    value="<?= $modelos[$i]['id'] ?>" />
                                                                <?= $modelos[$i]['nome_modelo'] ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- /.card -->
                <form action="gerenciar_modeloequipamento.php" method="post" id="formAlt">
                    <?php include_once 'modais/alterar_modelo.php'; ?>
                </form>
                <form action="gerenciar_modeloequipamento.php" method="post">
                    <?php include_once 'modais/excluir.php'; ?>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper <-->

        <?php include_once PATH . 'Template/_includes/_footer.php'; ?>

    </div>
    <!-- ./wrapper -->

    <script>
        AjustarMenu("Gerenciar modelo de equipamento", "menuEquipamentos", "modelosEquipamentos");
        $("#modelo").focus();
    </script>

</body>

</html>