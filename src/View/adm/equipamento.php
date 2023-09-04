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
                        <form id="formNovoEq" method="post" action="equipamento.php">
                            <div class="form-group">
                                <label>Tipo</label>
                                <input type="hidden" name="tipoSelected" value="<?= $tipoSelected ?>">
                                <select class="form-control select2 obg" name="tipo" id="tipo" style="width: 100%;">

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Modelo</label>
                                <input type="hidden" name="modeloSelected" value="<?= $modeloSelected ?>">
                                <select class="form-control select2 obg" name="modelo" id="modelo" style="width: 100%;">
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Identificação</label>
                                <input type="text" name="identificacao" id="identificacao" class="form-control obg"
                                    onkeyup="Maiuscula('identificacao')" <?= ($identificacao == '') ? 'value="" placeholder="Digite aqui..."' : 'value="' . $identificacao . '"' ?>>
                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea class="form-control obg" rows="3" name="descricao" id="descricao"
                                    onkeyup="Maiuscula('descricao')" <?= ($descricao == '') ? 'value="" placeholder="Digite aqui..."' : '' ?>><?= ($descricao != '') ? $descricao : '' ?></textarea>
                            </div>
                            <button onclick="return NotificarCampos('formNovoEq')" class="btn btn-success"
                                name="btn_cadastrar">Cadastrar</button>
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

    <script>
        AjustarMenu("Novo equipamento", "menuEquipamentos", "novoEquipamento");
        $("#tipo").focus();
    </script>

    <script src="../../Resource/ajax/EquipamentoAJAX.js"></script>
    
    <script>
        CarregarTipos();
        CarregarModelos();
    </script>

</body>

</html>