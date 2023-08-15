<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/ConsultarEquipamentoDV.php';
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
                            <h2 class="text-primary">Consultar equipamento</h2>
                            <a>Aqui você faz a consulta dos seus equipamentos</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Consulte os equipamentos</h3>
                    </div>
                    <div class="card-body">
                        <form id="formConsEq" method="post" action="consultar_equipamento.php">
                            <div class="form-group">
                                <label>Pesquisar por Tipo</label>
                                <select class="form-control select2 obg" name="tipo" id="tipo" style="width: 100%;">
                                    <option value="" <?= ($tipoSelected == '') ? 'selected="selected"' : '' ?>>Selecione</option>
                                    <?php foreach($tipos as $item){ ?>
                                        <option value="<?= $item['tipo_equipamento'] ?>" <?= ($tipoSelected == $item['tipo_equipamento']) ? 'selected="selected"' : '' ?>><?= $item['tipo_equipamento'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button onclick="return NotificarCampos('formConsEq')" class="btn btn-success" name="btn_buscar">Buscar</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Equipamentos cadastrados</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Altere ou exclua os registros</h3>

                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" name="table_search" class="form-control float-right"
                                                    placeholder="Pesquise por...">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default"><i
                                                            class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Ação</th>
                                                    <th>Tipo</th>
                                                    <th>Modelo</th>
                                                    <th>Identificação</th>
                                                    <th>Descrição</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for($i = 0; $i < count($equipamentos); $i++) { ?>
                                                <tr>
                                                    <td>
                                                        <a href="#" class="btn btn-warning btn-xs">Alterar</a>
                                                        <a href="#" class="btn btn-danger btn-xs">Excluir</a>
                                                    </td>
                                                    <td><input type="hidden" name="id" id="id"
                                                                    value="<?= $equipamentos[$i]['id'] ?>" /><?= $equipamentos[$i]['tipo_equipamento'] ?></td>
                                                    <td><?= $equipamentos[$i]['nome_modelo'] ?></td>
                                                    <td><?= $equipamentos[$i]['ident_equipamento'] ?></td>
                                                    <td><?= $equipamentos[$i]['desc_equipamento'] ?></td>
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
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper <-->

        <?php include_once PATH . 'Template/_includes/_footer.php'; ?>

    </div>
    <!-- ./wrapper -->
    
    <script>
        AjustarMenu("Consultar equipamento", "menuEquipamentos", "consultarEquipamento");
        $("#tipo").focus();
    </script>

</body>

</html>