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
                            <h2 class="text-primary">Novo equipamento</h2>
                            <a>Aqui você poderá cadastrar seus equipamentos</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastre aqui os seus equipamentos</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="novo_equipamento.php">
                            <div class="form-group">
                                <label>Tipo</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Selecione</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Modelo</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Selecione</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Identificação</label>
                                <input type="text" name="table_search" class="form-control"
                                    placeholder="Digite aqui...">
                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea class="form-control" rows="3" placeholder="Digite aqui..."></textarea>
                            </div>
                            <button class="btn btn-success" name="btn_gravar">Gravar</button>
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

    <?php include_once PATH . 'Template/_includes/_scripts.php'; ?>

</body>

</html>