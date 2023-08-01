<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/NovoChamadoDV.php';
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
                            <h2 class="text-primary">Novo Chamado</h2>
                            <a>Realize aberturas de chamados nesta página</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <form id="formNovoChamado" method="post" action="novo_chamado.php">
                            <div class="form-group">
                                <label>Escolha o equipamento</label>
                                <select class="form-control select2 obg" name="equipamento" id="equipamento" style="width: 100%;">
                                    <option value="" selected="selected">Selecione</option>
                                    <option value="1">Notebook ACER</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Descreva o problema</label>
                                <textarea class="form-control obg" rows="3" name="problema" id="problema" placeholder="Digite aqui..."></textarea>
                            </div>
                            <button onclick="return NotificarCampos('formNovoChamado')" class="btn btn-success" name="btn_gravar">Gravar</button>
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

</body>

</html>