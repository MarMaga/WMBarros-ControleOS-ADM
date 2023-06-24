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
                        <form method="post" action="meus_dados.php">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control"
                                    placeholder="Digite aqui...">
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="text" name="email" class="form-control"
                                    placeholder="Digite aqui...">
                            </div>
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" name="telefone" class="form-control"
                                    placeholder="Digite aqui...">
                            </div>
                            <div class="form-group">
                                <label>Endereço</label>
                                <input type="text" name="endereco" class="form-control"
                                    placeholder="Digite aqui...">
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