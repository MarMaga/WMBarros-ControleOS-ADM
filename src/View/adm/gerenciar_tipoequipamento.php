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
                        <form method="post" action="gerenciar_tipoequipamento.php">
                            <div class="form-group">
                                <label>Tipo de equipamento</label>
                                <input class="form-control" name="tipo" id="tipo" placeholder="Digite aqui...">
                            </div>
                            <button class="btn btn-success" name="btn_cadastrar">Cadastrar</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tipos cadastrados</h3>
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
                                                    <th>Tipo do equipamento</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="#" class="btn btn-warning btn-xs">Alterar</a>
                                                        <a href="#" class="btn btn-danger btn-xs">Excluir</a>
                                                    </td>
                                                    <td>183</td>
                                                </tr>
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

    <?php include_once PATH . 'Template/_includes/_scripts.php'; ?>

    <script>
        toastr.success('Tipo de equipamento');
    </script>

</body>

</html>