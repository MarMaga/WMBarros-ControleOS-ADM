<?php
include_once dirname(__DIR__, 3) . '/vendor/autoload.php';
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
                            <h2 class="text-primary">Meus Chamados</h2>
                            <a>Consulte todos seus chamados e acompanhe os atendimentos</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Consulte os seus chamados por situação</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="meus_chamados.php">
                            <div class="form-group">
                                <label>Escolha a situação</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Todos</option>
                                </select>
                            </div>
                            <button class="btn btn-success" name="btn_pesquisar">Pesquisar</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Resultado encontrado</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Aqui você pode ver os detalhes dos seus chamados</h3>

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
                                                    <th>Data Abertura</th>
                                                    <th>Funcionário</th>
                                                    <th>Equipamento</th>
                                                    <th>Problema</th>
                                                    <th>Data Atendimento</th>
                                                    <th>Técnico</th>
                                                    <th>Data Encerramento</th>
                                                    <th>Laudo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="#" class="btn btn-block bg-gradient-info btn-xs">Ver Mais</a>
                                                    </td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
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

</body>

</html>