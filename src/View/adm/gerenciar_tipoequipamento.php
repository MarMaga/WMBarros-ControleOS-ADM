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
                            <h2 class="text-primary">Gerenciar tipo de equipamento</h2>
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
                                <input name="h_id_alt" id="h_id_alt" type="hidden" value="">
                                <input name="h_tipo" id="h_tipo" type="hidden" value="">
                                <input class="form-control obg" name="tipo" id="tipo" onblur="Maiuscula();"
                                    placeholder="Digite aqui...">
                            </div>
                            <button onclick="return NovoTipo()" class="btn btn-default" name="btn_novo">Novo</button>
                            <button onclick="return VerificaDigitacaoTipoEquipamento()" class="btn btn-success"
                                name="btn_salvar">Salvar</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tipos cadastrados</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Altere ou exclua os registros</h3>

                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" name="table_search" class="form-control float-right"
                                                    placeholder="Pesquise por...">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default"><i
                                                            class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Ação</th>
                                                    <th>Tipo do equipamento</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($tipos); $i++) { ?>
                                                    <tr>
                                                        <td>
                                                            <a href="#"
                                                                onclick="return AlterarTipoEquipamento('<?= $tipos[$i]['id'] ?>', '<?= $tipos[$i]['tipo_equipamento'] ?>')"
                                                                class="btn btn-warning btn-xs">Alterar</a>
                                                            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal"
                                                                data-target="#modalExcluir<?= $i ?>">Excluir</a>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="id" id="id"
                                                                value="<?= $tipos[$i]['id'] ?>" />
                                                            <?= $tipos[$i]['tipo_equipamento'] ?>
                                                            <form action="gerenciar_tipoequipamento.php" method="post">
                                                                <input name="h_id" type="hidden"
                                                                    value="<?= $tipos[$i]['id'] ?>" />
                                                                <div class="modal fade" id="modalExcluir<?= $i ?>"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="myModalLabel">
                                                                                    Confirmação de
                                                                                    exclusão</h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-hidden="true">&times;</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Deseja excluir o tipo: <b>
                                                                                    <?= $tipos[$i]['tipo_equipamento'] ?>
                                                                                </b> ?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-default"
                                                                                    data-dismiss="modal">Cancelar</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary"
                                                                                    name="btn_excluir">Sim</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
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

    </div>
    <!-- ./wrapper -->

    <script>
        $("#tipo").focus();
        AjustaMenu("Gerenciar tipo de equipamento", "menuEquipamentos", "tiposEquipamentos");
    </script>

</body>

</html>