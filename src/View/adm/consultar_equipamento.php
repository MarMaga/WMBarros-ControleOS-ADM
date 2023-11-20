<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/EquipamentoDV.php';
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
                            <input type="hidden" value="tela_excluir" id="tela">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Tipo</label>
                                    <input type="hidden" name="tipoSelected" value="">
                                    <select class="form-control select2" name="tipo" id="tipo"
                                        onchange="FiltrarEquipamentos()">

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Modelo</label>
                                    <input type="hidden" name="modeloSelected" value="">
                                    <select class="form-control select2" name="modelo" id="modelo"
                                        onchange="FiltrarEquipamentos()">

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
                                        <h3 class="card-title">Altere, ative ou inative os registros</h3>
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
                include_once 'modais/excluir.php';
                include_once 'modais/inativar_equipamento.php';
                include_once 'modais/ativar_equipamento.php';
                include_once 'modais/dados_equipamento_inativo.php';
                include_once 'modais/dados_equipamento_ativo.php';
                include_once 'modais/dados_equipamento_alocado.php';
                ?>
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

    <script src="../../Resource/ajax/EquipamentoAJAX.js"></script>
    <!-- <script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script> -->

    <script>
        CarregarTipos();
        CarregarModelos();
        FiltrarEquipamentos();
        // $(document).ready(function () {
        //     $("#tipo").editableSelect();
        //     $("#modelo").editableSelect();
        // });
    </script>
</body>

</html>