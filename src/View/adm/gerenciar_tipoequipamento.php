<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/TipoEquipamentoDV.php';
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
                            <h2 class="text-primary">Gerenciar tipos de equipamentos</h2>
                            <a>Aqui você gerencia todos os tipos de equipamentos</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastre um novo tipo de equipamento</h3>
                    </div>
                    <div class="card-body">
                        <form id="formTipo" method="post" action="gerenciar_tipoequipamento.php">
                            <div class="form-group">
                                <label>Tipo de equipamento</label>
                                <input name="novo" id="novo" type="hidden" value="S">
                                <input class="form-control obg" name="tipo" id="tipo" onkeyup="Maiuscula('tipo')"
                                    placeholder="Digite aqui...">
                            </div>
                            <button type="button" onclick="CadastrarTipoEquipamento('formTipo')" class="btn btn-success"
                                name="btn_cadastrar">Cadastrar</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <form action="gerenciar_tipoequipamento.php" method="post">
                        <div class="card-header bg-info" id="barraTituloFiltro">
                            <h3 class="card-title" id="tituloFiltro">Tipos Cadastrados</h3>
                            <div class="card-tools" id="pesquisa">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <input type="hidden" name="filtroAtivado" value="<?php $filtroAtivado ?>">
                                    <?php if (count($tipos) > 0 || $filtroAtivado == true) { ?>
                                        <input type="text" name="filtroTipo" id="filtroTipo" onkeyup="Filtrar()"
                                            class="form-control float-right" placeholder="Pesquise por..."
                                            value="<?= $filtro ?>">
                                        <div class="input-group-append">
                                            <button type="button" name="btn_filtrar" id="btn_filtrar" title="Pesquisar"
                                                onclick="Filtrar()" class="btn btn-default btn-sm"><i
                                                    class="fas fa-search"></i></button>
                                            <!--<button name="btn_filtrar" id="btn_filtrar" title="Pesquisar"
                                                    onclick="return FiltrarTipoEquipamento()"
                                                    class="btn btn-default btn-sm"><i
                                                    class="fas fa-search"></i></button>-->
                                        </div>
                                        <div class="input-group-append">
                                            <button name="btn_limparFiltro" type="button" class="btn btn-info btn-sm"
                                                title="Limpar filtro" onclick="ConsultarTipo()"><i
                                                    class="fas fa-times"></i></button>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-body" id="AltereOuExclua">
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
                <form action="gerenciar_tipoequipamento.php" method="post" id="formAlt">
                    <?php include_once 'modais/alterar_tipo.php'; ?>
                    <?php include_once 'modais/excluir.php'; ?>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper <-->

        <?php include_once PATH . 'Template/_includes/_footer.php'; ?>

    </div>
    <!-- ./wrapper -->

    <script>
        AjustarMenu("Gerenciar tipo de equipamento", "menuEquipamentos", "tiposEquipamentos");
        $("#tipo").focus();
    </script>

    <script src="../../Resource/ajax/TipoEquipamentoAJAX.js"></script>

    <script> ConsultarTipo(); </script>

</body>

</html>