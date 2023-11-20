<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\VO\UsuarioVO;
use Src\VO\TecnicoVO;
use Src\VO\FuncionarioVO;
use Src\Controller\UsuarioCTRL;

$ctrl = new UsuarioCTRL();

if (isset($_POST['verificar_email_duplicado'])) {

    echo $ctrl->VerificarEmailDuplicadoCTRL($_POST['email']);

} else if (isset($_POST['btn_cadastrar'])) {

    switch ($_POST['tipo']) {

        case USUARIO_ADM:
            $vo = new UsuarioVO;
            break;

        case USUARIO_TECNICO:
            $vo = new TecnicoVO;

            $vo->setNomeEmpresa($_POST['nome_empresa']);
            break;

        case USUARIO_FUNCIONARIO:
            $vo = new FuncionarioVO;

            $vo->setIdSetor($_POST['setor']);
            break;
    }

    // SETA AS PROPRIEDADES DO USUÁRIO
    $vo->setNome($_POST['nome']);
    $vo->setTipo($_POST['tipo']);
    $vo->setEmail($_POST['email']);
    $vo->setCPF($_POST['cpf']);
    $vo->setTelefone($_POST['telefone']);

    // SETA AS PROPRIEDADES DO ENDEREÇO
    $vo->setRua($_POST['rua']);
    $vo->setBairro($_POST['bairro']);
    $vo->setCep($_POST['cep']);
    $vo->setCidade($_POST['cidade']);
    $vo->setEstado($_POST['estado']);

    $ret = $ctrl->CadastrarUsuarioCTRL($vo);
    echo $ret;
} 