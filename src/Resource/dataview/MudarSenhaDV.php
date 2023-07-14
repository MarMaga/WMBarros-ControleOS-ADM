<?php
use Src\Controller\MudarSenhaCTRL;
use Src\VO\UsuarioVO;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if(isset($_POST['btn_gravar'])){

    $voMudarSenha = new UsuarioVO();
    $ctrlMudarSenha = new MudarSenhaCTRL();

    $voMudarSenha->setSenha($_POST['senhaatual']);
    $voMudarSenha->setNovaSenha($_POST['senha']);
    $voMudarSenha->setNovaSenhaRepetida($_POST['senharepetida']);

    $ret = $ctrlMudarSenha->AtualizarSenha($voMudarSenha);

    
}

?>