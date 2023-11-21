<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/ConsultarUsuarioDV.php';
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
                            <h2 class="text-primary">Consultar usuário</h2>
                            <a>Aqui você consulta todos os seus usuários</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Consulte os usuários</h3>
                    </div>
                    <div class="card-body">
                        <form id="formConsUsu" method="post" action="consultar_usuario.php">
                            <div class="form-group">
                                <label>Pesquisar por Nome</label>
                                <input class="form-control obg" id="nome_filtro" onkeyup="FiltrarUsuario()"
                                    placeholder="Digite aqui...">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card" id="divResult" style="display: none">
                    <div class="card-header">
                        <h3 class="card-title">Usuários cadastrados</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Altere ou exclua os registros</h3>
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

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper <-->

        <?php include_once PATH . 'Template/_includes/_footer.php'; ?>

        <script src="../../Resource/ajax/UsuarioAJAX.js"></script>
    </div>
    <!-- ./wrapper -->

</body>

</html>