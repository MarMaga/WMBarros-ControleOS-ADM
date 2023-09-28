<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/EquipamentoDV.php';

// variável que armazena o estado da tela (ver dataview - DV)
$titulo = isset($equipamento) ? ESTADO_TELA_ALTERAR : ESTADO_TELA_NOVO;
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
                            <h2 class="text-primary"><?= $titulo ?> equipamento</h2>
                            <!-- <a>Aqui você poderá cadastrar seus equipamentos</a> -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $titulo ?> equipamento</h3>
                    </div>
                    <div class="card-body">
                        <form id="formNovoEq" method="post" action="equipamento.php">
                            <input type="hidden" id="idTipo" value="<?= isset($equipamento) ? $equipamento['tipoequipamento_id'] : '' ?>">
                            <input type="hidden" id="idModelo" value="<?= isset($equipamento) ? $equipamento['modelo_id'] : '' ?>">
                            <input type="hidden" id="idEquipamento" value="<?= isset($equipamento) ? $_GET['id'] : '' ?>">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Tipo</label>
                                    <select class="form-control select2 obg" name="tipo" id="tipo" style="width: 100%;">

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Modelo</label>
                                    <select class="form-control select2 obg" name="modelo" id="modelo" style="width: 100%;">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Identificação</label>
                                <input type="text" name="identificacao" id="identificacao" class="form-control obg"
                                    onkeyup="Maiuscula('identificacao')" value="<?= $titulo == ESTADO_TELA_ALTERAR ? $equipamento['ident_equipamento'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea class="form-control obg" rows="3" name="descricao" id="descricao"
                                    onkeyup="Maiuscula('descricao')"><?= (isset($equipamento)) ? $equipamento['desc_equipamento'] : '' ?></textarea>
                            </div>
                            <button type="button" onclick="GravarEquipamento('formNovoEq')" class="btn btn-success"
                                name="btn_gravar"><?= $titulo ?></button>
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