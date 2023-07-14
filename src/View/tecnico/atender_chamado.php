<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/AtenderChamadoDV.php';
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
                            <h2 class="text-primary">Atender Chamado</h2>
                            <a>Faça os atendimentos aqui</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Coloque os detalhes dos seus atendimentos</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="atender_chamado.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" data-inputmask-alias="datetime"
                                                data-inputmask-inputformat="dd/mm/yyyy" data-mask name="data" id="data">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Setor</label>
                                        <select class="form-control select2" name="setor" id="setor" style="width: 100%;">
                                            <option value="0" selected="selected">Selecione</option>
                                            <option value="1" >Setor 1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Funcionário</label>
                                        <select class="form-control select2" name="funcionario" id="funcionario" style="width: 100%;">
                                            <option value="0" selected="selected">Selecione</option>
                                            <option value="1">Funcionário 1</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Equipamento</label>
                                        <select class="form-control select2" name="equipamento" id="equipamento" style="width: 100%;">
                                            <option value="0" selected="selected">Selecione</option>
                                            <option value="1">Notebook ACER</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Descrição do problema</label>
                                <textarea class="form-control" rows="3" name="problema" id="problema" placeholder="Digite aqui..."></textarea>
                            </div>
                            <div class="form-group">
                                <label>Laudo</label>
                                <textarea class="form-control" rows="3" name="laudo" id="laudo" placeholder="Digite aqui..."></textarea>
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

    <script>
        toastr.success('Atender chamado')
    </script>

</body>

</html>