<?php
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
                            <h2 class="text-primary">Gerenciar setores</h2>
                            <a>Aqui você gerencia todos os setores</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastre um novo setor</h3>
                    </div>
                    <div class="card-body">
                        <form id="formSetor" method="post" action="gerenciar_setor.php">
                            <input type="hidden" id="renderizar" value="TABLE">
                            <div class="form-group">
                                <label>Setor</label>
                                <input class="form-control obg" name="setor" id="setor"
                                    style="text-transform: uppercase" placeholder="Digite aqui...">
                            </div>
                            <button type="button" onclick="CadastrarSetorAJAX('formSetor')" class="btn btn-success"
                                name="btn_cadastrar" id="btn_cadastrar">Cadastrar</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <form action="gerenciar_setor.php" method="post">
                        <div class="card-header bg-info d-none" id="barraTituloFiltro">
                            <h3 class="card-title" id="tituloFiltro">Setores Cadastrados</h3>
                            <div class="card-tools" id="pesquisa">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <input type="text" name="filtroSetor" id="filtroSetor" onkeyup="Filtrar()"
                                        class="form-control float-right" style="text-transform: uppercase"
                                        style="text-transform: uppercase" placeholder="Pesquise por...">
                                    <div class="input-group-append">
                                        <button type="button" name="btn_filtrar" id="btn_filtrar" title="Pesquisar"
                                            onclick="Filtrar()" class="btn btn-default btn-sm"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                    <div class="input-group-append">
                                        <button name="btn_limparFiltro" type="button" class="btn btn-info btn-sm"
                                            title="Limpar filtro" onclick="ConsultarSetor()"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
                <div class="card-body d-none" id="AltereOuExclua">
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
        <form action="gerenciar_setor.php" method="post" id="formAlt">
            <?php include_once 'modais/alterar_setor.php'; ?>
        </form>
        <?php include_once 'modais/excluir.php'; ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper <-->

    <?php include_once PATH . 'Template/_includes/_footer.php'; ?>

    <script>
        FocarInputModal('alterarSetor', 'setor_alterar');
    </script>
    </div>
    <!-- ./wrapper -->

    <script>
        AjustarMenu("Gerenciar setor", "menuGeral", "setores");
        $("#setor").focus();
    </script>

    <script src="../../Resource/ajax/SetorAJAX.js"></script>
    <script src="../../Resource/listeners/SetorLIS.js"></script>

    <script>
        ConsultarSetor();
    </script>

</body>

</html>