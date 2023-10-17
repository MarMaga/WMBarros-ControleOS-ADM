<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/EquipamentoDV.php';
include_once dirname(__DIR__, 2) . '/Resource/dataview/SetorDV.php';
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
                            <h2 class="text-primary">Alocar equipamento</h2>
                            <a>Aqui você aloca um equipamento ao setor específico</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Aloque aqui o equipamento ao setor específico</h3>
                    </div>
                    <div class="card-body">
                        <form id="formAloc" method="post" action="alocar_equipamento.php">
                            <input type="hidden" id="renderizar" value="OPTION">
                            <div class="form-group">
                                <label>Setor</label>
                                <select class="form-control select2 obg" name="idSetor" id="idSetor" style="width: 100%;">

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Equipamento</label>
                                <select class="form-control select2 obg" name="equipamento" id="equipamento"
                                    style="width: 100%;">

                                </select>
                            </div>
                            <button type="button" onclick="AlocarEquipamento('formAloc')" class="btn btn-success"
                                name="btn_alocar">Alocar</button>
                        </form>
                    </div>
                </div>

            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

        <?php include_once PATH . 'Template/_includes/_footer.php'; ?>

        <script>
            AjustarMenu("Alocar equipamento", "menuEquipamentos", "alocarEquipamento");
            $("#setor").focus();
        </script>

        <script src="../../Resource/ajax/EquipamentoAJAX.js"></script>
        <script src="../../Resource/ajax/SetorAJAX.js"></script>
        <!-- <script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script> -->

        <script>
            ConsultarSetor();
            ListarEquipamentos();
            // $(document).ready(function () {
            //     $("#tipo").editableSelect();
            //     $("#modelo").editableSelect();
            // });
        </script>

    </div>
    <!-- ./wrapper -->

</body>

</html>