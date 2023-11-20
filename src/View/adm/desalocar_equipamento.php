<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/SetorDV.php';
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
                            <h2 class="text-primary">Desalocar equipamento</h2>
                            <a>Aqui você pode desalocar os seus equipamentos</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Consulte os seus equipamentos por setor</h3>
                    </div>
                    <div class="card-body">
                        <form id="formDesaloc" method="post" action="desalocar_equipamento.php">
                            <input type="hidden" value="tela_desalocar" id="tela">
                            <input type="hidden" id="renderizar" value="OPTION">
                            <div class="form-group">
                                <label>Setor</label>
                                <select class="form-control select2" name="idSetor" id="idSetor"
                                    onchange="FiltrarEquipamentosPorSetor(this.value)" style="width: 100%;">

                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card" style="display: none" id="divResultado">
                    <div class="card-header">
                        <h3 class="card-title">Lista de equipamentos deste setor</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Aqui você pode desalocar os equipamentos</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table id="tableResult" class="table table-hover">

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
                <?php include_once 'modais/excluir.php'; ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper <-->

        <?php include_once PATH . 'Template/_includes/_footer.php'; ?>

        <script>
            AjustarMenu("Desalocar equipamento", "menuEquipamentos", "desalocarEquipamento");
            $("#setor").focus();
        </script>

        <script src="../../Resource/ajax/SetorAJAX.js"></script>
        <script src="../../Resource/ajax/EquipamentoAJAX.js"></script>
        <!-- <script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script> -->

        <script>
            ConsultarSetoresComEquipamentos();
            // $(document).ready(function () {
            //     $("#tipo").editableSelect();
            //     $("#modelo").editableSelect();
            // });
        </script>

    </div>
    <!-- ./wrapper -->

</body>

</html>