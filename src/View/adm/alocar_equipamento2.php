<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/EquipamentoDV.php';
include_once dirname(__DIR__, 2) . '/Resource/dataview/AlocarEquipamentoDV.php';
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
<script src="../../Resource/ajax/EquipamentoAJAX.js"></script>
    <script src="../../Resource/ajax/AlocarEquipamentoAJAX.js"></script>
    <!-- <script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script> -->

    <script>
        CarregarTipos();
        CarregarModelos();
        ListarEquipamentos();
        // $(document).ready(function () {
        //     $("#tipo").editableSelect();
        //     $("#modelo").editableSelect();
        // });
    </script>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h2 class="text-primary">Alocar equipamento</h2>
                            <a>Aqui você controla a alocação dos seus equipamentos</a>
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
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Tipo</label>
                                    <input type="hidden" name="tipoSelected" value="">
                                    <select class="form-control select2" name="tipo" id="tipo"
                                        onchange="FiltrarEquipamentosAlocacao()">

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Modelo</label>
                                    <input type="hidden" name="modeloSelected" value="">
                                    <select class="form-control select2" name="modelo" id="modelo"
                                        onchange="FiltrarEquipamentosAlocacao()">

                                    </select>
                                </div>
                            </div>
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
                                        <h3 class="card-title">Aloque ou desaloque os equipamentos</h3>
                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" name="table_search" class="form-control float-right"
                                                    style="text-transform: uppercase" placeholder="Pesquise por...">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default"><i
                                                            class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover" id="tableResult">

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
                <?php
                include_once 'modais/alocacao.php';
                ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper <-->

        <?php include_once PATH . 'Template/_includes/_footer.php'; ?>

    </div>
    <!-- ./wrapper -->

    <script>
        AjustarMenu("Alocação de equipamento", "menuEquipamentos", "alocarEquipamento");
        $("#tipo").focus();

    </script>

</body>

</html>