<?php

use Src\Controller\NovoUsuarioCTRL;
use Src\VO\UsuarioVO;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if(isset($_POST['btn_cadastrar'])){

    $voNovoUsuario = new UsuarioVO();
    $ctrlNovoUsuario = new NovoUsuarioCTRL();

    $voNovoUsuario->setTipo(intval($_POST['tipo']));
    $voNovoUsuario->setSetor(intval($_POST['setor']));
    $voNovoUsuario->setNome($_POST['nome']);
    $voNovoUsuario->setCPF($_POST['cpf']);
    $voNovoUsuario->setEmail($_POST['email']);
    $voNovoUsuario->setTelefone($_POST['telefone']);
    $voNovoUsuario->setEndereco($_POST['endereco']);

    $ret = $ctrlNovoUsuario->CadastrarUsuario($voNovoUsuario);

    
}
?>