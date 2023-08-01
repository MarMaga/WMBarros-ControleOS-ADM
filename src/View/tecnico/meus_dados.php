<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/MeusDadosDV.php';
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
                            <h2 class="text-primary">Meus dados</h2>
                            <a>Aqui você pode atualizar os seus dados</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastre aqui os seus dados</h3>
                    </div>
                    <div class="card-body">
                        <form id="formMeusDadosTec" method="post" action="meus_dados.php">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control obg"
                                    placeholder="Digite aqui...">
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="text" name="email" id="email" class="form-control obg"
                                    placeholder="Digite aqui...">
                            </div>
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" name="telefone" id="telefone" class="form-control obg"
                                    placeholder="Digite aqui...">
                            </div>
                            <div class="form-group">
                                <label>Endereço</label>
                                <input type="text" name="endereco" id="endereco" class="form-control obg"
                                    placeholder="Digite aqui...">
                            </div>
                            <button onclick="return NotificarCampos('formMeusDadosTec')" class="btn btn-success" name="btn_gravar">Gravar</button>
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