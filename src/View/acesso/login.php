<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/UsuarioDV.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php require_once PATH . 'Template/_includes/_head.php'; ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Controle de chamados</b>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Faça seu login</p>

                <form id="formLog" action="login.php" method="post">
                    <div class="input-group mb-3">
                        <input id="login" class="form-control obg" placeholder="CPF">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="senha"  class="form-control obg" placeholder="Sua senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="button" onclick="Logar('formLog')" class="btn btn-primary btn-block">Acessar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <?php
    include_once PATH . 'Template/_includes/_scripts.php';
    include_once PATH . 'Template/_includes/_msg.php';
    ?>

    <script src="../../Resource/ajax/usuarioAJAX.js"></script>

</body>

</html>