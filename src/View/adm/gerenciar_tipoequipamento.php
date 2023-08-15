<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/TipoEquipamentoDV.php';
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
                            <h2 class="text-primary">Gerenciar tipo de equipamento</h2>
                            <a>Aqui você gerencia todos os tipos de equipamentos</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastre um novo tipo de equipamento</h3>
                    </div>
                    <div class="card-body">
                        <form id="formTipo" method="post" action="gerenciar_tipoequipamento.php">
                            <div class="form-group">
                                <label>Tipo de equipamento</label>
                                <input name="novo" id="novo" type="hidden" value="S">
                                <input class="form-control obg" name="tipo" id="tipo" onkeyup="Maiuscula('tipo')"
                                    placeholder="Digite aqui...">
                            </div>
                            <button onclick="return NotificarCampos('formTipo')" class="btn btn-success"
                                name="btn_cadastrar">Cadastrar</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <form action="gerenciar_tipoequipamento.php" method="post">
                        <?php if ($filtroAtivado == false && count($tipos) == 0) { ?>
                            <div class="card-header bg-warning">
                                <h3 class="card-title">Nenhum tipo cadastrado</h3>
                            <?php } else if ($filtroAtivado == false && count($tipos) > 0) { ?>
                                    <div class="card-header bg-info">
                                        <h3 class="card-title">Tipos cadastrados</h3>
                                    <?php } else if ($filtroAtivado == true && count($tipos) == 0) { ?>
                                            <div class="card-header bg-danger">
                                                <h3 class="card-title">A pesquisa retornou vazia</h3>
                                            <?php } else if ($filtroAtivado == true && count($tipos) > 0) { ?>
                                                    <div class="card-header bg-success">
                                                        <h3 class="card-title">Tipos filtrados</h3>
                                                    <?php } ?>
                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 200px;">
                                                <input type="hidden" name="filtroAtivado"
                                                    value="<?php $filtroAtivado ?>">
                                                <?php if (count($tipos) > 0 || $filtroAtivado == true) { ?>
                                                    <input type="text" name="filtroTipo" id="filtroTipo"
                                                        onkeyup="Maiuscula('filtroTipo')" class="form-control float-right"
                                                        placeholder="Pesquise por..." value="<?= $filtro ?>">
                                                    <div class="input-group-append">
                                                        <button name="btn_filtrar" id="btn_filtrar" title="Pesquisar"
                                                            onclick="return FiltrarTipoEquipamento()"
                                                            class="btn btn-default btn-sm"><i
                                                                class="fas fa-search"></i></button>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button <?php echo ($filtroAtivado == false && count($tipos) == 0) ? 'type="hidden"' : '' ?> name="btn_limparFiltro"
                                                            class="btn btn-info btn-sm" title="Limpar filtro"
                                                            onclick="return LimparFiltroTipoEquipamento()"><i
                                                                class="fas fa-times"></i></button>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                    </form>
                    <?php if (count($tipos) > 0) { ?>
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
                                                        <th>Tipo do equipamento</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php for ($i = 0; $i < count($tipos); $i++) { ?>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    onclick="return ModalAlterarTipoEquipamento('<?= $tipos[$i]['id'] ?>', '<?= $tipos[$i]['tipo_equipamento'] ?>')"
                                                                    class="btn btn-warning btn-xs" data-toggle="modal"
                                                                    data-target="#alterarTipo">Alterar</a>
                                                                <a href="#"
                                                                    onclick="return CarregarExcluir('<?= $tipos[$i]['id'] ?>', '<?= $tipos[$i]['tipo_equipamento'] ?>')"
                                                                    class="btn btn-danger btn-xs" data-toggle="modal"
                                                                    data-target="#modalExcluir">Excluir</a>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="id" id="id"
                                                                    value="<?= $tipos[$i]['id'] ?>" />
                                                                <?= $tipos[$i]['tipo_equipamento'] ?>
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
                <form action="gerenciar_tipoequipamento.php" method="post" id="formAlt">
                    <?php include_once 'modais/alterar_tipo.php'; ?>
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
        AjustarMenu("Gerenciar tipo de equipamento", "menuEquipamentos", "tiposEquipamentos");
        $("#tipo").focus();
    </script>

</body>

</html>