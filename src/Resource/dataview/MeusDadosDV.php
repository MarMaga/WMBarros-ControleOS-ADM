<?php
use Src\Controller\MeusDadosCTRL;
use Src\VO\UsuarioVO;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if(isset($_POST['btn_gravar'])){

    $voMeusDados = new UsuarioVO();
    $ctrlMeusDados = new MeusDadosCTRL();

    $voMeusDados->setNome($_POST['nome']);
    $voMeusDados->setEmail($_POST['email']);
    $voMeusDados->setTelefone($_POST['telefone']);
    $voMeusDados->setEndereco($_POST['endereco']);

    $ret = $ctrlMeusDados->AtualizarMeusDados($voMeusDados);

    
}

?>